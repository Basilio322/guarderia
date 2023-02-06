<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>regninos/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Registro de los Niños/Niñas</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="reg_Nombres">Nombre</label>
                                <input type="hidden" name="reg_Id" value="<?php echo $data['reg_Id']; ?>">
                                <input id="reg_Nombres" class="form-control" type="text" name="reg_Nombres" value="<?php echo $data['reg_Nombres']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reg_Paterno">Apellido Paterno</label>
                                        <input id="reg_Paterno" class="form-control" type="text" name="reg_Paterno" value="<?php echo $data['reg_Paterno']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reg_Materno">Apellido Materno</label>
                                        <input id="reg_Materno" class="form-control" type="text" name="reg_Materno" value="<?php echo $data['reg_Materno']; ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="reg_Genero">Genero</label>
                                    <select id="reg_Genero" class="form-control" name="reg_Genero">
                                        <option value="Masculino" <?php if ($data['reg_Genero'] == "Masculino") {
                                                                        echo "selected";
                                                                    } ?>>Masculino</option>
                                        <option value="Femenino" <?php if ($data['reg_Genero'] == "Femenino") {
                                                                        echo "selected";
                                                                    } ?>>Femenino</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reg_FechaNac">Fecha de Nacimiento</label>
                                        <input id="reg_FechaNac" class="form-control" type="date" name="reg_FechaNac" value="<?php echo $data['reg_FechaNac']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>regninos/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>