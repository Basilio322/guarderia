<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>resultadosarea/actualizar" autocomplete="off">
                        <div class="card-header bg-dark mb-3">
                            <h6 class="title text-white text-center">Modificar Datos del Contacto de Emergencia</46>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="card text-bg-white mb-12" style="max-width: 60rem;">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_FechaCon">Fecha de Evaluación</label>
                                                    <input type="hidden" name="res_Id" value="<?php echo $data['resultadosarea']['res_Id']; ?>">
                                                    <input id="res_FechaCon" class="form-control" type="date" name="res_FechaCon" value="<?php echo $data['resultadosarea']['res_FechaCon']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_canMeses">Edad del niño en Meses</label>
                                                    <input id="res_canMeses" class="form-control" type="text" name="res_canMeses" value="<?php echo $data['resultadosarea']['res_canMeses']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card text-bg-white mb-12" style="max-width: 60rem;">
                                    <div class="card-header">Puntaje del resultado por áreas </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_mGruesa">Motricidad Gruesa</label>
                                                    <input id="res_mGruesa" class="form-control" type="text" name="res_mGruesa" value="<?php echo $data['resultadosarea']['res_mGruesa']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_mFina">Motricidad Fina</label>
                                                    <input id="res_mFina" class="form-control" type="text" name="res_mFina" value="<?php echo $data['resultadosarea']['res_mFina']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_AudyLeng">Audición y Lneguaje</label>
                                                    <input id="res_AudyLeng" class="form-control" type="text" name="res_AudyLeng" value="<?php echo $data['resultadosarea']['res_AudyLeng']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_PerySocial">Motricidad Y Social</label>
                                                    <input id="res_PerySocial" class="form-control" type="text" name="res_PerySocial" value="<?php echo $data['resultadosarea']['res_PerySocial']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark h6" for="res_Total">Total</label>
                                                    <input id="res_Total" class="form-control" type="text" name="res_Total" value="<?php echo $data['resultadosarea']['res_Total']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card text-bg-white mb-12" style="max-width: 60rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark h6" for="res_Observacion">Observaciones</label>
                                            <input id="res_Observacion" class="form-control" type="text" name="res_Observacion" value="<?php echo $data['resultadosarea']['res_Observacion']; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark h6" for="res_controlN">Número de Control</label>
                                                <input id="res_controlN" class="form-control" type="text" name="res_controlN" value="<?php echo $data['resultadosarea']['res_controlN']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>resultadosarea/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>