<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>pensiones/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El registro ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>registro Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-primary">
                                <tr>
                                    <td class="border border-dark">N°</td>
                                    <td class="border border-dark">Apellido Paterno</td>
                                    <td class="border border-dark">Apellido Materno</td>
                                    <td class="border border-dark">niño o niña</td>
                                    <td class="border border-dark">Tipo de Pago de Inscripción</td>
                                    <td class="border border-dark">Fecha Pago</td>
                                    <td class="border border-dark">Mes del pago de la pensión</td>
                                    <td class="border border-dark">Monto GAMEA</td>
                                    <td class="border border-dark">Monto a Cancelar</td>
                                    <td class="border border-dark">Monto Cancelado</td>
                                    <td class="border border-dark">Monto Faltante</td>
                                    <td class="border border-dark">Observaciones</td>
                                    <td class="border border-dark">Acciones</td>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['pensiones'] as $inscripcion) { ?>
                                    <tr>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_id']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['reg_Paterno']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['reg_Materno']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['reg_Nombres']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['cat_nombre']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_Fecha']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_PagoN']; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['ges_mensualidad'] . ' Bs'; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['cat_monto'] . ' Bs'; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_cuenta'] . ' Bs'; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_totalF'] . ' Bs'; ?></td>
                                        <td class="border border-primary"><?php echo $inscripcion['pen_Observacion']; ?></td>


                                        <td class="border border-dark">
                                            <a href="<?php echo base_url() ?>pensiones/editar?pen_id=<?php echo $inscripcion['pen_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>pensiones/eliminar?pen_id=<?php echo $inscripcion['pen_id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pensiones/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ins_Id">Nombre del niño</label>

                            <select id="ins_Id" class="form-control" name="ins_Id">
                                <option value="">Elija un niño</option>
                                <?php
                                foreach ($data["inscripcion"] as $nino) {
                                ?>
                                    <option value="<?php echo $nino["ins_Id"] ?>"><?php echo $nino["reg_Nombres"] . " " . $nino["reg_Paterno"] . " " . $nino["reg_Materno"] ?></option>
                                <?php

                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-white h6" for="Monto a cancelar">Monto a total a Cancelar</label>
                            <input id="Monto a cancelar" class="form-control" type="text" name="Monto a cancelar">
                        </div>
                        <div class="form-group">
                            <label class="text-white h6" for="Monto a cancelar">Monto a Cancelado</label>
                            <input id="Monto a cancelar" class="form-control" type="text" name="Monto a cancelar">
                        </div>
                        <div class="form-group">
                            <label class="text-white h6" for="Monto a cancelar">Monto por cancelar</label>
                            <input id="Monto a cancelar" class="form-control" type="text" name="Monto a cancelar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-white h6" for="pen_Fecha">Fecha de Pago</label>
                            <input id="pen_Fecha" class="form-control" type="date" name="pen_Fecha">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-white h6" for="pen_Monto">Monto Cancelado</label>
                            <input id="pen_Monto" class="form-control" type="text" name="pen_Monto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-white h6" for="pen_Observacion">Observación</label>
                            <input id="pen_Observacion" class="form-control" type="text" name="pen_Observacion">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-white h6" for="pen_PagoN">Mes del Pago</label>
                            <select class="form-control " aria-label=".form-select-lg example" id="pen_PagoN" name="pen_PagoN">
                                <option selected>Seleccione uno</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
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