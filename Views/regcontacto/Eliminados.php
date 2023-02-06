<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
<p class="fw-bold text-dark text-center h1 ">Datos del Contacto de Emergencia Eliminados</p>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>regcontacto/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                                <tr>
                                <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Nombre del Niño</th>
                                    <th class="border border-dark">Apellido Paterno</th>
                                    <th class="border border-dark">Apellido Materno</th>
                                    <th class="border border-dark">Nombre</th>                                    
                                    <th class="border border-dark">Ci</th>
                                    <th class="border border-dark">Celular</th>
                                    <th class="border border-dark">Parentesco</th>                                    
                                    <th class="border border-dark">Direccion</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $regcontacto) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Id']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['reg_Id']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $regcontacto['con_Paterno']?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Materno']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Nombres']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $regcontacto['con_Ci']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Celular']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Parentesco']; ?></td>
                                        <td class="border border-dark"><?php echo $regcontacto['con_Direccion']; ?></td>
                                        <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>regcontacto/reingresar?con_Id=<?php echo $regcontacto['con_Id']; ?>" method="post" class="d-inline confirmar">
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