<?php
/**
 * News stored in Redis.
 *
 * Keys:
 *   ci_news:next_id          counter for new ids
 *   ci_news:{id}             hash: id, title, slug, text, user_id
 *   ci_news:ids              set of all news ids
 *   ci_news:user:{user_id}   set of news ids owned by a user
 */
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->library('redis_client');
    }

    public function record_count()
    {
        return (int) $this->redis_client->sCard('ci_news:ids');
    }

    public function get_news($slug = FALSE)
    {
        $user_id = (int) $this->session->userdata('user_id');
        $items = $this->fetch_many($this->redis_client->sMembers('ci_news:user:' . $user_id));

        if ($slug === FALSE)
        {
            return $items;
        }

        foreach ($items as $item)
        {
            if ($item['slug'] === $slug)
            {
                return $item;
            }
        }
        return NULL;
    }

    public function get_news_by_id($id = 0)
    {
        if ($id === 0)
        {
            return $this->fetch_many($this->redis_client->sMembers('ci_news:ids'));
        }
        return $this->fetch_one($id);
    }

    public function set_news($id = 0)
    {
        $this->load->helper('url');

        $data = array(
            'title'   => $this->input->post('title'),
            'slug'    => url_title($this->input->post('title'), 'dash', TRUE),
            'text'    => $this->input->post('text'),
            'user_id' => (int) $this->input->post('user_id'),
        );

        if ($id == 0)
        {
            $id = $this->redis_client->incr('ci_news:next_id');
        }
        else
        {
            $old = $this->fetch_one($id);
            if ( ! $old)
            {
                return FALSE;
            }
            if ((int) $old['user_id'] !== $data['user_id'])
            {
                $this->redis_client->sRem('ci_news:user:' . $old['user_id'], $id);
            }
        }

        $data['id'] = (int) $id;
        $this->redis_client->multi()
            ->hMSet('ci_news:' . $id, $data)
            ->sAdd('ci_news:ids', $id)
            ->sAdd('ci_news:user:' . $data['user_id'], $id)
            ->exec();
        return TRUE;
    }

    public function delete_news($id)
    {
        $item = $this->fetch_one($id);
        if ( ! $item)
        {
            return FALSE;
        }
        $this->redis_client->multi()
            ->del('ci_news:' . $id)
            ->sRem('ci_news:ids', $id)
            ->sRem('ci_news:user:' . $item['user_id'], $id)
            ->exec();
        return TRUE;
    }

    protected function fetch_one($id)
    {
        $row = $this->redis_client->hGetAll('ci_news:' . (int) $id);
        return $row ?: NULL;
    }

    protected function fetch_many(array $ids)
    {
        sort($ids, SORT_NUMERIC);
        $pipe = $this->redis_client->multi(Redis::PIPELINE);
        foreach ($ids as $id)
        {
            $pipe->hGetAll('ci_news:' . $id);
        }
        return $ids ? array_values(array_filter($pipe->exec())) : array();
    }
}
