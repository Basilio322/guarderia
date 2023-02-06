<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>salas/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Datos del Contacto de Emergencia</46>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="s_nombre">Nombre d ela sala</label>
                                    <input type="hidden" name="s_Id" value="<?php echo $data['s_Id']; ?>">
                                    <input id="s_nombre" class="form-control" type="text" name="s_nombre" value="<?php echo $data['s_nombre']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="s_descripcion">Descripción</label>
                                            <input id="s_descripcion" class="form-control" type="text" name="s_descripcion" value="<?php echo $data['s_descripcion']; ?>">
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>salas/Listar" class="btn btn-danger">Regresar</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>