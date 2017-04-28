<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/4/28
 * Time: 7:55
 */

use \Pdemo\Conf\Server;

$prjHome = dirname(dirname(__DIR__));
require("$prjHome/vendor/autoload.php");

Server::init($prjHome);