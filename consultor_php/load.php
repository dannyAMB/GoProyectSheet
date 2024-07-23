<?php
require 'config.php';

$columns=[ 
    'documento',
    'Nombres'	,
    'Apellidos',
    'UsuarioCorreo'	,
    'claveCanvas'	,
   'CorreoElectrónico'	,
    'programa',
    'celular'	];

    $table="consulado_iud";
   $campo= isset($_POST['campo'])? $conn->real_escape_string($_POST['campo']):null; //opción 2 por compatibilidad

   // $campo= $conn->real_escape_string($_POST['campo'])??null; //simplificado - php 7 o superior


// Filtrado
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


    $sql = "SELECT  ". implode(",",$columns) ."
    
    FROM $table $where";
    $resultado = $conn->query($sql);
    $num_rows = $resultado->num_rows; 

    $html = '';

    if($num_rows> 0){
        $cont2 = 0;

        while($row = $resultado->fetch_assoc()){
            $cont2 = $cont2 +1;
            $html .= '<tr id="alumno' .$cont2.'">';
            $html .= '<td>'.$row['documento'].'</td>';
            $html .= '<td>'.$row['Nombres'].'</td>';       
            $html .= '<td>'.$row['Apellidos'].'</td>';
            $html .= '<td>'.$row['UsuarioCorreo'].'</td>';
            $html .= '<td>'.$row['claveCanvas'].'</td>';
            
            $html .= '<td>'.$row['CorreoElectrónico'].'</td>';
            $html .= '<td>'.$row['programa'].'</td>';
            $html .= '<td>'.$row['celular'].'</td>';
            $html .= '<td><a class="btn btn-primary" href="http://localhost/consultor_php/index.php?user='.$row['UsuarioCorreo'].'&campo='.$campo.'" role="button">Link</a>';
            $html .= '</tr>';
    
            }    }
            else{

                $html .= '<tr>';
                $html .= '<td colspan="9" class="text-align_center">Sin resultados</td>';

                $html .= '</tr>';

            }

            echo json_encode($html,JSON_UNESCAPED_UNICODE);

?>