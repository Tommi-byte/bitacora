<!-- Los include nos permiten reutilizar ciertas partes del codigo para cada pagina de la web-->

<?php include("db.php") ?>

<?php include("includes/header.php") ?>;
    

<div class="container p-4">

    <div class="row">

        <div class="col-md-12">

            <?php  if(isset($_SESSION['message'])) { ?>
                
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php  session_unset();}?>

            <div class="card">

                <div class="card-header bg-secondary bg-gradient">

                    <strong>Complete los datos</strong> 
            
                </div>

                <div class="card-body bg-secondary bg-gradient">

                    <form action="guardar_informe.php" method="POST" class="needs-validation" novalidate>

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" 
                            id="name" placeholder="Nombre Completo" autofocus required>
                            <div class="valid-feedback">Se vee bien!</div>
                            <div class="invalid-feedback">Falta el nombre :c</div>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="especialidad" class="form-label">Especialidad:</label>
                            <input type="text" name="especialidad" class="form-control"
                            placeholder="Nombre Especialidad" required>
                            <div class="valid-feedback">Se vee bien!</div>
                            <div class="invalid-feedback">Falta la especialidad :c</div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="observaciones">Observaciones:</label>
                            <textarea name="observaciones" rows="10" class="form-control"
                            placeholder="Escribe aqui lo sucedido...." required></textarea>
                            <div class="valid-feedback">Se vee bien!</div>
                            <div class="invalid-feedback">Falta las observaciones :c</div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="evidencia">Evidencias: (opcional)</label>
                            <input type="file" name="evidencia" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-success btn-block mb-3"
                        name="guardar_bitacora" value="Guardar Informe">

                        <a href="buscar.php">
                            <input type="text" class="btn btn-primary btn-block mb-3"
                            name="buscar_bitacora" value=" ir al buscador">
                        </a>
                    </form>
                </div>

            </div>

        </div>


    </div>




</div>



<?php include("includes/footer.php")?>;
    
