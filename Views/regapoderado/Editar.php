<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>regapoderado/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                        <p class="fw-bold text-dark text-center h1 ">Modificar Datos del Padre de Familia o del Tutor</p>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="text-dark h6" for="reg_Id">Nombre del Niño/Niña</label>
                                        <select id="reg_Id" class="form-control" name="reg_Id">
                                            <?php foreach ($data['regninos'] as $regNinos) { ?>
                                                <option <?php if ($regNinos['reg_Id'] == $data['regapoderado']['reg_Id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $regNinos['reg_Id']; ?>"><?php echo $regNinos['reg_Nombres'] . " " . $regNinos['reg_Paterno'] . " " . $regNinos['reg_Materno']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6"  for="apod_Nombres">Nombres</label>
                                        <input type="hidden" name="apod_Id" value="<?php echo $data['regapoderado']['apod_Id']; ?>">
                                        <input id="apod_Nombres" class="form-control" type="text" name="apod_Nombres" value="<?php echo $data['regapoderado']['apod_Nombres']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Paterno">Apellido Paterno</label>
                                        <input id="apod_Paterno" class="form-control" type="text" name="apod_Paterno" value="<?php echo $data['regapoderado']['apod_Paterno']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Materno">Apellido Materno</label>
                                        <input id="apod_Materno" class="form-control" type="text" name="apod_Materno" value="<?php echo $data['regapoderado']['apod_Materno']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Ci">C.I.</label>
                                        <input id="apod_Ci" class="form-control" type="text" name="apod_Ci" value="<?php echo $data['regapoderado']['apod_Ci']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_FechaNac">Fecha de Nacimiento</label>
                                        <input id="apod_FechaNac" class="form-control" type="date" name="apod_FechaNac" value="<?php echo $data['regapoderado']['apod_FechaNac']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Parentesco">Parentesco</label><br>
                                        <select class="form-control" aria-label="Default select example" name="apod_Parentesco" id="apod_Parentesco">
                                            <option value=" <?php echo  $data["regapoderado"]['apod_Parentesco'] ?>"><?php echo  $data["regapoderado"]['apod_Parentesco'] ?></option>
                                            <option>-----------------</option>
                                            <option value="Padre">Padre</option>
                                            <option value="Madre">Madre</option>
                                            <option value="Abuelo">Abuelo</option>
                                            <option value="Abuela">Abuela</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Celular">Celular</label>
                                        <input id="apod_Celular" class="form-control" type="text" name="apod_Celular" value="<?php echo $data["regapoderado"]['apod_Celular']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Direccion">Direccion</label>
                                        <input id="apod_Direccion" class="form-control" type="text" name="apod_Direccion" value="<?php echo $data["regapoderado"]['apod_Direccion']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_ingresos">Ingresos</label>
                                        <input id="apod_ingresos" class="form-control" type="text" name="apod_ingresos" value="<?php echo $data["regapoderado"]['apod_ingresos']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Carrera">Carrera</label><br>
                                        <select class="form-control" aria-label="Default select example" name="apod_Carrera" id="apod_Carrera" value="<?php echo $data["regapoderado"]['apod_Carrera']; ?>">
                                            <option value=" <?php echo  $data["regapoderado"]['apod_Carrera'] ?>"><?php echo  $data["regapoderado"]['apod_Carrera'] ?></option>
                                            <option>-----------------</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Semestre">Semestre o Año</label><br>
                                        <select class="form-control" aria-label="Default select example" name="apod_Semestre" id="apod_Semestre" value="<?php echo $data["regapoderado"]['apod_Semestre']; ?>">
                                            <option value=" <?php echo  $data["regapoderado"]['apod_Semestre'] ?>"><?php echo  $data["regapoderado"]['apod_Semestre'] ?></option>
                                            <option>-----------------</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="apod_Turno">Turno</label><br>
                                        <select class="form-control" aria-label="Default select example" name="apod_Turno" id="apod_Turno" value="<?php echo $data["regapoderado"]['apod_Turno']; ?>">
                                            <option value=" <?php echo  $data["regapoderado"]['apod_Turno'] ?>"><?php echo  $data["regapoderado"]['apod_Turno'] ?></option>
                                            <option>-----------------</option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>regapoderado/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>