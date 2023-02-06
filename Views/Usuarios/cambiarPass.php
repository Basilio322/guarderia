<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Usuarios/cambiar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Usuario</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="contrasena" class="form-control" type="text" name="contrasena" placeholder="contrasena" value="<?php echo $data['clave']; ?>">
                            </div>                            
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Modificar</button>

                            <a href="<?php echo base_url(); ?>Usuarios/Listar" class="btn btn-danger">Regresar</a>
                            <a href="<?php echo base_url(); ?>Usuarios/cambiar" class="btn btn-danger">CambiarPass</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>