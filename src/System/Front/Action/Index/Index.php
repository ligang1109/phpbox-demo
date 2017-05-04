<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/5/3
 * Time: 21:12
 */

namespace Pdemo\System\Front\Action\Index;

use Pdemo\System\Front\Action\Base;
use Phpbox\Core\WebContext;

class Index extends Base
{
    public function run(WebContext $context)
    {
        $this->assign('rid', $context->getAttribute(Base::CONTEXT_ATTRIBUTE_REQUEST_ID));
    }
}