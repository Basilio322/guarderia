<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>pensiones/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Datos de las Mensualidades</46>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pen_Monto">Mensualidad</label>
                                        <input type="hidden" name="pen_id" value="<?php echo $data['pensiones']['pen_id']; ?>">
                                        <input id="pen_Monto" class="form-control" type="text" name="pen_Monto" value="<?php echo $data['pensiones']['pen_Monto']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pen_Fecha">Fecha de la Mensualidad</label>
                                        <input id="pen_Fecha" class="form-control" type="date" name="pen_Fecha" value="<?php echo $data['pensiones']['pen_Fecha']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pen_Observacion">Observaciones</label>
                                        <input id="pen_Observacion" class="form-control" type="text" name="pen_Observacion" value="<?php echo $data['pensiones']['pen_Observacion']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>pensiones/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>