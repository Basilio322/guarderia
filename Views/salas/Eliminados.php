<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>salas/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombre de la Sala</th>
                                    <th class="border border-dark">Descripción</th>

                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $salas) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $salas['s_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $salas['s_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $salas['s_descripcion']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>salas/reingresar?s_Id=<?php echo $salas['s_Id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-ad"></i></button>
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