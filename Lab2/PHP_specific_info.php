<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/24/15
 * Time: 5:32 PM
 */

echo "<h1>This page was rendered in PHP version: " . phpversion() . "</h1>";
echo "<br />";
echo "<h1>Current ZEND version: " . zend_version() . "</h1>";
echo "<br />";
echo "<h1>The default mimetype is " . ini_get('default_mimetype') . "</h1>";