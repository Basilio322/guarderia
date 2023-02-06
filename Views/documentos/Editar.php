<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>documentos/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Documentos complementarios de los niños o niñas </p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="docu_id" value="<?php echo $data['documentos']['docu_id']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_ci">El niño o niña cuenta con Carnet de Identidad</label><br>
                                    <select class="form-control" aria-label="Default select example" name="docu_ci" id="docu_ci">
                                        <option value=" <?php echo  $data["documentos"]['docu_ci'] ?>"><?php echo  $data["documentos"]['docu_ci'] ?></option>
                                        <option>-----------------</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_cinum">N° del Carnet de Identidad</label>
                                    <input id="docu_cinum" class="form-control" type="text" name="docu_cinum" value="<?php echo $data["documentos"]['docu_cinum']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_certificado">Cuenta con certificado de Nacimiento</label><br>
                                    <select class="form-control" aria-label="Default select example" name="docu_certificado" id="docu_certificado">
                                        <option value=" <?php echo  $data["documentos"]['docu_certificado'] ?>"><?php echo  $data["documentos"]['docu_certificado'] ?></option>
                                        <option>-----------------</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_ss">Tipo de Seguro de Salud</label><br>
                                    <select class="form-control" aria-label="Default select example" name="docu_ss" id="docu_ss">
                                        <option value=" <?php echo  $data["documentos"]['docu_ss'] ?>"><?php echo  $data["documentos"]['docu_ss'] ?></option>
                                        <option>-----------------</option>
                                        <option value="Pública">Pública</option>
                                        <option value="Privada">Privada</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_ciVacu">Carnet de Vacunas</label><br>
                                    <select class="form-control" aria-label="Default select example" name="docu_ciVacu" id="docu_ciVacu">
                                        <option value=" <?php echo  $data["documentos"]['docu_ciVacu'] ?>"><?php echo  $data["documentos"]['docu_ciVacu'] ?></option>
                                        <option>-----------------</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark h6" for="docu_disc">El niño o niña cuenta con alguna discapacidad</label>
                                    <input id="docu_disc" class="form-control" type="text" name="docu_disc" value="<?php echo $data["documentos"]['docu_disc']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>documentos/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>