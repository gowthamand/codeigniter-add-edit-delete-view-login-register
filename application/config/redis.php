<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Redis (Upstash) connection settings.
| Values come from environment variables (REDIS_HOST, REDIS_PORT, REDIS_PASSWORD)
| so the password is never committed to git. On Vercel, set them under
| Project -> Settings -> Environment Variables, then redeploy.
*/
if ( ! function_exists('redis_env'))
{
	// Some PHP runtimes expose env vars only via $_ENV or $_SERVER, not getenv().
	function redis_env($name, $default = '')
	{
		$value = getenv($name);
		if ($value === FALSE || $value === '') $value = isset($_ENV[$name]) ? $_ENV[$name] : '';
		if ($value === '') $value = isset($_SERVER[$name]) ? $_SERVER[$name] : '';
		return $value === '' ? $default : $value;
	}
}

$config['redis_host']     = redis_env('REDIS_HOST', 'tls://upward-seahorse-124306.upstash.io');
$config['redis_port']     = (int) redis_env('REDIS_PORT', 6379);
$config['redis_password'] = redis_env('REDIS_PASSWORD');
$config['redis_timeout']  = 5;
