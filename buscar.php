<?php include("db.php") ?>


<?php include("./includes/header.php") ?>

    
    


    <div class="container p-4">

        <?php  if(isset($_SESSION['message'])) { ?>
                
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

        <?php  session_unset();}?>

        <div class="row">

       
            <div class="card">
                <div class="card-body ">
                    <form  method="POST">
                        <div class="form-group col-4 mb-3">
                            <label for="buscar" class="form-label">Fecha creacion de :</label>
                            <input type="date" class="form-control" name="fecha_de">
                        </div>
                        <div class="form-group col-4 mb-3">
                            <label for="buscar" class="form-label">Fecha creacion a:</label>
                            <input type="date" class="form-control" name="fecha_a">
                        </div>
                        <div class="form-group col-4 mb-3">
                            <label for="especialidad">Especialidad:</label>
                            <select name="especialidad" id="">
                                <option value="">Especialidad</option>
                            </select>
                        </div>
                       

                        <input type="submit" class="btn btn-success btn-block mb-3"
                        name="filtrar" value="Filtrar">

                    </form>
                </div>
            </div>


        </div>

       
        
    </div>

 
    <hr>

    <div class="container p-4">
        <div class="row mb-3">
            <div class="col-md-12">

                <table class="table table-bordered table-info">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Especialidad</th>
                            <th>Fecha Creacion</th>
                            <th>Evidencias</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $where = '';
                      


                        if(isset($_POST['filtrar'])){

                        
                        $fecha_de = $_REQUEST['fecha_de'];
                        $fecha_a = $_REQUEST['fecha_a'];

                    
                        if($_REQUEST["fecha_de"] == '' AND $_REQUEST["fecha_a"] = ''){
                            $where = '';
                        }else{

                            if($_REQUEST["fecha_de"] != '' AND $_REQUEST["fecha_a"] != ''){
                                $f1 = $fecha_de;
                                $f2 = $fecha_a;
                                $where = "WHERE fecha_creacion BETWEEN '$f1' AND '$f2'";
                            }

                        }

                    }
                        


                        $query = "SELECT * FROM informe $where";

                        $resultados_informe = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($resultados_informe)){ ?>


                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombre_completo']?></td>
                                <td><?php echo $row['especialidad']?></td>
                                <td><?php echo $row['fecha_creacion']?></td>
                                <td><?php echo $row['evidencia']?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id']?>"
                                        class="btn btn-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                        <a href="eliminar.php?id=<?php echo $row['id']?>" 
                                        class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="observaciones.php?id=<?php echo $row['id']?>"
                                    class="btn btn-primary">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </td>
                                    
                            </tr>


                        <?php 
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>



<?php include("./includes/footer.php") ?>