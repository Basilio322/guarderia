<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Documentos complementarios de los niños y niñas </p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_documentos"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>documentos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El documentos medico ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>documentos medico registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>documentos medico Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive p-2">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-usuarios">
                                <tr>
                                    <th class="border border-dark">Nº</th>
                                    <th class="border border-dark">nombres Niño/Niña</th>
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Ci número</th>
                                    <th class="border border-dark">Certificado de Nacimiento</th>
                                    <th class="border border-dark">Tipo de Seguro de Salud</th>
                                    <th class="border border-dark">Carnet de Vacunas</th>
                                    <th class="border border-dark">Discapacidad</th>

                                    <th class="border border-dark">Accion</th>
                                </tr>
                            </thead>
                            <tbody class="table-table-group-divider">
                                <?php foreach ($data["documentos"] as $documentos) {

                                    if ($documentos['docu_estado'] == 1) {
                                        $docu_estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $docu_estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }

                                ?>
                                    <tr>

                                        <td class="border border-dark"><?php echo $documentos['docu_id']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['reg_Nombres'] . " " . $documentos['reg_Paterno']; ?></td>
                                        <td class='border border-dark'><?php echo $documentos['docu_ci']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_cinum']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_certificado']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_ss']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_ciVacu']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_disc']; ?></td>


                                        <!-- <td class="border border-dark"><?php echo $documentos['his_ControlN']; ?></td> -->
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>documentos/editar?docu_id=<?php echo $documentos['docu_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>documentos/eliminar?docu_id=<?php echo $documentos['docu_id']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nuevo_documentos" class="modal fade" tabindex="-" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Apderado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>documentos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-22">
                            <div class="form-group">
                                <label for="ins_Id">Id Inscripcion</label>

                                <select id="ins_Id" class="form-control" name="ins_Id">
                                    <option value="">Elija un niño</option>
                                    <?php
                                    foreach ($data["inscripcion"] as $nino) {
                                    ?>
                                        <option value="<?php echo $nino["ins_Id"] ?>"><?php echo $nino["reg_Nombres"] . " " . $nino["reg_Paterno"] . " " . $nino["reg_Materno"] ?></option>
                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="docu_ci">El niño o niña cuenta con Carnet de Identidad</label>
                                <select class="form-control " aria-label=".form-select-lg example" id="docu_ci" name="docu_ci">
                                    <option selected>Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="text-white h6" for="docu_cinum">Carnet de Identidad</label>
                            <input id="docu_cinum" class="form-control" type="text" name="docu_cinum">
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="docu_certificado">Certificado de Nacimiento</label>
                                <select class="form-control " aria-label=".form-select-lg example" id="docu_certificado" name="docu_certificado">
                                    <option selected>Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="docu_ss">Tipo de seguro de salud</label>
                                <select class="form-control " aria-label=".form-select-lg example" id="docu_ss" name="docu_ss">
                                    <option selected>Seleccione una opción</option>
                                    <option value="Pública">Pública</option>
                                    <option value="Privada">Privada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="docu_ciVacu">Carnet de vacunas</label>
                                <select class="form-control " aria-label=".form-select-lg example" id="docu_ciVacu" name="docu_ciVacu">
                                    <option selected>Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark h6" for="docu_disc">Discapacidad</label>
                                <input id="docu_disc" class="form-control" type="text" name="docu_disc">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>