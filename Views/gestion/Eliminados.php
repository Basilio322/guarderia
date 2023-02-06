<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>gestion/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="bg-danger">
                            <tr>
                                    <th class="border border-dark">Id</th>
                                    <th class="border border-dark">Año de gestión</th>
                                    <th class="border border-dark">Mensualidad</th>                                    
                                    <th class="border border-dark">observaciones</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $gestion) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $gestion['id_Gestion']; ?></td>
                                        <td class="border border-dark"><?php echo 'Gestión '.$gestion['ges_anio']; ?></td>
                                        <td class="border border-dark"><?php echo $gestion['ges_mensualidad'].' Bs'; ?></td>                                        
                                        <td class="border border-dark"><?php echo $gestion['ges_observaciones']; ?></td>
                                         <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>gestion/reingresar?id_Gestion=<?php echo $gestion['id_Gestion']; ?>" method="post" class="d-inline confirmar">
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