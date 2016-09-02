<?php
/**
 * Created by PhpStorm.
 * User: tunele
 * Date: 01/09/16
 * Time: 11.11
 */

namespace App\converter;


class xmlconverter
{

    public static function convert($contentsin,$fileout, $exptype = xlsexport::XLS){
        $xmlimp = new xmlimport();
        $ret = $xmlimp->parse($contentsin);
        if (!$ret) return [$ret,$xmlimp->error] ;
        $tracks = $xmlimp->gettracks();
        $headercells = $xmlimp->getkeys();
        switch ($exptype) {
            case xlsexport::XLS:
                $exp = xlsexport::export($xmlimp->data, $fileout);
                break;
        }
        return [$exp[0], $exp[1]];
    }
}