<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/4/28
 * Time: 7:18
 */

use \Phpbox\Core\System\Web;
use \Pdemo\ServerConf;

require(dirname(__DIR__).'/Boot.php');
$system = new Web(ServerConf::getPrjName(), 'Front');
$system->setErrorActionClsname('\Pdemo\System\Front\Action\Error')->run();
