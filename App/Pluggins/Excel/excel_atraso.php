<?php

    require __DIR__."/vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $file = new Spreadsheet();
    $file
        ->getProperties()
        ->setCreator("Dpto. Informática")
        ->setLastModifiedBy('Informática') // última vez modificado por
        ->setTitle('Registro atrasos');
        // ->setSubject('El asunto')
        // ->setDescription('')
        // ->setKeywords('etiquetas o palabras clave separadas por espacios')
        // ->setCategory('La categoría');

    $file->setActiveSheetIndex(0);
    $sheetActive = $file->getActiveSheet();
        
        
        
        
        
    $nameFile = "Registro_Atrasos.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $nameFile . '"');
    header('Cache-Control: max-age=0');
        
    $writer = IOFactory::createWriter($file, 'Xlsx');
    $writer->save('php://output');
    exit;



?>