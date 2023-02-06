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
                                    <th class="border border-dark">Nombre de la categoria</th>
                                    <th class="border border-dark">Descripción</th>                                    
                                    <th class="border border-dark">Monto de para cancelar</th>
                                    <th class="border border-dark">gestiòn</th>
                                    <th class="border border-dark">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $catpago) { ?>
                                    <tr>
                                        <td class="border border-dark"><?php echo $catpago['cat_id']; ?></td>
                                        <td class="border border-dark"><?php echo $catpago['cat_nombre']; ?></td>
                                        <td class="border border-dark"><?php echo $catpago['cat_descripcion']; ?></td>                                        
                                        <td class="border border-dark"><?php echo $catpago['cat_monto'].' Bs.'; ?></td>
                                        <td class="border border-dark"><?php echo 'Año '.$catpago['ges_anio']; ?></td>
                                       <td class="border border-dark">
                                            <form action="<?php echo base_url() ?>catpago/reingresar?cat_id=<?php echo $catpago['cat_id']; ?>" method="post" class="d-inline confirmar">
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