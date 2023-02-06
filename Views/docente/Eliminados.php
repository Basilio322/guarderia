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
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Telefono</th>
                                    <th class="border border-dark">Email</th>
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Profesión o Carrera</th>
                                    <th class="border border-dark">Institución Proveniente</th>
                                    <th class="border border-dark">Sala</th>
                                    <th class="border border-dark">Tipo de Contrato</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $docente) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $docente['doc_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Paterno']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Telefono']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Email']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Direccion']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Profesion']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_instProv']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['s_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $docente['doc_Contrato']; ?></td>
                                       <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>docente/reingresar?doc_Id=<?php echo $docente['doc_Id']; ?>" method="post" class="d-inline confirmar">
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