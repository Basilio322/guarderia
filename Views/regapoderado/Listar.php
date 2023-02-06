<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del Padre de Familia o del Tutor</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_regapoderado"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>regApoderado/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Padre de Familia o Tutor ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Padre de Familia o Tutor registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Padre de Familia o Tutor Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-usuarios">
                                <tr>
                                    <th class="border border-dark">Nº</th>
                                    <th class="border border-dark">Niño</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">Nombres</th>                                    
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Fecha Nacimiento</th>
                                    <th class="border border-dark">Parentesco</th>
                                    <th class="border border-dark">Celular</th>
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Ocupación e Ingresos</th>
                                    <th class="border border-dark">Carrera</th>
                                    <th class="border border-dark">Semestre o Año</th>
                                    <th class="border border-dark">Turno</th>
                                    <th class="border border-dark">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['regapoderado'] as $regapoderado) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['reg_Paterno'] . " " . $regapoderado['reg_Materno'] . " " . $regapoderado['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Nombres']; ?></td>
                                        
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Ci']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_FechaNac']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Parentesco']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Celular']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Direccion']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_ingresos']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Carrera']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Semestre']; ?></td>
                                        <td class="border border-dark"><?php echo $regapoderado['apod_Turno']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>regApoderado/editar?apod_Id=<?php echo $regapoderado['apod_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>regApoderado/eliminar?apod_Id=<?php echo $regapoderado['apod_Id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_regapoderado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Apderado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>regApoderado/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="reg_Id">Niño</label>
                                <select id="reg_Id" class="form-control" name="reg_Id">
                                    <?php foreach ($data['regninos'] as $dataNino) { ?>
                                        <option value="<?php echo $dataNino['reg_Id']; ?>"><?php echo $dataNino['reg_Nombres'] . " " . $dataNino['reg_Paterno'] . " " . $dataNino['reg_Materno']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Nombres">Nombres</label>
                                <input id="apod_Nombres" class="form-control" type="text" name="apod_Nombres" required placeholder="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Paterno">Apellido Paterno</label>
                                <input id="apod_Paterno" class="form-control" type="text" name="apod_Paterno" required placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Materno">Apellido Materno</label>
                                <input id="apod_Materno" class="form-control" type="text" name="apod_Materno" required placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Ci">C.I.</label>
                                <input id="apod_Ci" class="form-control" type="text" name="apod_Ci" required placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_FechaNac">Fecha de Nacimiento</label>
                                <input id="apod_FechaNac" class="form-control" type="date" name="apod_FechaNac">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Parentesco">Parentesco</label><br>
                                <select class="form-control" aria-label="Default select example" name="apod_Parentesco" id="apod_Parentesco">
                                    <option selected>-----------------</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Abuela">Abuela</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Celular">Celular</label>
                                <input id="apod_Celular" class="form-control" type="text" name="apod_Celular">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Direccion">Direccion</label>
                                <input id="apod_Direccion" class="form-control" type="text" name="apod_Direccion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Ingresos">Ingresos</label>
                                <input id="apod_Ingresos" class="form-control" type="text" name="apod_ingresos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Carrera">Carrera</label><br>
                                <select class="form-control" aria-label="Default select example" name="apod_Carrera" id="apod_Carrera">
                                    <option selected>-----------------</option>
                                    <option value="Mecánica Automotriz">Mecánica Automotriz</option>
                                    <option value="Mecánica Industrial">Mecánica Industrial</option>
                                    <option value="Electricidad Industrial">Electricidad Industrial</option>
                                    <option value="Artes Gráficas">Artes Gráficas</option>
                                    <option value="Secretariado Ejecutivo">Secretariado Ejecutivo</option>
                                    <option value="Administración de Empresas">Administración de Empresas</option>
                                    <option value="Sistemas Informáticos">Sistemas Informáticos</option>
                                    <option value="Contaduría General">Contaduría General</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Semestre">Semestre o Año</label><br>
                                <select class="form-control" aria-label="Default select example" name="apod_Semestre" id="apod_Semestre">
                                    <option selected>-----------------</option>
                                    <option value="Primer Semestre">Primer Semestre</option>
                                    <option value="Segundo Semestre">Segundo Semestre</option>
                                    <option value="Tercer Semestre">Tercer Semestre</option>
                                    <option value="Cuarto Semestre">Cuarto Semestre</option>
                                    <option value="Quinto Semestre">Quinto Semestre</option>
                                    <option value="Sexto Semestre">Sexto Semestre</option>

                                    <option value="Primer Año">Primer Año</option>
                                    <option value="Segundo Año">Segundo Año</option>
                                    <option value="Tercer Año">Tercer Año</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white h6" for="apod_Turno">Turno</label><br>
                                <select class="form-control" aria-label="Default select example" name="apod_Turno" id="apod_Turno">
                                    <option selected>-----------------</option>
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
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