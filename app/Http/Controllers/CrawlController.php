<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\edit_csv;

class CrawlController extends Controller
{
    public function getDataGameShop()
    {
    	return view('site.gameshop');
    }
    public function crawlData(Request $req)
    {
        $handle =$req->post('handle');
        $title=$req->post('title');
        $body_html =$req->post('body_html');
        $vendor =$req->post('vendor');
        $type =$req->post('type');
        $tags =$req->post('tags');
        $options = $req->post('options');
        $variant_prices = $req->post('variant_prices');
        $variant_compare_prices = $req->post('variant_compare_prices');
        $variant_shipping = $req->post('variant_shipping');
        $variant_taxable = $req->post('variant_taxable');
        $images =$req->post('images');
        $variants = $req->post('variants');
        $file_name = $req->post('file_name');
        
        // stores to array
        $data_shop=array('handle'=>$handle,
            'title'=>$title,
            'body_html'=>$body_html,
            'vendor'=> $vendor,
            'type'=>$type,
            'tags'=>$tags,  
            'options'=> $options,
            'variant_prices'=>$variant_prices,
            'variant_compare_prices'=> $variant_compare_prices,
            'variant_shipping'=> $variant_shipping,
            'variant_taxable'=>$variant_taxable,
            'variants'=>$variants,
            'images'=>$images,
            'file_name'=>$file_name);    
        
        // $path='D:/test/'.$data_shop['file_name'].'.xlsx';
        // print_r($path);
        // $this->create_excel($path);
        $i=$this->insertCSV($data_shop);
        // sleep(10000);
        return $i;
    }   
    public function test(Request $req)
    {
        $title='1';
        $id ='1';
        $variant = '1';
        $sku ='1';
        $type ='1';
        $prices ='1';
        $img_src ='1';
        $handle ='1';
        $tags ='1';
        $this->insertCSV($title,$id,$variant,$sku,$type,$prices,$img_src,$handle,$tags);
        // 
    }   
    public function insertCSV($data)
    {
        $path='D:/test/'.$data['file_name'].'.xlsx';
        print_r($path);
        if(!file_exists($path))
        {
            $this->create_excel($path);
        }
        $text = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $objPHPExcel = $text->load($path);
        $objPHPExcel->setActiveSheetIndex(0);
        $row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
        $i=$row;
        $objPHPExcel->getActiveSheet()
        ->setCellValue('A'.$i,$data['handle'])
        ->setCellValue('B'.$i,$data['title'])
        ->setCellValue('C'.$i,$data['body_html'])
        ->setCellValue('D'.$i,$data['vendor'])
        ->setCellValue('E'.$i,$data['type'])
        ->setCellValue('F'.$i,$data['tags'])
        ->setCellValue('G'.$i,'true')
        ->setCellValue('O'.$i,$data['variants'][0]['grams'])
        ->setCellValue('N'.$i,$data['variants'][0]['sku'])
        ->setCellValue('Q'.$i,1)
        ->setCellValue('S'.$i,$data['variants'][0]['fulfillment_service'])
        ->setCellValue('R'.$i,'deny')
        ->setCellValue('T'.$i,$data['variants'][0]['price'])
        ->setCellValue('U'.$i,$data['variants'][0]['compare_at_price'])
        ->setCellValue('V'.$i,$data['variants'][0]['requires_shipping'])
        ->setCellValue('W'.$i,$data['variants'][0]['taxable'])
        ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
        ->setCellValue('Y'.$i,$data['images'][0]['src'])
        ->setCellValue('Z'.$i,$data['images'][0]['position'])
        ->setCellValue('AA'.$i,$data['images'][0]['alt'])
        ->setCellValue('AR'.$i,'false')
        ->setCellValue('AR'.$i,$data['images'][0]['src'])
        ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);
        
                // ghi options 

        // if(isset($data['options'][0]))
        // {
        //  $objPHPExcel->getActiveSheet()
        //  ->setCellValue('H'.$i,$data['options'][0]['name'])
        //  ->setCellValue('I'.$i,$data['variants'][0]['option1']);
        //  }
        //  if(isset($data['options'][1]))
        //  {
        //      $objPHPExcel->getActiveSheet()
        //      ->setCellValue('J'.$i,$data['options'][1]['name'])
        //      ->setCellValue('K'.$i,$data['variants'][0]['option2']);
        //  }
        //  if(isset($data['options'][2]))
        //  {
        //      $objPHPExcel->getActiveSheet()
        //      ->setCellValue('L'.$i,$data['options'][2]['name'])
        //      ->setCellValue('M'.$i,$data['variants'][0]['option3']);
        //  }
        $n=$i;
        for($k=0;$k<count($data['variants']);$k++)
        {
            if(isset($data['options'][0])&& isset($data['variants'][$k]))
            {
               $objPHPExcel->getActiveSheet()
               ->setCellValue('A'.$n,$data['handle'])
               ->setCellValue('H'.$n,$data['options'][0]['name'])
               ->setCellValue('I'.$n,$data['variants'][$k]['option1'])
               ->setCellValue('N'.$n,$data['variants'][$k]['sku'])
               ->setCellValue('S'.$n,$data['variants'][0]['fulfillment_service'])
               ->setCellValue('R'.$n,'deny')
               ->setCellValue('T'.$n,$data['variants'][$k]['price'])
               ->setCellValue('U'.$n,$data['variants'][$k]['compare_at_price'])
               ->setCellValue('V'.$n,$data['variants'][$k]['requires_shipping'])
               ->setCellValue('W'.$n,$data['variants'][$k]['taxable']);
            // ->setCellValue('X'.$i,$data['variants'][$j]['barcode']);
           }
           if(isset($data['options'][1]) && isset($data['variants'][$k]))
           {
               $objPHPExcel->getActiveSheet()
               ->setCellValue('J'.$n,$data['options'][1]['name'])
               ->setCellValue('K'.$n,$data['variants'][$k]['option2']);
           }
           if(isset($data['options'][2]) && isset($data['variants'][$k]))
           {
               $objPHPExcel->getActiveSheet()
               ->setCellValue('L'.$n,$data['options'][2]['name'])
               ->setCellValue('M'.$n,$data['variants'][$k]['option3']);
           }
           $n=$n+1;
       }
       for ($j = 1; $j < count($data['images']); $j++) {

        if(!isset($data['images'][$j]['variant_ids'])){
            $i=$i+1;
            $objPHPExcel->getActiveSheet()
            ->setCellValue('A'.$i,$data['handle'])
                // ->setCellValue('B'.$i,$data['title'])
                // // ->setCellValue('C'.$i,$data['body_html'])
                // ->setCellValue('D'.$i,$data['vendor'])
                // ->setCellValue('E'.$i,$data['type'])
                // ->setCellValue('F'.$i,$data['tags'])
                // ->setCellValue('G'.$i,'true')

                // ->setCellValue('H'.$i,$data['options'][0]['name'])
                // ->setCellValue('I'.$i,$data['variants'][0]['option1'])
                // ->setCellValue('J'.$i,$data['options'][0]['name'])
                // ->setCellValue('K'.$i,$data['variants'][0]['option2'])
                // ->setCellValue('N'.$i,$data['variants'][0]['sku'])
                // ->setCellValue('O'.$i,$data['variants'][0]['grams'])
                // ->setCellValue('Q'.$i,1)
                // ->setCellValue('S'.$i,$data['variants'][0]['fulfillment_service'])
                // ->setCellValue('R'.$i,'deny')

                // ->setCellValue('T'.$i,$data['variant_prices'])
                // ->setCellValue('U'.$i,$data['variant_compare_prices'])
                // ->setCellValue('V'.$i,$data['variant_shipping'])
                // ->setCellValue('W'.$i,$data['variant_taxable'])
                //  ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
            ->setCellValue('Y'.$i,$data['images'][$j]['src'])
            ->setCellValue('Z'.$i,$data['images'][$j]['position'])
            ->setCellValue('AA'.$i,$data['images'][$j]['alt']);
                // ->setCellValue('AP'.$i,$data[12])
                // ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);

        }

        else
        {
            $objPHPExcel->getActiveSheet()
            ->setCellValue('A'.$i,$data['handle'])
                // ->setCellValue('B'.$i,$data['title'])
                // ->setCellValue('C'.$i,$data['body_html'])
                // ->setCellValue('D'.$i,$data['vendor'])
                // ->setCellValue('E'.$i,$data['type'])
                // ->setCellValue('F'.$i,$data['tags'])
                // ->setCellValue('G'.$i,'true')
                // ->setCellValue('H'.$i,$data['options'][0]['name'])
                // ->setCellValue('I'.$i,$data['variants'][0]['option1'])
                // ->setCellValue('J'.$i,$data['options'][0]['name'])
                // ->setCellValue('K'.$i,$data['variants'][0]['option2'])
                // ->setCellValue('N'.$i,$data['variants'][0]['sku'])
                // ->setCellValue('O'.$i,$data['variants'][0]['grams'])
                //  ->setCellValue('Q'.$i,1)
                // ->setCellValue('S'.$i,$data['variants'][0]['fulfillment_service'])
                // ->setCellValue('R'.$i,'deny')
                // ->setCellValue('T'.$i,$data['variant_prices'])
                // ->setCellValue('U'.$i,$data['variant_compare_prices'])
                // ->setCellValue('V'.$i,$data['variant_shipping'])
                // ->setCellValue('W'.$i,$data['variant_taxable'])
                //  ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
            ->setCellValue('Y'.$i,$data['images'][$j]['src'])
            ->setCellValue('Z'.$i,$data['images'][$j]['position'])
            ->setCellValue('AA'.$i,$data['images'][$j]['alt']);
                // ->setCellValue('AP'.$i,$data[12])
                // ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);
        }
    }
        // ->setCellValue('AP'.$i,$variant);
    $objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($objPHPExcel);
    $objWriter->save($path);
    return 1;
}
public function create_excel($path){
    // date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $today = date("d-m-Y"); 
    // $ramdom=rand(1,10000);
    $phpExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($phpExcel);
    // $file_name='D:/test/'.$path.'.xlsx';
    $writer->save($path);
}
}

