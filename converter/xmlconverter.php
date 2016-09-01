<?php
/**
 * Created by PhpStorm.
 * User: tunele
 * Date: 01/09/16
 * Time: 11.11
 */

namespace converter;


class xmlconverter
{

    public static function convert($filein,$fileout, $exptype = xlsexport::XLS){
        $filestr = file_get_contents($filein);
        $xmlimp = new xmlimport();
        $ret = $xmlimp->parse($filestr);
        if (!$ret) return [$ret,$xmlimp->error] ;
        $tracks = $xmlimp->gettracks();
        $headercells = $xmlimp->getkeys();
        switch ($exptype) {
            case xlsexport::XLS:
                $exp = xlsexport::export($headercells, $tracks, $fileout);
                break;
        }
        return [true, $exp];
    }
}