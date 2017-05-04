<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/4/28
 * Time: 7:55
 */

use \Pdemo\ServerConf;

$prjHome = dirname(dirname(__DIR__));
require("$prjHome/vendor/autoload.php");

ServerConf::init($prjHome);