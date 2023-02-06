<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Notas de los Resultados por Área</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-22 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_resultadosarea"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>resultadosarea/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Resultados por Área ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Resultados por Área registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Resultados por Área Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <p>Número de control</p>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar"> Inicio</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar1"> 1º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar2"> 2º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar3"> 3º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar4"> 4º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar5"> 5º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar6"> 6º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar7"> 7º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar8"> 8º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar9"> 9º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>resultadosarea/Listar10"> 10º Control</a>
                    </div>
                    <p class="fw-bold text-dark h6 ">Crear reportes</p>
                    <form class="row col-lg-12">

                        <div class="col-md-3">
                            <a href="<?php echo base_url(); ?>inscripcion/pdfGestion?ins_Gestion=<?php echo $inscripcion['ins_Gestion'] . '&ins_fecha=' . $inscripcion['ins_fecha']; ?> " class="btn btn-success mb-2" title="Imprimir"><i class="fa-solid fa-print"></i>Reporte por Sala</a>
                        </div>
                        <div class="col-md-2">
                            <select id="anio" name="year" class="form-control">
                                <option value="0">Año</option>
                                <?php for ($i = 2019; $i <= 2100; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-4">

                            <select id="s_Id" class="form-control" name="s_Id">
                                <option value="">Elija una sala</option>
                                <?php
                                foreach ($data["salas"] as $nino) {
                                ?>
                                    <option value="<?php echo $nino["s_Id"] ?>"><?php echo $nino["s_nombre"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                    <form class="row col-lg-12">

                        <div class="col-md-3">
                            <a href="<?php echo base_url(); ?>inscripcion/pdfGestion?ins_Gestion=<?php echo $inscripcion['ins_Gestion'] . '&ins_fecha=' . $inscripcion['ins_fecha']; ?> " class="btn btn-success mb-2" title="Imprimir"><i class="fa-solid fa-print"></i>Reporte General</a>
                        </div>
                        <div class="col-md-2">
                            <select id="anio" name="year" class="form-control">
                                <option value="0">Año</option>
                                <?php for ($i = 2019; $i <= 2100; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                } ?>
                            </select>
                        </div>
                    </form>

                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="table-primary border border-primary">Nº</th>
                                    <th class="table-primary border border-primary">Apellido Paterno</th>
                                    <th class="table-primary border border-primary">Apellido Materno</th>
                                    <th class="table-primary border border-primary">nombres Niño/Niña</th>
                                    <th class="table-primary border border-primary">Feha de Evaluación</th>
                                    <th class="table-primary border border-primary">Edad en meses</th>
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
                                <?php foreach ($data['resultadosarea'] as $resultadosarea) { ?>
                                    <tr>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_Id']; ?></td>

                                        <td class="border border-primary"><?php echo $resultadosarea['reg_Paterno']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['reg_Materno']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['reg_Nombres']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_FechaCon']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_canMeses']; ?></td>
                                        <!-- Inicio Motricidad Gruesa -->
                                        <?php
                                        if ($resultadosarea['res_canMeses'] >= 10 && $resultadosarea['res_canMeses'] <= 12) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mGruesa'] <= 11) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 12 && $resultadosarea['res_mGruesa'] <= 13) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 14 && $resultadosarea['res_mGruesa'] <= 16) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 17) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mGruesa']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 13 && $resultadosarea['res_canMeses'] <= 18) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mGruesa'] <= 13) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 14 && $resultadosarea['res_mGruesa'] <= 16) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 17 && $resultadosarea['res_mGruesa'] <= 19) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 20) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mGruesa']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 19 && $resultadosarea['res_canMeses'] <= 24) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mGruesa'] <= 16) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 17 && $resultadosarea['res_mGruesa'] <= 19) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 20 && $resultadosarea['res_mGruesa'] <= 23) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 24) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mGruesa']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 25 && $resultadosarea['res_canMeses'] <= 36) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mGruesa'] <= 19) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 20 && $resultadosarea['res_mGruesa'] <= 23) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 24 && $resultadosarea['res_mGruesa'] <= 27) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mGruesa'] >= 28) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mGruesa']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 37 && $resultadosarea['res_canMeses'] <= 48) { ?>
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
                                        <?php } ?>
                                        <!-- fin Motricidad Gruesa -->



                                        <!-- Inicio Motricidad Fina -->
                                        <?php
                                        if ($resultadosarea['res_canMeses'] >= 10 && $resultadosarea['res_canMeses'] <= 12) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mFina'] <= 9) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 10 && $resultadosarea['res_mFina'] <= 12) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 13 && $resultadosarea['res_mFina'] <= 14) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 15) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 13 && $resultadosarea['res_canMeses'] <= 18) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mFina'] <= 12) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 13 && $resultadosarea['res_mFina'] <= 15) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 16 && $resultadosarea['res_mFina'] <= 18) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 19) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 19 && $resultadosarea['res_canMeses'] <= 24) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mFina'] <= 14) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 15 && $resultadosarea['res_mFina'] <= 18) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 19 && $resultadosarea['res_mFina'] <= 20) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 21) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 25 && $resultadosarea['res_canMeses'] <= 36) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mFina'] <= 18) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 19 && $resultadosarea['res_mFina'] <= 21) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 22 && $resultadosarea['res_mFina'] <= 24) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 25) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 37 && $resultadosarea['res_canMeses'] <= 48) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_mFina'] <= 21) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 22 && $resultadosarea['res_mFina'] <= 24) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 25 && $resultadosarea['res_mFina'] <= 28) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_mFina'] >= 29) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_mFina']; ?></td>
                                        <?php } ?>

                                        <!-- Fin Motricidad Fina -->
                                        <!-- Inicio Audicion y Lenguaje -->
                                        <?php
                                        if ($resultadosarea['res_canMeses'] >= 10 && $resultadosarea['res_canMeses'] <= 12) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_AudyLeng'] <= 9) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 10 && $resultadosarea['res_AudyLeng'] <= 12) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 13 && $resultadosarea['res_AudyLeng'] <= 14) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 15) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 13 && $resultadosarea['res_canMeses'] <= 18) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_AudyLeng'] <= 12) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 13 && $resultadosarea['res_AudyLeng'] <= 14) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 15 && $resultadosarea['res_AudyLeng'] <= 17) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 18) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 19 && $resultadosarea['res_canMeses'] <= 24) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_AudyLeng'] <= 14) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 15 && $resultadosarea['res_AudyLeng'] <= 17) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 18 && $resultadosarea['res_AudyLeng'] <= 20) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 21) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 25 && $resultadosarea['res_canMeses'] <= 36) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_AudyLeng'] <= 17) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 18 && $resultadosarea['res_AudyLeng'] <= 21) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 22 && $resultadosarea['res_AudyLeng'] <= 24) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 25) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 37 && $resultadosarea['res_canMeses'] <= 48) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_AudyLeng'] <= 21) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 22 && $resultadosarea['res_AudyLeng'] <= 25) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 26 && $resultadosarea['res_AudyLeng'] <= 29) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_AudyLeng'] >= 30) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_AudyLeng']; ?></td>
                                        <?php } ?>

                                        <!-- Fin Audicion y Lenguaje -->
                                        <!-- Inicio Personal y Social -->
                                        <?php
                                        if ($resultadosarea['res_canMeses'] >= 10 && $resultadosarea['res_canMeses'] <= 12) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_PerySocial'] <= 9) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 10 && $resultadosarea['res_PerySocial'] <= 12) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 13 && $resultadosarea['res_PerySocial'] <= 14) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 15) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_PerySocial']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 13 && $resultadosarea['res_canMeses'] <= 18) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_PerySocial'] <= 12) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 13 && $resultadosarea['res_PerySocial'] <= 14) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 15 && $resultadosarea['res_PerySocial'] <= 17) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 18) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_PerySocial']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 19 && $resultadosarea['res_canMeses'] <= 24) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_PerySocial'] <= 14) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 15 && $resultadosarea['res_PerySocial'] <= 17) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 18 && $resultadosarea['res_PerySocial'] <= 22) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 23) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_PerySocial']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 25 && $resultadosarea['res_canMeses'] <= 36) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_PerySocial'] <= 18) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 19 && $resultadosarea['res_PerySocial'] <= 22) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 23 && $resultadosarea['res_PerySocial'] <= 27) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_PerySocial'] >= 28) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_PerySocial']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 37 && $resultadosarea['res_canMeses'] <= 48) { ?>
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
                                        <?php } ?>
                                        <!-- fin personal y social -->
                                        <!-- inicio resultado total -->
                                        <?php
                                        if ($resultadosarea['res_canMeses'] >= 10 && $resultadosarea['res_canMeses'] <= 12) { ?>

                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_Total'] <= 42) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 43 && $resultadosarea['res_Total'] <= 49) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 50 && $resultadosarea['res_Total'] <= 56) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 57) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_Total']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 13 && $resultadosarea['res_canMeses'] <= 18) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_Total'] <= 51) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 52 && $resultadosarea['res_Total'] <= 60) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 61 && $resultadosarea['res_Total'] <= 69) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 70) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_Total']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 19 && $resultadosarea['res_canMeses'] <= 24) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_Total'] <= 61) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 62 && $resultadosarea['res_Total'] <= 71) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 72 && $resultadosarea['res_Total'] <= 83) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 84) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_Total']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 25 && $resultadosarea['res_canMeses'] <= 36) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_Total'] <= 74) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 75 && $resultadosarea['res_Total'] <= 86) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 87 && $resultadosarea['res_Total'] <= 100) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 101) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_Total']; ?></td>
                                        <?php } else if ($resultadosarea['res_canMeses'] >= 37 && $resultadosarea['res_canMeses'] <= 48) { ?>
                                            <td class="border border-primary" <?php
                                                                                if ($resultadosarea['res_Total'] <= 89) {
                                                                                    echo ' style="background-color: red; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 90 && $resultadosarea['res_Total'] <= 100) {
                                                                                    echo ' style="background-color: yellow; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 101 && $resultadosarea['res_Total'] <= 114) {
                                                                                    echo ' style="background-color:green; color: black;"';
                                                                                } else if ($resultadosarea['res_Total'] >= 115) {
                                                                                    echo ' style="background-color:blue; color: black;"';
                                                                                }
                                                                                ?>><?= $resultadosarea['res_Total']; ?></td>
                                        <?php } ?>

                                        <td class="border border-primary"><?php echo $resultadosarea['res_Observacion']; ?></td>
                                        <td class="border border-primary"><?php echo $resultadosarea['res_controlN']; ?></td>
                                        <td class="border border-primary">
                                            <a href="<?php echo base_url() ?>resultadosarea/editar?res_Id=<?php echo $resultadosarea['res_Id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>resultadosarea/eliminar?res_Id=<?php echo $resultadosarea['res_Id']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            <a href="<?php echo base_url() ?>inscripcion/pdf?ins_Id=<?php echo $inscripcion['ins_Id']; ?>" class="btn btn-success mb-2" title="Imprimir"><i class="fa-solid fa-print"></i></a>
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
<div id="nuevo_resultadosarea" class="modal fade" tabindex="-" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-bold" id="my-modal-title"><i class="fas fa-user-plus"></i> Registro de Notas Puntajes totales por Área</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>resultadosarea/insertar" autocomplete="off">
                <div class="modal-body bg-white">
                    <div class="row">
                        <div class="card mb-5" style="max-width: 50rem;">
                            <!-- busqueda de los datos del niño -->
                            <div class="card-header bg-primary"><label for="ins_Id" class="fw-bold fs-5 text-dark">Id Inscripcion</label></div>
                            <div class="card-body">
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
                        <!-- registro fecha de Evaluación -->
                        <div class="card mb-5" style="max-width: 50rem;">
                            <div class="card-header bg-primary">
                                <label for="res_FechaCon" class="fw-bold fs-5 text-dark">Fecha de Evaluación</label>
                            </div>
                            <div class="card-body">
                                <!-- <script src="<?php echo base_url(); ?>Assets/js/cameses.js"></script> -->

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="reg_FechaNac" class="fw-bold fs-6 text-dark">Fecha de Nacimiento</label>
                                        <input id="reg_FechaNac" class="form-control" type="date" name="reg_FechaNac" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="res_FechaCon" class="fw-bold fs-6 text-dark">Fecha de Evaluación</label>
                                        <input id="res_FechaCon" class="form-control" type="date" name="res_FechaCon">
                                    </div>
                                    <input type="button" class="btn btn-primary col-md-3" value="Calculate" onclick="calculateMonths()">
                                    <div class="col-md-4">
                                        <label for="res_canMeses" class="fw-bold fs-6 text-dark">Edad en Meses del niño</label>
                                        <input id="res_canMeses" class="form-control" type="text" name="res_canMeses">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- registro puntos por area total -->
                        <div class="card mb-5" style="max-width: 50rem;">
                            <div class="card-header bg-primary">
                                <label for="s_descripcion" class="fw-bold fs-5 text-dark text-center">Puntos por Área</label>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="res_mGruesa" class="fw-bold text-dark">Motricidad Gruesa</label>
                                            <input id="res_mGruesa" class="form-control" type="text" name="res_mGruesa" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="res_mFina" class="fw-bold text-dark">Motricidad Fina</label>
                                            <input id="res_mFina" class="form-control" type="text" name="res_mFina" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="res_AudyLeng" class="fw-bold text-dark">Audicion y Lenguaje</label>
                                            <input id="res_AudyLeng" class="form-control" type="text" name="res_AudyLeng" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="res_PerySocial" class="fw-bold text-dark">Personal y Social</label>
                                            <input id="res_PerySocial" class="form-control" type="text" name="res_PerySocial" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-2">
                                        <div class="form-group">
                                            <label for="res_Total" class="fw-bold text-dark">Total</label>
                                            <input id="res_Total" class="form-control" type="text" name="res_Total">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-5" style="max-width: 50rem;">
                            <div class="card-header bg-primary">
                                <label for="res_Observacion" class="fw-bold text-dark">Observaciones</label>
                            </div>
                            <div class="card-body">
                                <input id="res_Observacion" class="form-control" type="text" name="res_Observacion">
                            </div>
                        </div>
                        <div class="card mb-5" style="max-width: 50rem;">
                            <div class="card-header bg-primary">
                                <div class="bg-primary">
                                    <label class="text-dark h6" for="res_controlN">Número de Control</label>
                                </div>

                            </div>
                            <div class="card-body">
                                <select class="form-control " aria-label=".form-select-lg example" id="res_controlN" name="res_controlN">
                                    <option selected>Seleccione uno</option>
                                    <option value="Primer Control">Primer Control</option>
                                    <option value="Segundo Control">Segundo Control</option>
                                    <option value="Tercer Control">Tercer Control</option>
                                    <option value="Cuarto Control">Cuarto Control</option>
                                    <option value="Quinto Control">Quinto Control</option>
                                    <option value="Sexto Control">Sexto Control</option>
                                    <option value="Septimo Control">Septimo Control</option>
                                    <option value="Octavo Control">Octavo Control</option>
                                    <option value="Noveno Control">Noveno Control</option>
                                    <option value="Decimo Control">Decimo Control</option>
                                </select>

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