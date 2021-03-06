<?php

/**
 *
 * This demo demonstrates use of global conf.php config file in PageCache.
 *
 * It's useful to have settings defined in one file, to avoid repeating yourself
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

//PageCache configuration in a file
$config_file = __DIR__ . '/conf.php';

//pass config file
$cache = new PageCache\PageCache($config_file);

//enable log, by default disabled in conf.php
$cache->enableLog();

//getfilepath
echo 'Cache filepath, getFilePath(): ' . $cache->getFilePath() . '<br/>';
echo '<hr/>';

//get file name
echo 'Cache file name, getFile(): ' . $cache->getFile();
echo '<hr>';

//cache present already?
echo 'isChached(): ';
if ($cache->isCached()) {
    echo 'cache exists';
} else {
    echo 'cache does not exist';
}
echo '<hr>';

//get cache file contents
echo 'Cache file contents: <br/>';
$str = $cache->getPageCache();
var_dump($str);
echo '<hr/>';


//Clear cache for this page
//
//Uncomment this line below to force  cache clear of this page
//
//$cache->clearPageCache();

//disable log, overrides conf.php
//$cache->disableLog();

//Change log file path, overrides conf.php
//$cache->logFilePath(__DIR__.'/log/cache.log');

//Set cache expiration for this current page, overrides conf.php
//$cache->setExpiration(3600);

//Cache file minimum size, if it's less than this many bytes cache considered invalid.
//This value is important, set to your minimum page size.
//This will ensure that no visitor will see an empty page or some error, in case cache generation fails
//$cache->setMinCacheFileSize(100);

//Change cache file location. If needed you can have cache for each URL in a seperate location.
//$cache->setPath(__DIR__.'/cache/');

//Set cache strategy. If needed implemet a new strategy class (see src/Strategy/ for code of built-in strategies)
//$cache->setStrategy( new \PageCache\Strategy\MobileStrategy());

//start PageCache
$cache->init();


?>
<html>
<body>
<h1>Example #4 - API. Call to some methods of PageCache.</h1>
<h3>This is a demo PageCache page that is going to be cached. <span style="color: green;">
        Refresh browser to see changes.</span>
</h3>
<h3 style="color: red">Demo with conf.php configuration file usage, see source code for this file.</h3>
<h3>This is a dynamic PHP <i>date('H:i:s')</i>
    call, note that time doesn't change on refresh: <?php echo date('H:i:s'); ?>.</h3>
<br><br>
<h4>Check examples/cache/ directory to see cached content.
    Erase this file to regenerate cache, or it will automatically be regenerated in 10 minutes, as per conf.php</h4>
</body>
</html>