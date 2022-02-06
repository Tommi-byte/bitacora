<?php


    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM informe WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre_completo'];
            $especialidad = $row['especialidad'];
            $observacion = $row['observaciones'];
            $evidencia = $row['evidencia'];


        }
    }

    if(isset($_POST['actualizar'])){

        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $especialidad = $_POST['especialidad'];
        $observacion = $_POST['observaciones'];
        $evidencia = $_POST['evidencia'];

        $query = "UPDATE informe set nombre_completo = '$nombre', 
        especialidad = '$especialidad', 
        observaciones = '$observacion',
        evidencia = '$evidencia' 
        WHERE id = $id";

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Registro Actualizado Correctamente';
        $_SESSION['message_type'] = "warning";

        header("Location: buscar.php");

    }

?>

<?php include("includes/header.php") ?>

    <div class="contenedor p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php  echo $_GET['id'];?>" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                            class="form-control" placeholder="Actualiza el nombre">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="especialidad" value="<?php echo $especialidad; ?>"
                            class="form-control" placeholder="Actualiza la especialidad">
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="observaciones"  rows="10" class="form-control" placeholder="Actualiza"
                            > <?php  echo $observacion ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <input type="file" name="evidencia" value="<?php  echo $evidencia?>" class="form-control">
                        </div>
                        <button class=" btn btn-success" name="actualizar">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include("includes/footer.php") ?>