<?php 
    include 'conectar.php';

function query_obt_info($departamento){
    $conexion = new connex();
    $query = "SELECT COUNT(funcionario.cod_funcionario) as num, departamento.desc_departamento as departamento FROM cargo JOIN departamento ON cargo.cod_departamento = departamento.cod_departamento
    JOIN funcionario ON funcionario.cod_cargo = cargo.cod_cargo WHERE departamento.cod_departamento = ".$departamento." group by departamento.cod_departamento;";
    
    $consulta   = $conexion->query_exe($query);
    $fila = $conexion->row($consulta);

    $query2= "SELECT funcionario.cod_funcionario as cod, funcionario.rut, CONCAT(funcionario.nombres, ' ', funcionario.apellido_paterno, ' ', funcionario.apellido_materno) AS nombre, cargo.desc_cargo AS cargo, funcionario.desc_funcionario AS labor, funcionario.mail AS correo FROM cargo JOIN departamento ON cargo.cod_departamento = departamento.cod_departamento JOIN funcionario ON 
        funcionario.cod_cargo = cargo.cod_cargo WHERE departamento.cod_departamento = ".$departamento.";";
    $consulta2   = $conexion->query_exe($query2);

    $array_estudios = ""; 
    $i = 1;

    echo "<a role='button' href='index.php'><h1  class= 'titulo' align='center' style='font-weight=bold;'>Departamento ".str_replace(  "'", "", $fila['departamento'])."</h1></a><br><br";

    while ($res = $conexion->row($consulta2)) {
        $query_estudios = "SELECT CONCAT(estudio_curriculo.ano_egreso, ' ',institucion_educacional.desc_institucion_educacional, '-',estudio_curriculo.desc_estudio_curriculo, ';') AS estudios FROM institucion_educacional JOIN estudio_curriculo ON institucion_educacional.cod_institucion_educacional = estudio_curriculo.cod_institucion_educacional JOIN funcionario ON funcionario.cod_funcionario = estudio_curriculo.cod_funcionario WHERE funcionario.cod_funcionario = ".$res['cod'].";";
        $consulta3   = $conexion->query_exe($query_estudios);  
        $img = $res['rut'];
        while ($resultado = $conexion->row($consulta3)) {
            $array_estudios .= $resultado['estudios'];
        }

        if ($fila['num'] == 1) {
            echo "<div class = 'row'>";
            $clase='col-md-4 col-sm-4 col-xs-3 col-lg-4 col-md-offset-4';
            cargar_informacion($clase, 0,$res['nombre'], $res['cargo'], $res['labor'], $res['correo'], $array_estudios, $img);
             echo "</div";    
        }elseif ($fila['num'] > 1) {
            if ($i == 1) {
                echo "<div class = 'row'>";
                $clase = 'col-md-4 col-sm-4 col-xs-3 col-lg-4';
                cargar_informacion($clase, 0,$res['nombre'], $res['cargo'], $res['labor'], $res['correo'], $array_estudios, $img);
                $i++;
            }elseif ($i == 2) {
                $clase = 'col-md-4 col-xs-4 col-lg-4';
                cargar_informacion($clase, -25,$res['nombre'], $res['cargo'], $res['labor'], $res['correo'], $array_estudios, $img);
                $i++;
            }elseif ($i == 3) {
                $clase = 'col-md-4 col-xs-4 col-lg-4';
                cargar_informacion($clase, -50,$res['nombre'], $res['cargo'], $res['labor'], $res['correo'], $array_estudios, $img);
                $i = 1;
                echo "</div>";
            }
        }    
    }
    $conexion->cerrar();     
}


function generar_index(){
    $conexion = new connex();
    $array = file('personas_principales.php',FILE_IGNORE_NEW_LINES);;
    $query = "SELECT funcionario.cod_funcionario, funcionario.rut, CONCAT(funcionario.nombres, ' ',funcionario.apellido_paterno, ' ', funcionario.apellido_materno) as nombre, funcionario.desc_funcionario as labor, funcionario.mail as correo, cargo.desc_cargo as cargo, departamento.desc_departamento,
                departamento.cod_departamento from funcionario join cargo on cargo.cod_cargo = funcionario.cod_Cargo join departamento on 
                departamento.cod_departamento = cargo.cod_departamento WHERE funcionario.cod_funcionario in (".implode(',', $array).") order by funcionario.cod_funcionario;";
      
    $consulta = $conexion->query_exe($query);
    

    while ($fila = $conexion->row($consulta)) {
        $array_estudios = "";
        $query_estudios = "SELECT CONCAT(estudio_curriculo.ano_egreso, ' ',institucion_educacional.desc_institucion_educacional, '-',estudio_curriculo.desc_estudio_curriculo, ';') AS estudios FROM institucion_educacional JOIN estudio_curriculo ON institucion_educacional.cod_institucion_educacional = estudio_curriculo.cod_institucion_educacional JOIN funcionario ON funcionario.cod_funcionario = estudio_curriculo.cod_funcionario WHERE funcionario.cod_funcionario = ".$fila['cod_funcionario'].";";
        $consulta3 = $conexion->query_exe($query_estudios);       
        $img = $fila['rut'];
        while ($resultado = $conexion->row($consulta3)) {
            $array_estudios .= $resultado['estudios'];
        }

            echo "<div class='row'>";
            echo "<div class='col-md-12 col-md-offset-1' style='padding-bottom: 52px; align-content: center;'>"; 
            echo "<a role='button' onclick='cargar_departamento(".$fila['cod_departamento'].");'><h1 class='titulo' style='margin-right: 250px;'>Departamento de ".$fila['desc_departamento']."</h1></a>";
            echo "</div>";

            cargar_informacion("col-md-4 col-sm-4 col-xs-4 col-lg-4 col-md-offset-4", 0, $fila['nombre'], $fila['cargo'], $fila['labor'], $fila['correo'], $array_estudios, $img); 

            echo "</div><br>";
    }
}


function cargar_informacion($clase, $margin,$nombre, $cargo, $labor, $correo, $estudios, $img){
	$lista = "";
	$lista .= "<div class='".$clase."' style='margin-bottom: 180px; margin-top:".$margin."px !important;'>";
    $lista .= "<div class='card-flip'>";
    $lista .= "<div class='flip'>";
    $lista .= "<div class='front'>";
    $lista .= "<div class='card'>";
    $lista .= "<img class='card-img-top' src='img/funcionarios/".$img.".jpg' data-holder-rendered='true' style='object-position: center;'>";
    $lista .= "<div class='card-block'>";
    $lista .= "<h4 class='nombre' ><span>".$nombre."</span></h4>";
    $lista .= "<h5 class='cargo' >".$cargo."</h5><br>";
    $lista .= "<p class='card-text datos'><i class='fas fa-quote-left' style='margin-right: 5px;'></i><span>".$labor."</span><i class='fas fa-quote-right' style='margin-left: 5px;'></i></p><br>";
    $lista .= "<h5 class='email'><i class='far fa-envelope fa-2x'></i>".$correo."</h5>";
    $lista .= "</div>";
    $lista .= "</div>";
    $lista .= "</div>";
    $lista .= "<div class='back'>";
    $lista .= "<div class='card'>";              
    $lista .= "<div class='card-block'>";
    $lista .= "<h4 class='card-title nombre'>$nombre</h4><br>";
    $lista .= "<h5 class='cargo subtitulo' style='font-style:inherit;'> Antecedentes académicos</h5><br>";
    $lista .= "<div class='datos'>";

    if ($estudios != ' ') {
        $valores = explode(";" ,$estudios);
        $largo = count($valores);
        $i = 0;

        while ($i < $largo-1) {           
            $separador = explode("-", $valores[$i]);
            $lista .= "<h6 class='Universidad'> <i class='glyphicon glyphicon-plus fa-1x' style='margin-right: 10px;'></i>".$separador[0]."</h6>";
            $lista .= "<h6 class='titulo-obt' style='font-size: 14px;'><i class='fas fa-minus fa-1x' style='margin-right: 5px;'></i>".$separador[1]."</h6><br>";
            $i++;
        }

    }else{
        $lista .= "<h6 class='Universidad'> <i class='glyphicon glyphicon-plus fa-1x' style='margin-right: 10px;'></i></h6>";
        $lista .= "<h6 class='titulo-obt' style='font-size: 14px;'><i class='fas fa-minus fa-1x' style='margin-right: 5px;'></i></h6><br>";
    }
      
    $lista .= "</div>";
    $lista .= "</div>  "  ;          
    $lista .= "</div>";
    $lista .= "</div>";
    $lista .= "</div>";
    $lista .= " </div>";            
    $lista .= "</div><br>";
    echo $lista;

}

 ?>