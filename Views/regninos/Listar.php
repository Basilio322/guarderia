<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del del niño y niña</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_regninos"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>regninos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Niño/Niña ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Niño/Niña registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Niño/Niña Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-usuarios">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Apellidos</th>                                    
                                    <th class="border border-dark">Genero</th>
                                    <th class="border border-dark">Fecha Nacimiento</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $regNinos) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Paterno'] . " " . $regNinos['reg_Materno']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $regNinos['reg_Genero']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_FechaNac']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>regninos/editar?reg_Id=<?php echo $regNinos['reg_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>regninos/eliminar?reg_Id=<?php echo $regNinos['reg_Id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_regninos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo registro Niños y Niñas</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>regninos/insertar" autocomplete="off">
       <div class="modal-body">

                    <div class="form-group">
                        <label class="text-white h6" for="reg_Nombres">Nombres</label>
                        <input id="reg_Nombres" class="form-control" type="text" name="reg_Nombres" placeholder="Nombres">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_Paterno">Apellido Paterno</label>
                                <input id="reg_Paterno" class="form-control" type="text" name="reg_Paterno" placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_Materno">Apellido PMaterno</label>
                                <input id="reg_Materno" class="form-control" type="text" name="reg_Materno" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_Genero"> Genero</label>
                                
                                <select class="form-control " aria-label=".form-select-lg example" id="reg_Genero" name="reg_Genero">
                                    <option selected>Seleccione uno</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_FechaNac">Fecha de Nacimiento</label>
                                <input id="reg_FechaNac" class="form-control" type="date" name="reg_FechaNac" >
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