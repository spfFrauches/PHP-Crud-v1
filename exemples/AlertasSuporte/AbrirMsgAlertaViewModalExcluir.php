<form method="post" name="formMsgAlertaSuporteExcluir" id="formMsgAlertaSuporteExcluir" class="formMsgAlertaSuporteExcluir" autocomplete="off">
    <?= AUTH(); ?>
</form>

<?php if ($podeExcluir == 'nao'): ?>
<div class="alert alert-warning text-dark" role="alert">
    Essa mensagem está ligada a um alerta, não será possivel excluir.
    <br/>
    Caso queira prosseguir exclua primeiro o Alerta que contém essa mensagem.
    <br/>
    Cód. Alerta ao qual esta ligado.: [<?= $buscarCdMsgNoAlerta[0]->cdalerta ?>]
</div>
<?php endif; ?>

<div class="row">            
    <div class="col-lg-12">     
        <div class="form-group">
            Nome do Alerta                    
            <input type="text" class="form-control" name="dcmsgalerta" required="" readonly="" value="<?= $listarMsgAlerta[0]->dcmsgalerta ?>" />
            <input type="hidden" class="form-control" name="cdmsgalerta" form="formMsgAlertaSuporteExcluir" value="<?= $listarMsgAlerta[0]->cdmsgalerta ?>" />
        </div>            
    </div> 
</div>

<div class="row mt-4">    
    <div class="col-lg-12">
        <div class="form-group">
            Detalhes/Observações do alerta (Visualização lado cliente)
            <textarea class="form-control" readonly="" name="dcobsalerta"rows="3" value="<?= $listarMsgAlerta[0]->dcobsalerta ?>" required="" ><?= $listarMsgAlerta[0]->dcobsalerta ?></textarea> 
        </div>
    </div>    
</div> 

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
    <button  class="btn btn-danger btn-excluir" <?= ($podeExcluir == 'nao') ? "disabled" : "" ?> form="formMsgAlertaSuporteExcluir"> Excluir Alerta </button>
</div>




