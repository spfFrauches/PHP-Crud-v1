<form method="post" name="formAlertaSuporteExcluir" id="formAlertaSuporteExcluir" class="formAlertaSuporteExcluir" autocomplete="off">
    <?= AUTH(); ?>
</form>

<?php 
    $listarAlerta[0]->dtini = str_replace(" ", "", $listarAlerta[0]->dtini);
    $listarAlerta[0]->dtini = substr_replace($listarAlerta[0]->dtini, 'T', -8, 0);    
    $listarAlerta[0]->dtfim = str_replace(" ", "", $listarAlerta[0]->dtfim);
    $listarAlerta[0]->dtfim = substr_replace($listarAlerta[0]->dtfim, 'T', -8, 0);
?>

<div class="row">            
    <div class="col-lg-12">     
        <div class="form-group">
            Nome do Alerta                    
            <input type="text" class="form-control" required readonly value="<?= $listarAlerta[0]->dcmsgalerta ?>" />
            <input type="hidden" class="form-control" name="cdalerta" form="formAlertaSuporteExcluir" value="<?= $listarAlerta[0]->cdalerta ?>" />
        </div>            
    </div> 
</div>

<div class="row mt-4">    
    <div class="col-lg-12">
        <div class="form-group">
            Detalhes/Observações do alerta (Visualização lado cliente)
            <textarea class="form-control" readonly="" name="txtmsgalerta"rows="3" value="<?= $listarAlerta[0]->dcobsalerta ?>" required="" ><?= $listarAlerta[0]->dcobsalerta ?></textarea>
            <small id="txtmsgSpam" class="form-text">Máximo de 120 caracteres no texto </small>
        </div>
    </div> 
    <div class="col-lg-6">     
        <div class="form-group">
            Data Inicial                   
            <input type="datetime-local" class="form-control" value="<?= $listarAlerta[0]->dtini ?>" required="" readonly=""/>
        </div>            
    </div> 
    <div class="col-lg-6">     
        <div class="form-group">
            Prev. Termino                   
            <input type="datetime-local" class="form-control"value="<?= $listarAlerta[0]->dtfim ?>" required="" readonly=""/>
        </div>            
    </div> 
</div> 

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
    <button  class="btn btn-danger btn-excluir" form="formAlertaSuporteExcluir"> Excluir Alerta </button>
</div>




