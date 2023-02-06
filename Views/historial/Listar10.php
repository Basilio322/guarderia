<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Datos del Historial Médico</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                <p class="fs-5 fw-bold">Número de control</p>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar"> Inicio</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar1"> 1º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar2"> 2º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar3"> 3º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar4"> 4º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar5"> 5º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar6"> 6º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar7"> 7º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar8"> 8º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar9"> 9º Control</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>historial/Listar10"> 10º Control</a>
                    </div>
                    <div class="table-responsive p-2">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="table-primary border border-primary">Nº</th>
                                    <th class="table-primary border border-primary">nombres Niño/Niña</th>
                                    <th class="table-primary border border-primary">Peso</th>

                                    <th class="table-primary border border-primary">Talla</th>
                                    <th class="table-primary border border-primary">Fecha de Control</th>
                                    <th class="table-primary border border-primary">Numero de Control</th>
                                    <th class="table-primary border border-primary">Observaciones</th>

                                    
                                </tr>
                            </thead>
                            <tbody class="table-table-group-divider">
                                <?php foreach ($data["historial"] as $regmedico) {

                                    if ($regmedico['his_estado'] == 1) {
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