<?php

/**
 * This file is part of the PageCache package.
 *
 * @author Muhammed Mamedov <mm@turkmenweb.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 *  Demo configuration file.
 *
 *  Comment out any that you don't need.
 *
 *  Check src/config-stub.php
 */
$config = array(

    //generated cache files less than this many bytes, are considered invalid and are regenerated
    //adjust accordingly
    'min_cache_file_size' => 5,

    // set true to enable loging, not recommended for production use, only for debugging
    'enable_log' => false,

    //current page's cache expiration in seconds
    'expiration' => 10 * 60,

    //log file location, enable_log must be true for loging to work
    'log_file_path' => __DIR__ . '/log/cache.log',

    //cache directory location (mind the trailing slash "/")
    'cache_path' => __DIR__ . '/cache/',

    'use_session' => false
);