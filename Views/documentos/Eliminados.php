<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <p class="fw-bold text-dark text-center h1 ">Documentos complementarios de los niños o niñas Eliminados</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>documentos/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                            <tr>
                                    <th class="border border-dark">Nº</th>
                                    <th class="border border-dark">nombres Niño/Niña</th>
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Ci número</th>
                                    <th class="border border-dark">Certificado de Nacimiento</th>
                                    <th class="border border-dark">Tipo de Seguro de Salud</th>
                                    <th class="border border-dark">Carnet de Vacunas</th>
                                    <th class="border border-dark">Discapacidad</th>

                                    <th class="border border-dark">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $documentos) {

                                    if ($documentos['docu_estado'] == 0) {
                                        $docu_estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $docu_estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }

                                ?>
                                    <tr>

                                        <td class="border border-dark"><?php echo $documentos['docu_id']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['reg_Nombres'] . " " . $documentos['reg_Paterno']; ?></td>
                                        <td class='border border-dark'><?php echo $documentos['docu_ci']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_cinum']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_certificado']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_ss']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_ciVacu']; ?></td>
                                        <td class="border border-dark"><?php echo $documentos['docu_disc']; ?></td>
                                        
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>documentos/reingresar?docu_id=<?php echo $documentos['docu_id']; ?>" method="post" class="d-inline confirmar">
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