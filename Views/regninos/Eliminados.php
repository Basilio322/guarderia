<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del del niño y niña Inactivos o Eliminados</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>regninos/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombres</th>
                                    <th class="border border-dark">Paterno</th>
                                    <th class="border border-dark">Genero</th>
                                    <th class="border border-dark">Fecha Nacimiento</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $regNinos) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Nombres']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Paterno'] . " " . $regNinos['reg_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_Genero']; ?></td>
                                        <td class="border border-dark"><?php echo $regNinos['reg_FechaNac']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>regninos/reingresar?reg_Id=<?php echo $regNinos['reg_Id']; ?>" method="post" class="d-inline confirmar">
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