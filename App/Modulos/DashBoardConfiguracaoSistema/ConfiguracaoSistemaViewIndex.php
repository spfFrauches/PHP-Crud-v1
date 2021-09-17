<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Configuração do Sistema</h1>
</div>

<div class="row">  
    <div class="col-lg-6">     
        <div class="list-group">           
            <?php if ($verifyConn == "no"): ?>
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <span class="d-inline-block bg-danger rounded-circle mt-2" style="width: 12px; height: 12px;"></span>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Conexão com Banco de dados</h6>
                            <p class="mb-0 opacity-75">Não conectado</p>
                            <p class="mb-0 opacity-75 text-danger"><?= $detalhes ?></p>
                        </div>
                        <small class="opacity-50 text-nowrap"> <a href="#">Configurar</a></small>
                    </div>
                </div>     
            <?php endif; ?>
            
            <?php if ($verifyConn == "yes"): ?>
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <span class="d-inline-block bg-success rounded-circle mt-2" style="width: 12px; height: 12px;"></span>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Conexão com Banco de dados</h6>
                            <p class="mb-0 opacity-75">Conectado</p>
                        </div>
                        <small class="opacity-50 text-nowrap"> <a href="#"><i class="bi bi-check-circle-fill"></i></a></small>
                    </div>
                </div>  
            <?php endif; ?>
        </div>                                          
    </div> 
</div>

<div class="row">  
    <div class="col-lg-6">     
        <div class="list-group">           
            <?php if ($checktabelas == "notable"): ?>
                <br/>
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <span class="d-inline-block bg-danger rounded-circle mt-2" style="width: 12px; height: 12px;"></span>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Base de dados</h6>
                            <p class="mb-0 opacity-75">Não configurado | Inexistente</p>
                            <p class="mb-0 opacity-75 text-danger"></p>
                        </div>
                        <small class="opacity-50 text-nowrap"> <a href="<?= URL ?>adminDashBoard/configuracaoSistema/criarBaseDados">Configurar <i class="bi bi-arrow-right-circle"></i></a></small>
                    </div>
                </div>     
            <?php endif; ?>
            
            <br/>
            
            <?php if ($checktabelas == "yes"): ?>
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <span class="d-inline-block bg-success rounded-circle mt-2" style="width: 12px; height: 12px;"></span>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Base de dados</h6>
                            <p class="mb-0 opacity-75">Configurado</p>
                        </div>
                        <small class="opacity-50 text-nowrap"> <a href="#"><i class="bi bi-check-circle-fill"></i></a></small>
                    </div>
                </div>  
            <?php endif; ?>
        </div>                                          
    </div> 
</div>








