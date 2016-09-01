<?php
/**
 * Created by PhpStorm.
 * User: tunele
 * Date: 01/09/16
 * Time: 11.01
 */

namespace converter;


class xlsexport
{
    const XLS = 1;
    const CSV = 2;

    public static function export(array $headercells, array $tracks, $fileout) {
        $doc = new \PHPExcel();
        $doc->getActiveSheet()->fromArray($headercells, null, 'A1');
        $doc->getActiveSheet()->fromArray($tracks, null, 'A2');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Library.xls"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($doc, 'Excel5');
        $writer->save($fileout);
    }
}