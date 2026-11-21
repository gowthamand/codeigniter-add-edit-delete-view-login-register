<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Redis (Upstash) connection settings.
| The password is read from the REDIS_PASSWORD environment variable so it is
| never committed to git.
*/
$config['redis_host']     = getenv('REDIS_HOST') ?: 'tls://upward-seahorse-124306.upstash.io';
$config['redis_port']     = (int) (getenv('REDIS_PORT') ?: 6379);
$config['redis_password'] = getenv('REDIS_PASSWORD') ?: '';
$config['redis_timeout']  = 5;
