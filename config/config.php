<?php
/**
 * Created by PhpStorm.
 * User: Sabiduria
 * Date: 12/11/2019
 * Time: 10:17 AM
 */

if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PWD')) define('DB_PWD', '');
if (!defined('DB_NAME')) define('DB_NAME', 'votes');
if (!defined('DSN')) define('DSN', 'mysql:host='.DB_SERVER.'; dbname='.DB_NAME);