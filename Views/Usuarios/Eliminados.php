<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a href="<?php echo base_url(); ?>/Usuarios/Listar" class="btn btn-primary">Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombre</th>
                                    <th class="border border-dark">usuario</th>
                                    <th class="border border-dark">Correo</th>
                                    <th class="border border-dark">Rol</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $us) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $us['id']; ?></td>
                                        <td class="border border-dark"><?php echo $us['nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $us['usuario']; ?></td>
                                        <td class="border border-dark"><?php echo $us['correo']; ?></td>
                                        <td class="border border-dark"><?php echo $us['rol']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-primary">Reingresar</button>
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