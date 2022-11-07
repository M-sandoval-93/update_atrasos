<?php

    require __DIR__."/vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};


    include_once __DIR__."/model/model_conexion.php";



    $conect = new Conexion();
    // $query = "SELECT (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
    // estudiante.ap_estudiante AS ap_paterno, estudiante.am_estudiante AS ap_materno,
    // estudiante.nombres_estudiante AS nombre, estudiante.nombre_social AS n_social, curso.curso, 
    // to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
    // to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso,
    // atraso.estado_atraso
    // FROM atraso
    // INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
    // INNER JOIN matricula ON matricula.id_estudiante = atraso.id_estudiante
    // INNER JOIN curso ON curso.id_curso = matricula.id_curso;";
    // // CONSIDERAR FILTRO POR AÑO Y/O MES, MEDIANTE FORMULARIO MODAL

    // $sentencia = $conexion->preConsult($query);
    // $sentencia->execute();
    // $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);


    $file = new Spreadsheet();
    $file
        ->getProperties()
        ->setCreator("Dpto. Informática")
        ->setLastModifiedBy('Informática')
        ->setTitle('Registro atrasos');

    $file->setActiveSheetIndex(0);
    $sheetActive = $file->getActiveSheet();
    $sheetActive->setTitle("Atrasos");

    $sheetActive->getColumnDimension('A')->setAutoSize(true);
    $sheetActive->getColumnDimension('B')->setAutoSize(true);
    $sheetActive->getColumnDimension('C')->setAutoSize(true);
    $sheetActive->getColumnDimension('D')->setAutoSize(true);
    $sheetActive->getColumnDimension('E')->setAutoSize(true);
    $sheetActive->getColumnDimension('F')->setAutoSize(true);
    $sheetActive->getColumnDimension('H')->setAutoSize(true);
    $sheetActive->getColumnDimension('G')->setAutoSize(true);

    $sheetActive->setCellValue('A1', 'RUT');
    $sheetActive->setCellValue('B1', 'AP PATERNO');
    $sheetActive->setCellValue('C1', 'AP MATERNO');
    $sheetActive->setCellValue('D1', 'NOMBRES');
    $sheetActive->setCellValue('E1', 'CURSO');
    $sheetActive->setCellValue('F1', 'FECHA');
    $sheetActive->setCellValue('G1', 'HORA');
    $sheetActive->setCellValue('H1', 'ESTADO ATRASO');

    // $fila = 2;
    // foreach ($resultados as $resultado) {
    //     $sheetActive->setCellValue('A'.$fila, $resultado['rut']);
    //     $sheetActive->setCellValue('B'.$fila, $resultado['ap_paterno']);
    //     $sheetActive->setCellValue('C'.$fila, $resultado['ap_materno']);
    //     $sheetActive->setCellValue('D'.$fila, $resultado['nombre']);
    //     // Agregar nombre social
    //     $sheetActive->setCellValue('E'.$fila, $resultado['curso']);
    //     $sheetActive->setCellValue('F'.$fila, $resultado['fecha_atraso']);
    //     $sheetActive->setCellValue('G'.$fila, $resultado['hora_atraso']);
    //     $sheetActive->setCellValue('H'.$fila, $resultado['estado_atraso']);
    //     $fila++;
    // }

    // $conexion->closeConnection();
        
        
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Registro atrasos.xlsx"');
    header('Cache-Control: max-age=0');
        
    $writer = IOFactory::createWriter($file, 'Xlsx');
    $writer->save('php://output');
    exit;





?>