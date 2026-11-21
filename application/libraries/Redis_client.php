<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Thin wrapper around phpredis for CodeIgniter.
 * Usage: $this->load->library('redis_client'); $this->redis_client->set('k','v');
 */
class Redis_client {

	/** @var Redis */
	protected $redis;

	public function __construct()
	{
		if ( ! extension_loaded('redis'))
		{
			show_error('The phpredis extension is not installed. Run: pecl install redis');
		}

		$CI =& get_instance();
		$CI->config->load('redis', TRUE);
		$cfg = $CI->config->item('redis');

		if ($cfg['redis_password'] === '')
		{
			show_error('REDIS_PASSWORD is not set. Add it to .env (Docker) or to the Vercel project\'s Environment Variables, then redeploy.', 500, 'Redis is not configured');
		}

		$this->redis = new Redis();
		$this->redis->connect($cfg['redis_host'], $cfg['redis_port'], $cfg['redis_timeout']);
		$this->redis->auth($cfg['redis_password']);
	}

	/** Proxy any call (get, set, del, expire, ...) to the Redis instance. */
	public function __call($method, $args)
	{
		return call_user_func_array(array($this->redis, $method), $args);
	}

	public function client()
	{
		return $this->redis;
	}
}
