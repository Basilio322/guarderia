<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>catpago/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <p class="fw-bold text-dark text-center h1 ">Modificar Datos del catpago</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="cat_nombre">Nombre de la categoria</label>
                                        <input type="hidden" name="cat_id" value="<?php echo $data['catpago']['cat_id']; ?>">
                                        <input id="cat_nombre" class="form-control" type="text" name="cat_nombre" value="<?php echo $data['catpago']['cat_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="cat_descripcion">Descripción de la Catergoria</label>
                                        <input id="cat_descripcion" class="form-control" type="text" name="cat_descripcion" value="<?php echo $data['catpago']['cat_descripcion']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="cat_monto">Monto a cancelar</label>
                                        <input id="cat_monto" class="form-control" type="text" name="cat_monto" value="<?php echo $data['catpago']['cat_monto']; ?>">
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark h6" for="id_Gestion">Salas</label>

                                        <select id="id_Gestion" class="form-control" name="id_Gestion">
                                            <option value="">Elija la gestion</option>
                                            <?php foreach ($data['gestion'] as $datagestion) { ?>

                                                <option <?php if ($datagestion['id_Gestion'] == $data['catpago']['id_Gestion']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $datagestion['id_Gestion']; ?>"><?php echo $datagestion['ges_anio']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <button class="btn btn-success" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>catpago/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>