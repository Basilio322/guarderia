<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos Docente</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_docente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>docente/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El datos del docente ya existen</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del docente registrados</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del docente Modificados</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>                                    
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Telefono</th>
                                    <th class="border border-dark">Email</th>
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Profesión o Carrera</th>
                                    <th class="border border-dark">Institución Proveniente</th>
                                    <th class="border border-dark">Sala</th>
                                    <th class="border border-dark">Tipo de Contrato</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['docente'] as $docente) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $docente['doc_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Materno']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $docente['doc_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Telefono']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Email']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Direccion']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Profesion']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_instProv']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['s_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Contrato']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>docente/editar?doc_Id=<?php echo $docente['doc_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>docente/eliminar?doc_Id=<?php echo $docente['doc_Id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_docente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Docente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>docente/insertar" autocomplete="off">
                <div class="modal-body row">
                    <div class="form-group col-md-10">
                        <label class="text-white h6" for="doc_Nombres">Nombres</label>
                        <input id="doc_Nombres" class="form-control" type="text" name="doc_Nombres" required="Nombres">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="doc_Paterno">Apellido Paterno</label>
                        <input id="doc_Paterno" class="form-control" type="text" name="doc_Paterno" required="Apellido Paterno">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="doc_Materno">Apellido Materno</label>
                        <input id="doc_Materno" class="form-control" type="text" name="doc_Materno" required="Apellido Materno">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="doc_Telefono">Telefono</label>
                        <input id="doc_Telefono" class="form-control" type="text" name="doc_Telefono" required="Telefono">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="doc_Email">Email</label>
                        <input id="doc_Email" class="form-control" type="email" name="doc_Email" required="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="text-white h6" for="doc_Direccion">Dirección</label>
                        <input id="doc_Direccion" class="form-control" type="text" name="doc_Direccion" required="Dirección">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="text-white h6" for="doc_Profesion">Profesion o Carrera</label>
                        <input id="doc_Profesion" class="form-control" type="text" name="doc_Profesion" required="Dirección">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="text-white h6" for="doc_instProv">Institución Proveniente</label>
                        <input id="doc_instProv" class="form-control" type="text" name="doc_instProv" required="Dirección">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-white h6" for="s_Id">Salas</label>

                            <select id="s_Id" class="form-control" name="s_Id">

                                <option required="elija">-----------------</option>
                                <?php
                                foreach ($data["salas"] as $nino) {
                                ?>
                                    <option value="<?php echo $nino["s_Id"] ?>"><?php echo $nino["s_nombre"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="doc_Contrato">Tipo de Contrato</label>

                        <select class="form-control " aria-label=".form-select-lg example" id="doc_Contrato" name="doc_Contrato">
                            <option selected>Seleccione uno</option>
                            <option value="Contrato Laboral">Contrato Laboral</option>
                            <option value="Practicante">Practicante</option>
                            <option value="Voluntarios">Voluntarios</option>
                        </select>
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