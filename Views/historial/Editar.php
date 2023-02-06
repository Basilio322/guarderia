<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>historial/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Datos del Historial Médico</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="hidden" name="his_Id" value="<?php echo $data['historial']['his_Id']; ?>">
                                        <label class="text-dark h6" for="his_Peso">Peso</label>
                                        <input id="his_Peso" class="form-control" type="text" name="his_Peso" value="<?php echo $data['historial']['his_Peso']; ?>">
                                    </div>
                                </div>                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="his_Talla">Talla</label>
                                        <input id="his_Talla" class="form-control" type="text" name="his_Talla" value="<?php echo $data['historial']['his_Talla']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="his_Fecha">Fecha del Control</label>
                                        <input id="his_Fecha" class="form-control" type="date" name="his_Fecha" value="<?php echo $data['historial']['his_Fecha']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="his_Otros">Otros</label>
                                            <input id="his_Otros" class="form-control" type="text" name="his_Otros" value="<?php echo $data['historial']['his_Otros']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>historial/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>