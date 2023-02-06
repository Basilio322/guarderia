<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>docente/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Datos del Docente</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="doc_Nombres">Nombres</label>
                                        <input type="hidden" name="doc_Id" value="<?php echo $data['docente']['doc_Id']; ?>">
                                        <input id="doc_Nombres" class="form-control" type="text" name="doc_Nombres" value="<?php echo $data['docente']['doc_Nombres']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="doc_Paterno">Apellido Paterno</label>
                                        <input id="doc_Paterno" class="form-control" type="text" name="doc_Paterno" value="<?php echo $data['docente']['doc_Paterno']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="doc_Materno">Apellido Materno</label>
                                        <input id="doc_Materno" class="form-control" type="text" name="doc_Materno" value="<?php echo $data['docente']['doc_Materno']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row lg-6">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="text-dark h6" for="doc_Telefono">Telefono Celular</label>
                                        <input id="doc_Telefono" class="form-control" type="text" name="doc_Telefono" value="<?php echo $data['docente']['doc_Telefono']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="doc_Email">Correo Electrónico</label>
                                        <input id="doc_Email" class="form-control" type="text" name="doc_Email" value="<?php echo $data['docente']['doc_Email']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="text-dark h6" for="doc_Direccion">Dirección</label>
                                    <input id="doc_Direccion" class="form-control" type="text" name="doc_Direccion" value="<?php echo $data['docente']['doc_Direccion']; ?>">
                                </div>
                                <div class="row lg-6">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="text-dark h6" for="doc_Profesion">Profesión o Carrera</label>
                                            <input id="doc_Profesion" class="form-control" type="text" name="doc_Profesion" value="<?php echo $data['docente']['doc_Profesion']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="doc_instProv">Institución Proveniente</label>
                                            <input id="doc_instProv" class="form-control" type="text" name="doc_instProv" value="<?php echo $data['docente']['doc_instProv']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="s_Id">Salas</label>

                                        <select id="s_Id" class="form-control" name="s_Id">
                                            <option value="">Elija una sala</option>
                                            <?php foreach ($data['salas'] as $dataSalas) { ?>

                                                <option <?php if ($dataSalas['s_Id'] == $data['docente']['s_Id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $dataSalas['s_Id']; ?>"><?php echo $dataSalas['s_nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="doc_Contrato">Parentesco</label><br>
                                        <select class="form-control" aria-label="Default select example" name="doc_Contrato" id="doc_Contrato">
                                            <option value=" <?php echo  $data["docente"]['doc_Contrato'] ?>"><?php echo  $data["docente"]['doc_Contrato'] ?></option>
                                            <option>Selecciones uno</option>
                                            <option value="Contrato Laboral">Contrato Laboral</option>
                                            <option value="Practicante">Practicante</option>
                                            <option value="Voluntarios">Voluntarios</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>docente/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>