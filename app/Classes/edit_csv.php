<?php
namespace App\Classes;
use App\Classes\PHPExcel;
use App\Classes\IOFactory;


class edit_csv{
    
    public function insertCSV($title,$id,$variant,$sku,$type,$prices,$img_src,$handle,$tags)
    {
        $objPHPExcel = PHPExcel_IOFactory::load("test.csv");
        $objPHPExcel->setActiveSheetIndex(0);
        $row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
        $i=$row;
        $objPHPExcel->getActiveSheet()
        ->setCellValue('A'.$i,$handle)
        ->setCellValue('B'.$i,$title)
        ->setCellValue('C'.$i,'bodyhtml')
        ->setCellValue('D'.$i,'vendor')
        ->setCellValue('E'.$i,'Type')
        ->setCellValue('F'.$i,'tags')
        // ->setCellValue('I'.$i,$description)
        ->setCellValue('R'.$i,$prices)
        ->setCellValue('W'.$i,$img_src)
        ->setCellValue('AP'.$i,$variant);

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('test.csv');
    }

}
