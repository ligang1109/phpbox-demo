<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/5/3
 * Time: 21:01
 */

namespace Pdemo\System\Front\Action;

use Phpbox\Core\WebContext;
use Phpbox\Core\Action\WebErrorBase;

class Error extends WebErrorBase
{
    public function run(WebContext $context, \Exception $e)
    {
        // TODO: Implement run() method.
        var_dump($e->getCode(), $e->getMessage());
    }
}