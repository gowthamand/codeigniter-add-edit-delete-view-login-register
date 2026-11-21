<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redis_test extends CI_Controller {

	public function index()
	{
		$this->load->library('redis_client');

		$this->redis_client->set('foo', 'bar');

		print_r($this->redis_client->get('foo'));
	}
}
