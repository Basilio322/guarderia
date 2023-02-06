<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos gestion</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_gestion"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>gestion/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El datos del gestion ya existen</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del gestion registrados</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>datos del gestion Modificados</strong>
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
                                    <th class="border border-dark">Año de gestión</th>
                                    <th class="border border-dark">Mensualidad</th>                                    
                                    <th class="border border-dark">observaciones</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['gestion'] as $gestion) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $gestion['id_Gestion']; ?></td>
                                        <td class="border border-dark"><?php echo 'Gestión '.$gestion['ges_anio']; ?></td>
                                        <td class="border border-dark"><?php echo $gestion['ges_mensualidad'].' Bs'; ?></td>                                        
                                        <td class="border border-dark"><?php echo $gestion['ges_observaciones']; ?></td>
                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>gestion/editar?id_Gestion=<?php echo $gestion['id_Gestion']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>gestion/eliminar?id_Gestion=<?php echo $gestion['id_Gestion']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_gestion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo gestion</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>gestion/insertar" autocomplete="off">
                <div class="modal-body row">
                    <div class="form-group col-md-10">
                        <label class="text-white h6" for="ges_anio">Año de Gestión</label>
                        <input id="ges_anio" class="form-control" type="text" value="<?php echo date('Y'); ?>" name="ges_anio" required="Año de Gestión">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="ges_mensualidad">Mensualidad de Gestión</label>
                        <input id="ges_mensualidad" class="form-control" type="text" name="ges_mensualidad" required="Mensualidad de Gestión">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-white h6" for="ges_observaciones">Observaciones</label>
                        <input id="ges_observaciones" class="form-control" type="text" name="ges_observaciones" required="Observaciones">
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