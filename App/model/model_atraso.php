<?php

    include_once "../model/model_conexion.php";

    require __DIR__."/vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    // use PhpOffice\PhpSpreadsheet\Helper\Sample;
    // use PhpOffice\PhpSpreadsheet\Style\Fill;
    

    class AtrasoEstudiante extends Conexion {

        public function __construct() {
            parent:: __construct();
        }

        public function consultarAtraso() {
            $query = "SELECT atraso.id_atraso, (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
            estudiante.ap_estudiante AS ap_paterno, estudiante.am_estudiante AS ap_materno,
            estudiante.nombres_estudiante AS nombre, estudiante.nombre_social AS n_social, curso.curso, 
            to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
            to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso
            FROM atraso
            INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
            INNER JOIN matricula ON matricula.id_estudiante = atraso.id_estudiante
            INNER JOIN curso ON curso.id_curso = matricula.id_curso
            WHERE EXTRACT(YEAR FROM atraso.fecha_atraso) = EXTRACT(YEAR FROM now())
            AND atraso.estado_atraso = 'sin justificar';";

            $sentencia = $this->preConsult($query);
            $sentencia->execute();
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                if ($atraso['n_social'] != null) {
                    $atraso['nombre'] = '('. $atraso['n_social']. ') '. $atraso['nombre'];
                }
                $this->json['data'][] = $atraso;
            }

            $this->closeConnection();
            return json_encode($this->json);
        }

        public function atrasosSinJustificar($rut) {
            $query = "SELECT atraso.id_atraso, to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
                to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso
                FROM estudiante
                INNER JOIN atraso ON atraso.id_estudiante = estudiante.id_estudiante
                WHERE estudiante.rut_estudiante = ? AND atraso.estado_atraso = 'sin justificar';";

            $sentencia = $this->preConsult($query);
            $sentencia->execute([$rut]);
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                $this->json['data'][] = $atraso;
            }

            $this->closeConnection();
            return json_encode($this->json);
        }

        public function cantidadAtrasos($tipo) {
            if ($tipo == 'diario') {
                $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso 
                WHERE EXTRACT(DAY FROM fecha_atraso) = EXTRACT(DAY FROM CURRENT_DATE)
                AND EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";

            } else if ($tipo == 'total') {
                $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso
                WHERE EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";
            }

            $sentencia = $this->preConsult($query);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($resultado['atrasos'] >= 1) {
                $this->res = $resultado['atrasos'];
            }

            $this->closeConnection();
            return json_encode($this->res);
        }

        public function getEstudiante($rut) {
            $query = "SELECT (estudiante.nombres_estudiante || ' ' || estudiante.ap_estudiante
                || ' ' || estudiante.am_estudiante) AS nombre_estudiante,
                estudiante.nombre_social, curso.curso, estudiante.id_estado
                FROM estudiante
                INNER JOIN matricula ON matricula.id_estudiante = estudiante.id_estudiante
                INNER JOIN curso ON curso.id_curso = matricula.id_curso
                WHERE estudiante.rut_estudiante = ?;";

            $sentencia = $this->preConsult($query);
            $sentencia->execute([$rut]);

            if ($this->json = $sentencia->fetchAll(PDO::FETCH_ASSOC)) {
                $query = "SELECT count(atraso.id_atraso) AS cantidad_atraso FROM atraso
                    INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
                    WHERE estudiante.rut_estudiante = ? AND estado_atraso = 'sin justificar';";
                
                $sentencia = $this->preConsult($query);
                $sentencia->execute([$rut]);
                if ($cantidad_atraso = $sentencia->fetch()) {
                    $this->json[0]['cantidad_atraso'] = $cantidad_atraso['cantidad_atraso'];
                }
                $this->closeConnection();
                return json_encode($this->json);

            }

            $this->closeConnection();
            return json_encode($this->res);
        }

        public function setAtraso($rut) {


            // TRABAJAR PARA CAMBIAR EL ID DE ESTUDIANTE, POR EL ID DE LA MATRICULA
            // CUANDO DE ALMACENA UN ATRASO.

            $queryE = "SELECT id_estudiante FROM estudiante WHERE rut_estudiante = ?;";
            $sentencia = $this->preConsult($queryE);

            if ($sentencia->execute([$rut])) {
                $resultadoE = $sentencia->fetch(PDO::FETCH_ASSOC);

                $query = "INSERT INTO atraso (fecha_hora_actual, fecha_atraso, hora_atraso, id_estudiante)
                    VALUES (CURRENT_TIMESTAMP, CURRENT_DATE, CURRENT_TIME, ?);";

                $sentencia = $this->preConsult($query);
                if ($sentencia->execute([$resultadoE['id_estudiante']])) {
                    $this->res = true;
                }
            }

            $this->closeConnection();
            return json_encode($this->res);
        }

        public function eliminarAtraso($id_atraso) {
            $query = "DELETE FROM atraso WHERE id_atraso = ?;";
            $sentencia = $this->preConsult($query);
            
            if ($sentencia->execute([$id_atraso])) {
                $this->res = true;
            }

            $this->closeConnection();
            return json_encode($this->res);
        }

        public function setJustificar($id_apoderado, $atrasos, $id_usuario) {
            $query = "UPDATE atraso
                SET estado_atraso = 'justificado', id_usuario_justifica = ?, fecha_hora_justificacion = CURRENT_TIMESTAMP, id_apoderado_justifica = ?
                WHERE id_atraso = ?;";

            $sentencia = $this->preConsult($query);
            foreach ($atrasos as $atraso) {
                if ($sentencia->execute([$id_usuario, $id_apoderado, $atraso])) {
                    $this->res = true;
                }
            }
            
            $this->closeConnection();
            return json_encode($this->res);

        }

        public function getExcelAtraso($ext) {
            $query = "SELECT (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
            estudiante.ap_estudiante AS ap_paterno, estudiante.am_estudiante AS ap_materno,
            estudiante.nombres_estudiante AS nombre, estudiante.nombre_social AS n_social, curso.curso, 
            to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
            to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso,
            atraso.estado_atraso
            FROM atraso
            INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
            INNER JOIN matricula ON matricula.id_estudiante = atraso.id_estudiante
            INNER JOIN curso ON curso.id_curso = matricula.id_curso;";

            $sentencia = $this->preConsult($query);
            $sentencia->execute();
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $extension = 'Xlsx';

            $file = new Spreadsheet();
            $file
                ->getProperties()
                ->setCreator("Dpto. Informática")
                ->setLastModifiedBy('Informática')
                ->setTitle('Registro atrasos');
            
            $file->setActiveSheetIndex(0);
            $sheetActive = $file->getActiveSheet();
            $sheetActive->setTitle("Atrasos");
            $sheetActive->setShowGridLines(false);
            $sheetActive->getStyle('A1')->getFont()->setBold(true)->setSize(14);
            $sheetActive->getStyle('A3:H3')->getFont()->setBold(true)->setSize(12);
            $sheetActive->setAutoFilter('A3:H3');

            $sheetActive->mergeCells('A1:D1');
            $sheetActive->setCellValue('A1', 'REGISTRO ATRASO ESTUDIANTES');
            
            $sheetActive->getColumnDimension('A')->setWidth(13);
            $sheetActive->getColumnDimension('A')->setWidth(15);
            $sheetActive->getColumnDimension('B')->setWidth(15);
            $sheetActive->getColumnDimension('C')->setWidth(15);
            $sheetActive->getColumnDimension('D')->setWidth(25);
            $sheetActive->getColumnDimension('E')->setWidth(10);
            $sheetActive->getColumnDimension('F')->setWidth(15);
            $sheetActive->getColumnDimension('G')->setWidth(15);
            $sheetActive->getColumnDimension('H')->setWidth(20);
        
            $sheetActive->setCellValue('A3', 'RUT');
            $sheetActive->setCellValue('B3', 'AP PATERNO');
            $sheetActive->setCellValue('C3', 'AP MATERNO');
            $sheetActive->setCellValue('D3', 'NOMBRES');
            $sheetActive->setCellValue('E3', 'CURSO');
            $sheetActive->setCellValue('F3', 'FECHA');
            $sheetActive->setCellValue('G3', 'HORA');
            $sheetActive->setCellValue('H3', 'ESTADO ATRASO');

            $fila = 4;
            foreach ($atrasos as $atraso) {
                $sheetActive->setCellValue('A'.$fila, $atraso['rut']);
                $sheetActive->setCellValue('B'.$fila, $atraso['ap_paterno']);
                $sheetActive->setCellValue('C'.$fila, $atraso['ap_materno']);

                // Control de nombre social
                if ($atraso['n_social'] == '') {
                    $sheetActive->setCellValue('D'.$fila, $atraso['nombre']);
                } else {
                    $sheetActive->setCellValue('D'.$fila, '('.$atraso['n_social'].') '.$atraso['nombre']);
                }

                $sheetActive->setCellValue('E'.$fila, $atraso['curso']);
                $sheetActive->setCellValue('F'.$fila, $atraso['fecha_atraso']);
                $sheetActive->setCellValue('G'.$fila, $atraso['hora_atraso']);
                $sheetActive->setCellValue('H'.$fila, $atraso['estado_atraso']);
                $fila++;
            }

            if ($ext == 'Csv') {
                $extension = 'Csv';
            } 
            // else if ($ext == 'Pdf') {
            //     $extension = 'Mpdf';
            //     // IOFactory::registerWriter('pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);
            // }
            
            $writer = IOFactory::createWriter($file, $extension);

            ob_start();
            $writer->save('php://output');
            $xlsData = ob_get_contents();
            ob_end_clean();

            $file = array (
                "data" => 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; base64,'.base64_encode($xlsData)
                // "data" => 'data: application/pdf; base64,'.base64_encode($xlsData)
                // "data" => 'data:application/pdf; base64,'.base64_encode($xlsData)
                // "data" => 'data:application/pdf; base64'.base64_encode($xlsData)
            );

            $this->closeConnection();
            return json_encode($file);

        }

    }



?>