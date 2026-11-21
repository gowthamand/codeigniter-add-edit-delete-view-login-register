<?php
/**
 * Users stored in Redis.
 *
 * Keys:
 *   ci_user:next_id          counter for new ids
 *   ci_user:{id}             hash: id, firstname, lastname, email, password (md5), updated_at
 *   ci_user:ids              set of all user ids
 *   ci_user:email:{email}    string -> user id (unique email lookup)
 */
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->library('redis_client');
    }

    public function get_user($id = 0)
    {
        if ($id === 0)
        {
            $ids = $this->redis_client->sMembers('ci_user:ids');
            sort($ids, SORT_NUMERIC);
            $users = array();
            foreach ($ids as $uid)
            {
                if ($row = $this->fetch_one($uid))
                {
                    $users[] = $row;
                }
            }
            return $users;
        }
        return $this->fetch_one($id);
    }

    public function get_user_login($email, $password)
    {
        $id = $this->redis_client->get($this->email_key($email));
        if ( ! $id)
        {
            return NULL;
        }
        $user = $this->fetch_one($id);
        return ($user && hash_equals($user['password'], md5($password))) ? $user : NULL;
    }

    public function set_user($id = 0)
    {
        // The controller's form_validation 'md5' rule has already hashed the password.
        $data = array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'email'      => strtolower(trim($this->input->post('email'))),
            'password'   => $this->input->post('password'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $existing = $this->redis_client->get($this->email_key($data['email']));

        if ($id == 0)
        {
            if ($existing)
            {
                return FALSE; // email already registered
            }
            $id = $this->redis_client->incr('ci_user:next_id');
            // setnx guards against two registrations racing for the same email
            if ( ! $this->redis_client->setnx($this->email_key($data['email']), $id))
            {
                return FALSE;
            }
        }
        else
        {
            $old = $this->fetch_one($id);
            if ( ! $old || ($existing && (int) $existing !== (int) $id))
            {
                return FALSE;
            }
            if ($old['email'] !== $data['email'])
            {
                $this->redis_client->del($this->email_key($old['email']));
                $this->redis_client->set($this->email_key($data['email']), $id);
            }
        }

        $data['id'] = (int) $id;
        $this->redis_client->multi()
            ->hMSet('ci_user:' . $id, $data)
            ->sAdd('ci_user:ids', $id)
            ->exec();
        return TRUE;
    }

    public function delete_user($id)
    {
        $user = $this->fetch_one($id);
        if ( ! $user)
        {
            return FALSE;
        }
        $this->redis_client->multi()
            ->del('ci_user:' . $id)
            ->del($this->email_key($user['email']))
            ->sRem('ci_user:ids', $id)
            ->exec();
        return TRUE;
    }

    protected function fetch_one($id)
    {
        $row = $this->redis_client->hGetAll('ci_user:' . (int) $id);
        return $row ?: NULL;
    }

    protected function email_key($email)
    {
        return 'ci_user:email:' . strtolower(trim($email));
    }
}
