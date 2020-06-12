<?php
//Conectando a Base de datos

$tabla_db="data_contacto";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];

$comentario=$_POST['comentario'];



try {
  $con = new PDO('mysql:host=localhost;dbname=atlasmedia_solicitud', 'atlasmedia_contactos', 'SS*AOgLqA_4]');
  $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $con ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  
     $con->exec("SET CHARACTER SET utf8");

  $sql="INSERT INTO $tabla_db (nombre, apellido, telefono, email,comentario)
                                    VALUES
                        (:nombre, :apellido, :telefono, :email, :comentario)";
                                
  
    $result = $con->prepare($sql);
    $result->execute(array('nombre' => $nombre, 'apellido'=>$apellido,'telefono'=>$telefono, 'email'=>$email,'comentario'=>$comentario)) 
                           or die ('<br> No se Envio El dato a la DB') ;

  
  }catch (Exception $e){
  
      die ('Error '.$e->GetMessage());}
  $con=null;
  include("../subpaginas/VentanaExito.html");

?>