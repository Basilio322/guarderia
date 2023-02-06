<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos catpago</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_catpago"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>catpago/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El datos del catpago ya existen</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del catpago registrados</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del catpago Modificados</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombre de la categoria</th>
                                    <th class="border border-dark">Descripción</th>                                    
                                    <th class="border border-dark">Monto de para cancelar</th>
                                    <th class="border border-dark">gestiòn</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['catpago'] as $catpago) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $catpago['cat_id']; ?></td>
                                        <td class="border border-dark"><?php echo $catpago['cat_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $catpago['cat_descripcion']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $catpago['cat_monto'].' Bs.'; ?></td>
                                        <td class="border border-dark"><?php echo 'Año '.$catpago['ges_anio']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>catpago/editar?cat_id=<?php echo $catpago['cat_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>catpago/eliminar?cat_id=<?php echo $catpago['cat_id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_catpago" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo catpago</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>catpago/insertar" autocomplete="off">
                <div class="modal-body row">
                    <div class="form-group col-md-10">
                        <label class="text-white h6" for="cat_nombre">Nombre de la Categoria</label>
                        <input id="cat_nombre" class="form-control" type="text" name="cat_nombre" required="Nombres de la Categoria">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="cat_descripcion">Descripción</label>
                        <input id="cat_descripcion" class="form-control" type="text" name="cat_descripcion" required="Descripción">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="cat_monto">Monto a Cobrar</label>
                        <input id="cat_monto" class="form-control" type="text" name="cat_monto" required="Monto a Cobrar">
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-white h6" for="id_Gestion">Gestion</label>

                            <select id="id_Gestion" class="form-control" name="id_Gestion">

                                <option required="elija">seleccione el año</option>
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