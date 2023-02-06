<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>regcontacto/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <h6 class="title text-white text-center">Modificar Datos del Contacto de Emergencia</46>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="text-dark h6" for="reg_Id">Nombre del Niño/Niña</label>
                                        <input type="hidden" name="con_Id" value="<?php echo $data['regcontacto']['con_Id']; ?>">
                                        <select id="reg_Id" class="form-control" name="reg_Id">
                                            <?php foreach ($data['regninos'] as $dataNino) { ?>

                                                <option <?php if ($dataNino['reg_Id'] == $data['regcontacto']['reg_Id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $dataNino['reg_Id']; ?>"><?php echo $dataNino['reg_Nombres'] . " " . $dataNino['reg_Paterno'] . " " . $dataNino['reg_Materno']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Nombres">Nombres</label>
                                            <input id="con_Nombres" class="form-control" type="text" name="con_Nombres" value="<?php echo $data['regcontacto']['con_Nombres']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Paterno">Apellido Paterno</label>
                                            <input id="con_Paterno" class="form-control" type="text" name="con_Paterno" value="<?php echo $data['regcontacto']['con_Paterno']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Materno">Apellido Materno</label>
                                            <input id="con_Materno" class="form-control" type="text" name="con_Materno" value="<?php echo $data['regcontacto']['con_Materno']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Ci">C.I.</label>
                                            <input id="con_Ci" class="form-control" type="text" name="con_Ci" value="<?php echo $data['regcontacto']['con_Ci']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Celular">Celular</label>
                                            <input id="con_Celular" class="form-control" type="text" name="con_Celular" value="<?php echo $data['regcontacto']['con_Celular']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Parentesco">Parentesco</label><br>
                                            <select class="form-control" aria-label="Default select example" name="con_Parentesco" id="con_Parentesco" value="<?php echo $data['con_Parentesco']; ?>">
                                                <option value=" <?php echo  $data["regcontacto"]['con_Parentesco'] ?>"><?php echo  $data["regcontacto"]['con_Parentesco'] ?></option>
                                                <option value="Padre">Padre</option>
                                                <option value="Madre">Madre</option>
                                                <option value="Abuelo">Abuelo</option>
                                                <option value="Abuela">Abuela</option>
                                                <option value="Tio">Tío</option>
                                                <option value="Tia">Tía</option>
                                                <option value="Primo">Primo</option>
                                                <option value="Prima">Prima</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="con_Direccion">Dirección</label>
                                            <input id="con_Direccion" class="form-control" type="text" name="con_Direccion" value="<?php echo $data['regcontacto']['con_Direccion']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>regcontacto/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>