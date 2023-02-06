<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del Padre de Familia o Tutor Eliminado</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>regapoderado/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                <th class="border border-dark">Nº</th>
                                    <th class="border border-dark">Niño</th>
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Apellidos</th>
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Fecha Nacimiento</th>
                                    <th class="border border-dark">Parentesco</th>
                                    <th class="border border-dark">Celular</th>
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Carrera</th>
                                    <th class="border border-dark">Semestre o Año</th>
                                    <th class="border border-dark">Turno</th>
                                    <th class="border border-dark">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $dataApoderado) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Id']; ?></td>
                                        <!-- <td><?php echo $dataApoderado['reg_Paterno'] . " " . $dataApoderado['reg_Materno'] . " " . $dataApoderado['reg_Nombres']; ?></td> -->
                                        <td class="border border-dark"><?php echo $dataApoderado['reg_Id'];?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Paterno'] . " " . $dataApoderado['apod_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Ci']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_FechaNac']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Parentesco']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Celular']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Direccion']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Carrera']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Semestre']; ?></td>
                                        <td class="border border-dark"><?php echo $dataApoderado['apod_Turno']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>regApoderado/reingresar?apod_Id=<?php echo $dataApoderado['apod_Id']; ?>" method="post" class="d-inline confirmar">
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