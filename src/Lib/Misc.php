<?php
/**
 * Created by IntelliJ IDEA.
 * User: ligang
 * Date: 2017/5/4
 * Time: 9:27
 */

namespace Pdemo\Lib;

use Phpbox\Http\ServerRequest;

class Misc
{
    public static function genRequestId(ServerRequest $request)
    {
        list($usec, $sec) = explode(' ', microtime());

        $sidData[] = 'phpv1';
        $sidData[] = $request->getAttribute('REMOTE_ADDR');
        $sidData[] = $request->getAttribute('REMOTE_PORT');
        $sidData[] = $sec;
        $sidData[] = number_format((float)$usec, 3) * 1000;
        $sidData[] = rand(0, 999);

        $rid = implode(',', $sidData);
        return base64_encode($rid);
    }
}