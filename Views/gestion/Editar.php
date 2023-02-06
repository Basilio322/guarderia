<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>gestion/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Datos del gestion</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="ges_anio">Año de Gestión</label>
                                        <input type="hidden" name="id_Gestion" value="<?php echo $data['gestion']['id_Gestion']; ?>">
                                        <input id="ges_anio" class="form-control" type="text" name="ges_anio" value="<?php echo $data['gestion']['ges_anio']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="ges_mensualidad">Costo de Mensualidad</label>
                                        <input id="ges_mensualidad" class="form-control" type="text" name="ges_mensualidad" value="<?php echo $data['gestion']['ges_mensualidad']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="ges_observaciones">Observaciones</label>
                                        <input id="ges_observaciones" class="form-control" type="text" name="ges_observaciones" value="<?php echo $data['gestion']['ges_observaciones']; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>gestion/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>