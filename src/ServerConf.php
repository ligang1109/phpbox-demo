<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/4/28
 * Time: 7:59
 */

namespace Pdemo;

class ServerConf
{
    private static $prjHome = '';
    private static $conf    = array();


    public static function init($prjHome)
    {
        self::$prjHome = $prjHome;

        self::parseConf();

        if (self::isDev()) {
            error_reporting(E_ALL | E_STRICT);
        }
    }

    public static function getPrjName()
    {
        return self::$conf['prjName'];
    }

    public static function isDev()
    {
        return self::$conf['isDev'];
    }

    public static function getPrjHome()
    {
        return self::$prjHome;
    }

    public static function getLogRoot()
    {
        return self::$prjHome . '/logs';
    }

    public static function getTmpRoot()
    {
        return self::$prjHome . '/tmp';
    }

    public static function getMysqlConf()
    {
        return self::$conf['mysql'];
    }


    private static function parseConf()
    {
        $conf        = json_decode(file_get_contents(self::$prjHome . '/conf/server/server_conf.json'), true);
        $confRewrite = json_decode(file_get_contents(self::$prjHome . '/conf/server_conf_rewrite.json'), true);

        self::$conf = array_replace_recursive($conf, $confRewrite);
    }
}