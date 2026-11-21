<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Loads the sample rows from sql/test.sql into Redis.
 * CLI only:  php index.php seed
 */
class Seed extends CI_Controller {

	public function index()
	{
		if ( ! is_cli())
		{
			show_404();
		}

		$this->load->library('redis_client');
		$r = $this->redis_client;

		$users = array(
			array('id' => 1, 'firstname' => 'Gowthaman', 'lastname' => 'Durai', 'email' => 'gowthaman.nkl1@gmail.com', 'password' => 'e10adc3949ba59abbe56e057f20f883e', 'updated_at' => '2018-11-08 17:22:58'),
		);
		$news = array(
			array('id' => 2, 'title' => 'What is Lorem Ipsum?',  'slug' => 'what-is-lorem-ipsum',  'text' => 'Lorem Ipsum is simply dummy text.x', 'user_id' => 1),
			array('id' => 3, 'title' => 'My test',               'slug' => 'my-test',              'text' => 'hello there',                        'user_id' => 2),
			array('id' => 4, 'title' => 'What is Lorem Ipsum?',  'slug' => 'what-is-lorem-ipsum',  'text' => 'adsadsd',                            'user_id' => 1),
			array('id' => 5, 'title' => 'What is Lorem Ipsum?1', 'slug' => 'what-is-lorem-ipsum1', 'text' => 'What is Lorem Ipsum?1',              'user_id' => 1),
		);

		foreach ($users as $u)
		{
			$r->hMSet('ci_user:' . $u['id'], $u);
			$r->sAdd('ci_user:ids', $u['id']);
			$r->set('ci_user:email:' . strtolower($u['email']), $u['id']);
		}
		foreach ($news as $n)
		{
			$r->hMSet('ci_news:' . $n['id'], $n);
			$r->sAdd('ci_news:ids', $n['id']);
			$r->sAdd('ci_news:user:' . $n['user_id'], $n['id']);
		}

		// Make sure new ids continue after the seeded ones.
		if ((int) $r->get('ci_user:next_id') < 1) $r->set('ci_user:next_id', 1);
		if ((int) $r->get('ci_news:next_id') < 5) $r->set('ci_news:next_id', 5);

		echo "Seeded " . count($users) . " users and " . count($news) . " news items.\n";
	}
}
