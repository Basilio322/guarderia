<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>docente/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">niño o niña</th>                                    
                                    <th class="border border-dark">Fecha de Pago</th>
                                    <th class="border border-dark">Monto Cancelado</th>
                                    <th class="border border-dark">Observaciones</th>
                                    <th class="border border-dark">Número de Mensualidad</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $pensiones) { ?>
                                    <tr>
                                    <td class="border border-dark"><?php echo $pensiones['pen_id']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['reg_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['reg_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['pen_Fecha']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['pen_Monto']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['pen_Observacion']; ?></td>
                                        <td class="border border-dark"><?php echo $pensiones['pen_PagoN']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>pensiones/reingresar?pen_id=<?php echo $pensiones['pen_id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-warning"><i class="fas fa-ad"></i></button>
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
<?php pie() ?>