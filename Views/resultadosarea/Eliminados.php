<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="table-primary border border-primary">Nº</th>
                                    <th class="table-primary border border-primary">nombres Niño/Niña</th>
                                    <th class="table-primary border border-primary">Feha de Evaluaciòn</th>

                                    <th class="table-primary border border-primary">Motricidad Gruesa</th>
                                    <th class="table-primary border border-primary">Motricidad Fina</th>
                                    <th class="table-primary border border-primary">Audición y Lenguaje</th>
                                    <th class="table-primary border border-primary">Personal y social</th>
                                    <th class="table-primary border border-primary">Total</th>
                                    <th class="table-primary border border-primary">Observaciones</th>
                                    <th class="table-primary border border-primary">Número de Control</th>

                                    <th class="table-primary border border-primary">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $resultadosarea) { ?>
                                    <tr>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_Id']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['reg_Nombres'] . " " . $resultadosarea['reg_Paterno'] . " " . $resultadosarea['reg_Materno']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_FechaCon']; ?></td>
                                        <!--<td class="border border-primary"><?php echo $resultadosarea['res_mGruesa']; ?></td>-->
                                        <td class="border border-primary" <?php
                                                                            if ($resultadosarea['res_mGruesa'] <= 22) {
                                                                                echo ' style="background-color: red; color: black;"';
                                                                            } else if ($resultadosarea['res_mGruesa'] >= 23 && $resultadosarea['res_mGruesa'] <= 26) {
                                                                                echo ' style="background-color: yellow; color: black;"';
                                                                            } else if ($resultadosarea['res_mGruesa'] >= 27 && $resultadosarea['res_mGruesa'] <= 29) {
                                                                                echo ' style="background-color:green; color: black;"';
                                                                            } else if ($resultadosarea['res_mGruesa'] >= 30) {
                                                                                echo ' style="background-color:blue; color: black;"';
                                                                            }
                                                                            ?>><?= $resultadosarea['res_mGruesa']; ?></td>
                                        <!--<td class="border border-primary"><?php echo $resultadosarea['res_mFina']; ?></td>-->
                                        <td class="border border-primary" <?php
                                                                            if ($resultadosarea['res_mFina'] <= 2) {
                                                                                echo ' style="background-color: red; color: black;"';
                                                                            } else if ($resultadosarea['res_mFina'] >= 22 && $resultadosarea['res_mFina'] <= 24) {
                                                                                echo ' style="background-color: yellow; color: black;"';
                                                                            } else if ($resultadosarea['res_mFina'] >= 25 && $resultadosarea['res_mFina'] <= 28) {
                                                                                echo ' style="background-color:green; color: black;"';
                                                                            } else if ($resultadosarea['res_mFina'] >= 29) {
                                                                                echo ' style="background-color:blue; color: black;"';
                                                                            }
                                                                            ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <!--<td class="border border-primary"><?php echo $resultadosarea['res_AudyLeng']; ?></td>-->
                                        <td class="border border-primary" <?php
                                                                            if ($resultadosarea['res_AudyLeng'] <= 2) {
                                                                                echo ' style="background-color: red; color: black;"';
                                                                            } else if ($resultadosarea['res_AudyLeng'] >= 22 && $resultadosarea['res_AudyLeng'] <= 25) {
                                                                                echo ' style="background-color: yellow; color: black;"';
                                                                            } else if ($resultadosarea['res_AudyLeng'] >= 26 && $resultadosarea['res_AudyLeng'] <= 29) {
                                                                                echo ' style="background-color:green; color: black;"';
                                                                            } else if ($resultadosarea['res_AudyLeng'] >= 30) {
                                                                                echo ' style="background-color:blue; color: black;"';
                                                                            }
                                                                            ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <!--<td class="border border-primary"><?php echo $resultadosarea['res_PerySocial']; ?></td>-->
                                        <td class="border border-primary" <?php
                                                                            if ($resultadosarea['res_PerySocial'] <= 22) {
                                                                                echo ' style="background-color: red; color: black;"';
                                                                            } else if ($resultadosarea['res_PerySocial'] >= 23 && $resultadosarea['res_PerySocial'] <= 26) {
                                                                                echo ' style="background-color: yellow; color: black;"';
                                                                            } else if ($resultadosarea['res_PerySocial'] >= 27 && $resultadosarea['res_PerySocial'] <= 29) {
                                                                                echo ' style="background-color:green; color: black;"';
                                                                            } else if ($resultadosarea['res_PerySocial'] >= 30) {
                                                                                echo ' style="background-color:blue; color: black;"';
                                                                            }
                                                                            ?>><?= $resultadosarea['res_PerySocial']; ?></td>
                                        <!--<td class="border border-primary"><?php echo $resultadosarea['res_Total']; ?></td>-->
                                        <td class="border border-primary" <?php
                                                                            if ($resultadosarea['res_Total'] <= 89) {
                                                                                echo ' style="background-color: red; color: black;"';
                                                                            } else if ($resultadosarea['res_Total'] >= 90 && $resultadosarea['res_Total'] <= 00) {
                                                                                echo ' style="background-color: yellow; color: black;"';
                                                                            } else if ($resultadosarea['res_Total'] >= 0 && $resultadosarea['res_Total'] <= 4) {
                                                                                echo ' style="background-color:green; color: black;"';
                                                                            } else if ($resultadosarea['res_Total'] >= 5) {
                                                                                echo ' style="background-color:blue; color: black;"';
                                                                            }
                                                                            ?>><?= $resultadosarea['res_Total']; ?></td>

                                        <td class="border border-primary"><?php echo $resultadosarea['res_Observacion']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_controlN']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>resultadosarea/reingresar?res_Id=<?php echo $resultadosarea['res_Id']; ?>" method="post" class="d-inline confirmar">
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