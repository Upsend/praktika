<?php

include("PHPExcel/Classes/PHPExcel.php");


    include("db.php");

    $sql = "SELECT * FROM remont";
    $result = mysqli_query( $db, $sql );

    $l = array();

    while($r = mysqli_fetch_assoc($result)){
        $l[] = $r;
    };

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0);

   
    $active_sheet = $objPHPExcel->getActiveSheet();

    //Создание новой страницы(пример)
    //$objPHPExcel->createSheet();

    //Ориентация и размер страницы
    // $active_sheet->getPageSetup()
        // ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    $active_sheet->getPageSetup()
        ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $active_sheet->getPageSetup()
        ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        
   
    $active_sheet->setTitle("График дорожно-ремонтных работ");
   
    $active_sheet->getColumnDimension('A')->setWidth(10);
    $active_sheet->getColumnDimension('B')->setWidth(26);
    $active_sheet->getColumnDimension('C')->setWidth(50);
    $active_sheet->getColumnDimension('D')->setWidth(15);
    $active_sheet->getColumnDimension('E')->setWidth(15);

    //Объединение ячеек
    $active_sheet->mergeCells('A1:B1');    

    
    $active_sheet->getRowDimension('1')->setRowHeight(30);

   
    $active_sheet->setCellValueByColumnAndRow(0, 1, 'График дорожно-ремонтных работ');
    $active_sheet->setCellValue('A3', 'id_записи');
    $active_sheet->setCellValue('B3', 'Объект');
    $active_sheet->setCellValue('C3', 'Тип_ремонта');
    $active_sheet->setCellValue('D3', 'Расстояние (м)');
    $active_sheet->setCellValue('E3', 'Дата');

   
    $start = 4;
    $i = 0;
    foreach($l as $row_l){
        $next = $start + $i;
        // 
        $active_sheet->setCellValueByColumnAndRow(0, $next, $row_l['id_записи']);
        $active_sheet->setCellValueByColumnAndRow(1, $next, $row_l['Объект']);
        $active_sheet->setCellValueByColumnAndRow(2, $next, $row_l['Тип_ремонта']);
        $active_sheet->setCellValueByColumnAndRow(3, $next, $row_l['Расстояние (м)']);
        $active_sheet->setCellValueByColumnAndRow(4, $next, $row_l['Дата']);
        // 
        $i++;
    };

    //Отправляем заголовки с типом контекста и именем файла
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=ГрафикДорожно-ремонтныхРабот");

    //Сохраняем файл с помощью PHPExcel_IOFactory и указываем тип Excel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    //Отправляем файл
    $objWriter->save('php://output');


?>