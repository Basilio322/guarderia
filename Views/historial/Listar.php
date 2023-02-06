<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos del Historial Médico</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_historial"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>historial/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El historial medico ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>historial medico registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>historial medico Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <p class="fs-5 fw-bold">Número de control</p>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar"> Inicio</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar1"> 1º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar2"> 2º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar3"> 3º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar4"> 4º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar5"> 5º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar6"> 6º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar7"> 7º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar8"> 8º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar9"> 9º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar10"> 10º Control</a>
                    </div>
                    <div class="table-responsive p-2">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="table-primary border border-primary">Nº</th>
                                    <th class="table-primary border border-primary">nombres Niño/Niña</th>
                                    <th class="table-primary border border-primary">Peso</th>

                                    <th class="table-primary border border-primary">Talla</th>
                                    <th class="table-primary border border-primary">Fecha de Control</th>
                                    <th class="table-primary border border-primary">Numero de Control</th>
                                    <th class="table-primary border border-primary">Observaciones</th>

                                    <th class="table-primary border border-primary">Accion</th>
                                </tr>
                            </thead>
                            <tbody class="table-table-group-divider">
                                <?php foreach ($data["historial"] as $regmedico) {

                                    if ($regmedico['his_estado'] == 1) {
                                        $his_Estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $his_Estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }

                                ?>
                                    <tr>

                                        <td class="border border-primary"><?php echo $regmedico['his_Id']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['reg_Nombres'] . " " . $regmedico['reg_Paterno']; ?></td>
                                        <td class='border border-primary'><?php echo $regmedico['his_Peso']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Talla']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Fecha']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_ControlN']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Otros']; ?></td>


                                        <!-- <td class="border border-primary"><?php echo $regmedico['his_ControlN']; ?></td> -->
                                        <td class="border border-primary">
                                            <a href="<?php echo base_url() ?>historial/editar?his_Id=<?php echo $regmedico['his_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>historial/eliminar?his_Id=<?php echo $regmedico['his_Id']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            <a href="<?php echo base_url() ?>inscripcion/pdf?ins_Id=<?php echo $inscripcion['ins_Id'] . '&id_Gestion=' . $inscripcion['id_Gestion']; ?>" target="_blank" class="btn btn-success mb-2" title="Imprimir"><i class="fa-solid fa-print"></i></a>
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
<div id="nuevo_historial" class="modal fade" tabindex="-" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Apderado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>historial/insertar" autocomplete="off">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="his_Peso">Peso</label>
                                <input id="his_Peso" class="form-control" type="text" name="his_Peso">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="his_Talla">Talla</label>
                                <input id="his_Talla" class="form-control" type="text" name="his_Talla">
                            </div>
                        </div>
                        <div class="col-md-2¡4">
                            <div class="form-group">
                                <label for="his_Fecha">Fecha de Control</label>
                                <input id="his_Fecha" class="form-control" type="date" name="his_Fecha">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="his_Otros">Observaciones</label>
                                <input id="his_Otros" class="form-control" type="text" name="his_Otros">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="his_ControlN">Número de Control</label>
                                <select class="form-control " aria-label=".form-select-lg example" id="his_ControlN" name="his_ControlN">
                                    <option selected>Seleccione uno</option>
                                    <option value="Primer Control">Primer Control</option>
                                    <option value="Segundo Control">Segundo Control</option>
                                    <option value="Tercer Control">Tercer Control</option>
                                    <option value="Cuarto Control">Cuarto Control</option>
                                    <option value="Quinto Control">Quinto Control</option>
                                    <option value="Sexto Control">Sexto Control</option>
                                    <option value="Septimo Control">Septimo Control</option>
                                    <option value="Octavo Control">Octavo Control</option>
                                    <option value="Noveno Control">Noveno Control</option>
                                    <option value="Decimo Control">Decimo Control</option>
                                </select>
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