<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Historiales Mèdicos Eliminados</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="table-primary border border-primary">Nº</th>
                                    <th class="table-primary border border-primary">nombres Niño/Niña</th>
                                    <th class="table-primary border border-primary">Peso</th>

                                    <th class="table-primary border border-primary">Talla</th>
                                    <th class="table-primary border border-primary">Fecha de Control</th>
                                    <th class="table-primary border border-primary">Numero de Control</th>
                                    <th class="table-primary border border-primary">Observaciones</th>

                                    <th class="table-primary border border-primary">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $regmedico) {

                                    if ($regmedico['his_estado'] == 0) {
                                        $his_Estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $his_Estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }

                                ?>
                                    <tr>

                                        <td class="border border-primary"><?php echo $regmedico['his_Id']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['reg_Nombres'] . " " . $regmedico['reg_Paterno']; ?></td>
                                        <td class='border border-primary'><?php echo $regmedico['his_Peso']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Talla']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Fecha']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_ControlN']; ?></td>
                                        <td class="border border-primary"><?php echo $regmedico['his_Otros']; ?></td>


                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>historial/reingresar?his_Id=<?php echo $regmedico['his_Id']; ?>" method="post" class="d-inline confirmar">
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