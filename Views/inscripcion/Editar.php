<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>inscripcion/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Datos de Inscripción</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="reg_Id">Nombre del Niño/Niña</label>
                                        <input type="hidden" name="ins_Id" value="<?php echo $data['inscripcion']['ins_Id']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <select id="reg_Id" class="form-control" name="reg_Id">
                                            <?php foreach ($data['regninos'] as $dataNino) { ?>

                                                <option <?php if ($dataNino['reg_Id'] == $data['inscripcion']['reg_Id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $dataNino['reg_Id']; ?>"><?php echo $dataNino['reg_Nombres'] . " " . $dataNino['reg_Paterno'] . " " . $dataNino['reg_Materno']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="s_Id">Salas</label>

                                        <select id="s_Id" class="form-control" name="s_Id" >
                                            <option value="">Elija una sala</option>
                                            <?php foreach ($data['salas'] as $dataSalas) { ?>

                                                <option <?php if ($dataSalas['s_Id'] == $data['inscripcion']['s_Id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $dataSalas['s_Id']; ?>"><?php echo $dataSalas['s_nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="ins_fecha">Fecha de Inscripcion</label>
                                        <input id="ins_fecha" class="form-control" type="date" name="ins_fecha" value="<?php echo $data['inscripcion']['ins_fecha']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="id_Gestion">Gestión</label>

                                        <select id="id_Gestion" class="form-control" name="id_Gestion">
                                            <option value="">Elija la gestion actual</option>
                                            <?php foreach ($data['gestion'] as $datagestion) { ?>

                                                <option <?php if ($datagestion['id_Gestion'] == $data['inscripcion']['id_Gestion']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $datagestion['id_Gestion']; ?>"><?php echo $datagestion['ges_anio']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="cat_id">Categoria de Pago</label>
                                        <select id="cat_id" class="form-control" name="cat_id">
                                            <option value="">Elija la categoria de pago con el año correspondiente</option>
                                            <?php foreach ($data['catpago'] as $datacatpago) { ?>

                                                <option <?php if ($datacatpago['cat_id'] == $data['inscripcion']['cat_id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $datacatpago['cat_id']; ?>"><?php echo $datacatpago['cat_nombre'].' '.$datacatpago['ges_anio']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="ins_Infantil">centro Infantil</label>
                                        <input id="ins_Infantil" class="form-control" type="text" name="ins_Infantil" value="<?php echo $data['inscripcion']['ins_Infantil']; ?>">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>inscripcion/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>