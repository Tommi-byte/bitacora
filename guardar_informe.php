<?php 

include("db.php");

if(isset($_POST['guardar_bitacora'])){
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $observacion = $_POST['observaciones'];
    $evidencia = $_POST['evidencia'];

    $query = "INSERT INTO informe(nombre_completo, especialidad, observaciones, evidencia) 
            VALUES ('$nombre', '$especialidad', '$observacion', '$evidencia')";
    
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Fallo la query");
    }

    $_SESSION['message'] = 'Informe guardado correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}


?>