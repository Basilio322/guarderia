<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del Contacto de Emergencia</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_regcontacto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>regcontacto/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Contacto de emergencia ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Contacto de emergencia registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Contacto de emergencia Modificado</strong>
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
                                    <th class="border border-dark">Nombre del Niño</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">Nombre</th>                                    
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Celular</th>
                                    <th class="border border-dark">Parentesco</th>                                    
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['regcontacto'] as $regcontacto) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Paterno']?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Nombres']; ?></td>
                                        
                                        <td class="border border-dark"><?php echo $regcontacto['con_Ci']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Celular']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Parentesco']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Direccion']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>regcontacto/editar?con_Id=<?php echo $regcontacto['con_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>regcontacto/eliminar?con_Id=<?php echo $regcontacto['con_Id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_regcontacto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Regsitro de contacto de Emergencia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>regcontacto/insertar" autocomplete="off">
                <div class="modal-body">
                <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-white h6" for="reg_Id">Nombre del Niño</label>

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
                                    <label class="text-white h6" for="con_Nombres">Nombres</label>
                                    <input id="con_Nombres" class="form-control" type="text" name="con_Nombres">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Paterno">Apellido Paterno</label>
                                    <input id="con_Paterno" class="form-control" type="text" name="con_Paterno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Materno">Apellido Materno</label>
                                    <input id="con_Materno" class="form-control" type="text" name="con_Materno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Ci">C.I.</label>
                                    <input id="con_Ci" class="form-control" type="text" name="con_Ci">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Celular">Celular</label>
                                    <input id="con_Celular" class="form-control" type="text" name="con_Celular">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Parentesco">Parentesco</label><br>
                                    <select class="form-control" aria-label="Default select example" name="con_Parentesco" id="con_Parentesco">
                                        <option selected>-----------------</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Abuelo">Abuelo</option>
                                        <option value="Tio">Tio</option>
                                        <option value="Tia">Tia</option>
                                        <option value="Primo">Primo</option>
                                        <option value="Prima">Prima</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-white h6" for="con_Direccion">Direccion</label>
                                    <input id="con_Direccion" class="form-control" type="text" name="con_Direccion">
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