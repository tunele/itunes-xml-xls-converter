<?php
/**
 * Created by PhpStorm.
 * User: tunele
 * Date: 01/09/16
 * Time: 11.01
 */

namespace App\converter;


class xlsexport
{
    const XLS = 1;
    const CSV = 2;

    public static function export($xmldata, $fileout) {
        try{
            $doc = new \PHPExcel();
            $activesheet = $doc->getActiveSheet();
            $activesheet->setTitle('Tracks');
            $activesheet->fromArray($xmldata['trackkeys'], null, 'A1');
            $activesheet->fromArray($xmldata['Tracks'], null, 'A2');

            /*
            $activesheet = $doc->createSheet();
            $activesheet->->setTitle('Info');
            $arrinfodata = array();
            $arrinfokeys = ['Major Version', 'Minor Version', 'Date', 'Application Version', 'Features', 'Show Content Ratings', 'Music Folder', 'Library Persistent ID'];

            foreach ($arrinfokeys as $arrinfokey) {
                self::checkandsetinfo($arrinfodata, $xmldata, $arrinfokey);
            }
            $activesheet->fromArray($arrinfokeys, null, 'A1');
            $activesheet->fromArray($arrinfodata, null, 'A2');

            $activesheet = $doc->createSheet()->setTitle('Playlists');
            $activesheet->fromArray($xmldata['Playlists'], null, 'A2');
            */
            $writer = \PHPExcel_IOFactory::createWriter($doc, 'Excel5');
            $writer->save($fileout);
            return [true,''];
        } catch (\Exception $ex) {
            return [false,$ex->getMessage()];
        }

    }

    private static function checkandsetinfo(&$arrinfo, $xmldata, $key){
        if (isset($xmldata[$key])) {
            $arrinfo[$key] = $xmldata[$key];
        }
    }
}