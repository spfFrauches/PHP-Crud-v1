<form method="post" name="formMsgAlertaSuporteUpdate" id="formMsgAlertaSuporteUpdate" class="formMsgAlertaSuporteUpdate" autocomplete="off"><?= AUTH(); ?></form>

<div class="row">            
    <div class="col-lg-12">     
        <div class="form-group">
            Descrição do Alerta                    
            <input type="text" class="form-control" name="dcmsgalerta" required="" value="<?= $listarMsgAlerta[0]->dcmsgalerta ?>" form="formMsgAlertaSuporteUpdate"/>
            <input type="hidden" class="form-control" name="cdmsgalerta" form="formMsgAlertaSuporteUpdate" value="<?= $listarMsgAlerta[0]->cdmsgalerta ?>" />
        </div>            
    </div> 
</div>


<div class="row mt-4"> 
    
    <div class="col-lg-12">
        <div class="form-group">
            Detalhes/Observações do alerta (Visualização lado cliente)
            <textarea class="form-control" form="formMsgAlertaSuporteUpdate" name="dcobsalerta"rows="3" value="<?= $listarMsgAlerta[0]->dcobsalerta ?>" required="" ><?= $listarMsgAlerta[0]->dcobsalerta ?></textarea>
            <small id="txtmsgSpam" class="form-text">Máximo de 120 caracteres no texto </small>
        </div>
    </div> 


    <div class="col-lg-6">
        <div class="form-group">
            Status do alerta                        
            <select class="form-control mt-2" name="flstatus" required="" form="formMsgAlertaSuporteUpdate">                       
                <option value="0" <?= $listarMsgAlerta[0]->flstatus == 0 ? "selected" : "" ?> >ATIVO</option>
                <option value="1" <?= $listarMsgAlerta[0]->flstatus == 1 ? "selected" : "" ?> >INATIVO</option>
            </select>                         
        </div>
    </div> 

</div> 

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
    <button  class="btn btn-primary btn-update" form="formMsgAlertaSuporteUpdate"> Salvar Alterações </button>
</div>




