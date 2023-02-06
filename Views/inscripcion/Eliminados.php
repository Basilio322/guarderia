<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos Eliminados de Inscripción</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>inscripcion/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                        <thead class="bg-danger">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">Nombres</th>
                                     <th class="border border-dark">fecha de inscripcion</th>
                                    <th class="border border-dark">sala</th>
                                    <th class="border border-dark">Gestión</th>
                                    <th class="border border-dark">Centro Infantil</th>
                                    <th class="border border-dark">Categoria de pagos</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $inscripcion) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $inscripcion['ins_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['reg_Nombres']; ?></td>
                                        <<td class="border border-dark"><?php echo $inscripcion['ins_fecha']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['s_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['ges_anio']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['ins_Infantil']; ?></td>
                                        <td class="border border-dark"><?php echo $inscripcion['cat_nombre'] .' '.$inscripcion['ges_anio']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>inscripcion/reingresar?ins_Id=<?php echo $inscripcion['ins_Id']; ?>" method="post" class="d-inline confirmar">
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