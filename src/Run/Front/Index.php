<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/4/28
 * Time: 7:18
 */

use \Phpbox\Core\System\Web;
use \Pdemo\Conf\Server;

require(dirname(__DIR__).'/Boot.php');

$system = new Web(Server::getPrjName(), 'Front');
$system->run();




