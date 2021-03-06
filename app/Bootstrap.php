<?php
use Yaf\Bootstrap_Abstract;
use Yaf\Dispatcher;
use Yaf\Loader;
use Ares333\Yaf\Tool\SmartyView;
use Ares333\Yaf\Helper\Error;
use Ares333\Yaf\Plugin\PHPConfig;
use Ares333\Yaf\Plugin\Cli;
use Ares333\Yaf\Helper\Functions;

class Bootstrap extends Bootstrap_Abstract
{

    function _initAutoload(Dispatcher $dispatcher)
    {
        $dir = $dispatcher->getApplication()->getAppDirectory();
        Loader::getInstance(null, $dir . '/../library');
        Loader::import($dir . '/../vendor/autoload.php');
    }

    function _initDebug(Dispatcher $dispatcher)
    {
        new Functions();
        Error::error2exception();
    }

    function _initPlugin(Dispatcher $dispatcher)
    {
        $dispatcher->registerPlugin(new PHPConfig());
        $dispatcher->registerPlugin(new Cli());
        $dispatcher->registerPlugin(new LoginPlugin());
    }

    function _initView(Dispatcher $dispatcher)
    {
        $view = new SmartyView();
        $dispatcher->setView($view);
    }
}