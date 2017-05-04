<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/5/3
 * Time: 21:13
 */

namespace Pdemo\System\Front\Action;

use Phpbox\Core\Action\WebBase;
use Phpbox\Core\WebContext;
use Phpbox\View\Php as PhpView;
use Phpbox\Http\Stream;

use Pdemo\Lib\Misc;
use Pdemo\ServerConf;

class Base extends WebBase
{
    const CONTEXT_ATTRIBUTE_REQUEST_ID = 'rid';

    /**
     * @var Stream
     */
    protected $responseBody = null;

    /**
     * @var PhpView
     */
    protected $view             = null;
    protected $noView           = false;
    protected $viewFile         = '';
    protected $appendViewSuffix = true;

    public function before(WebContext $context)
    {
        // TODO: Implement before() method.
        $this->responseBody = new Stream(fopen('php://temp', 'r+'));

        $rid = Misc::genRequestId($context->getRequest());
        $context->setAttribute(self::CONTEXT_ATTRIBUTE_REQUEST_ID, $rid);

        $this->view = new PhpView(ServerConf::getPrjHome() . '/src/System/Front/View', 'html');

        $this->assign('controllerName', $this->controllerName)
             ->assign('actionName', $this->actionName);
    }

    public function after(WebContext $context)
    {
        // TODO: Implement after() method.
        if (!$this->noView) {
            if ($this->viewFile == '') {
                $this->viewFile = $this->controllerName . '/' . $this->actionName;
            }

            $contents = $this->view->render($this->viewFile, $this->appendViewSuffix);
            $this->responseBody->write($contents);
        }

        $context->getResponse()->withBody($this->responseBody);
    }

    protected function assign($key, $value, $secureFilter = true)
    {
        $this->view->assign($key, $value, $secureFilter);

        return $this;
    }

    protected function setNoView($noView = true)
    {
        $this->noView = $noView;
    }

    protected function setViewFile($viewFile, $appendViewSuffix = true)
    {
        $this->viewFile         = $viewFile;
        $this->appendViewSuffix = $appendViewSuffix;
    }
}