<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos para Inscripción</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-8 mb-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_inscripcion"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>inscripcion/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>inscripcion/pdfGeneral" target="_blank"><i class="fa-solid fa-print"></i> Reporte General</a>
                            <form class="row col-lg-12">
                                <div class="col-md-4 p-2">
                                    <a href="<?php echo base_url(); ?>inscripcion/pdfGestion?id_Gestion=<?php echo $inscripcion['id_Gestion']; ?> " class="btn btn-success mb-2" title="Imprimir" target="_blank"><i class="fa-solid fa-print"></i>Reporte por Gestión</a>
                                </div>
                                <div class="col-md-4 p-2">
                                    <select id="id_Gestion" class="form-control" name="id_Gestion">
                                        <option value="">Elija la gestion de la cual quiera el reporte</option>
                                        <?php foreach ($data['gestion'] as $datagestion) { ?>
                                           
                                            <option  value="<?php echo $datagestion['id_Gestion']; ?>"><?php echo $datagestion['ges_anio']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El inscripcion ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>inscripcion registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>inscripcion Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-usuarios">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Fecha de inscripción</th>
                                    <th class="border border-dark">Sala</th>
                                    <th class="border border-dark">Gestión</th>
                                    <th class="border border-dark">Centro Infantil</th>
                                    <th class="border border-dark">Categoria de pagos</th>
                                    <th class="border border-dark">Usuario</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['inscripcion'] as $inscripcion) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $inscripcion['ins_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['ins_fecha']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['s_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['ges_anio']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['ins_Infantil']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['cat_nombre'] . ' ' . $inscripcion['ges_anio']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['nombre'] . " " . $inscripcion['rol']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>inscripcion/editar?ins_Id=<?php echo $inscripcion['ins_Id']; ?>" class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>inscripcion/eliminar?ins_Id=<?php echo $inscripcion['ins_Id']; ?>" method="post" class="d-inline elim" title="Eliminar">
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
<div id="nuevo_inscripcion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo datos de inscripción</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>inscripcion/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_Id">Datos del niño</label>
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                <select id="reg_Id" class="form-control" name="reg_Id">
                                    <option value="">Elija un niño</option>
                                    <?php
                                    foreach ($data["regninos"] as $nino) {
                                    ?>
                                        <option value="<?php echo $nino["reg_Id"] ?>"><?php echo $nino["reg_Nombres"] . " " . $nino["reg_Paterno"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="s_Id">Salas</label>

                                <select id="s_Id" class="form-control" name="s_Id">
                                    <option value="">Elija una sala</option>
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="ins_fecha">Fecha de Inscripción</label>
                                <input id="ins_fecha" class="form-control" type="date" name="ins_fecha">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="id_Gestion">Gestion</label>

                                <select id="id_Gestion" class="form-control" name="id_Gestion">
                                    <option value="">Elija la gestion</option>
                                    <?php
                                    foreach ($data["gestion"] as $gestion) {
                                    ?>
                                        <option value="<?php echo $gestion["id_Gestion"] ?>"><?php echo $gestion["ges_anio"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="cat_id">Categoria de Pago</label>

                                <select id="cat_id" class="form-control" name="cat_id">
                                    <option value="">Elija la gestion</option>
                                    <?php
                                    foreach ($data["catpago"] as $catpago) {
                                    ?>
                                        <option value="<?php echo $catpago["cat_id"] ?>"><?php echo $catpago["cat_nombre"] . ' ' . $catpago["ges_anio"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="ins_Infantil">centro Infantil</label>
                                <input id="ins_Infantil" class="form-control" type="text" name="ins_Infantil" value="Centrro Infantil Instituto Tecnológico Don Bosquito">
                            </div>
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