<?php

/**
 *
 * This demo demonstrates integration with Monolog logger
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * When not specified using a config file or by calling methods, the following parameters are set automatically:
 *
 * cache_expire = 1200 seconds
 * min_cache_file_size = 10
 * file_lock = LOCK_EX | LOCK_NB
 * use_session = false
 *
 */
use PageCache\PageCache;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

//Setup PageCache
$cache = new PageCache();
$cache->setPath(__DIR__ . '/cache/');

//Enable logging
$cache->enableLog();

//Monolog setup. More info on https://github.com/Seldaek/monolog
$logger = new Logger('PageCache');
$logger->pushHandler(new StreamHandler(__DIR__ . '/log/monolog.log', Logger::DEBUG));

//pass Monolog to PageCache
$cache->setLogger($logger);

//Initiate cache engine
$cache->init();

?>
<html>
<body>
<h1>PageCache logging with monolog example</h1>
<h3 style="color: red">This is a demo PageCache page that is going to be cached. Monolog log entries are saved.</h3>
<h3>Check out examples/log/monolog.log file for Monolog entries.</h3>
<h3>Default cache expiration time for this page is 20 minutes. You can change this value in your <i>conf.php</i>
    and passing its file path to PageCache constructor, or by calling <i>setExpiration()</i> method.
    <span style="color: green;">Refresh browser to see changes.</span></h3>
<h3>This is a dynamic PHP <i>date('H:i:s')</i>
    call, note that time doesn't change on refresh: <?php echo date('H:i:s'); ?>.</h3>
<br><br>
<h4>Check examples/cache/ directory to see cached content.
    Erase this file to regenerate cache, or it will automatically be regenerated in 20 minutes.</h4>
</body>
</html>