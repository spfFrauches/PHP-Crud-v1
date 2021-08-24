<form method="post" name="formAlertaSuporteUpdate" id="formAlertaSuporteUpdate" class="formAlertaSuporteUpdate" autocomplete="off"><?= AUTH(); ?></form>

<div class="row">            
    <div class="col-lg-12">     
        <div class="form-group">
            Nome do Alerta                    
            <input type="text" class="form-control" required readonly value="<?= $listarAlerta[0]->dcmsgalerta ?>" />
            <input type="hidden" class="form-control" name="cdalerta" form="formAlertaSuporteUpdate" value="<?= $listarAlerta[0]->cdalerta ?>" />
        </div>            
    </div> 
</div>

<?php 
    $listarAlerta[0]->dtini = str_replace(" ", "", $listarAlerta[0]->dtini);
    $listarAlerta[0]->dtini = substr_replace($listarAlerta[0]->dtini, 'T', -8, 0);    
    $listarAlerta[0]->dtfim = str_replace(" ", "", $listarAlerta[0]->dtfim);
    $listarAlerta[0]->dtfim = substr_replace($listarAlerta[0]->dtfim, 'T', -8, 0);
?>

<div class="row mt-4"> 
    
    <div class="col-lg-12">
        <div class="form-group">
            Detalhes/Observações do alerta (Visualização lado cliente)
            <textarea class="form-control" form="formAlertaSuporteUpdate" rows="3" value="<?= $listarAlerta[0]->dcobsalerta ?>" required readonly ><?= $listarAlerta[0]->dcobsalerta ?></textarea>
            
        </div>
    </div> 

    <div class="col-lg-6">     
        <div class="form-group">
            Data Inicial                   
            <input type="datetime-local" class="form-control" name="dtini" value="<?= $listarAlerta[0]->dtini ?>" required readonly/>
        </div>            
    </div> 

    <div class="col-lg-6">     
        <div class="form-group">
            Prev. Termino                   
            <input type="datetime-local" class="form-control" form="formAlertaSuporteUpdate" name="dtfim" value="<?= $listarAlerta[0]->dtfim ?>" required />
        </div>            
    </div> 

    <div class="col-lg-12">     
        <div class="form-group">
            <hr/>  
            <p style="font-size: 22px">Área / Região do alerta</p> 
            <hr/>
        </div>            
    </div>  

    <div class="col-lg-5">
        <div class="form-group">                        
            Cidade
            <select class="form-control mt-2 inputCidade" name="cidadeOLT" required readonly disabled> 
                <?php foreach ($consultarCidadesOLT as $keyCid => $valueCid) : ?>
                <option value="<?= $valueCid->cdcidade ?>" <?=($listarAlerta[0]->cdcidade == $valueCid->cdcidade) ? "selected" : "" ?>> <?= $valueCid->nmcidade ?> </option>
                <?php endforeach; ?>
            </select>
            <small id="emailHelp" class="form-text">Informe o Nro da Agenda</small>
        </div>
    </div> 

    <?php 
        $consultarOLT = json_decode(SuporteModel::consultarOLTs($listarAlerta[0]->cdcidade));
        $consultarOLT = $consultarOLT->dados;             
    ?>
         
    <div class="col-lg-7">
        <div class="form-group">
            OLT                
            <select class="form-control mt-2" name="oltBusca" required readonly disabled>   
                <?php foreach ($consultarOLT as $keyOLT => $valueOLT) : ?>                    
                <option <?= ($listarAlerta[0]->cdolt == $valueOLT->noolt ? "selected" : "") ?> ><?= "Nro.: ".$valueOLT->noolt." - ".$valueOLT->nmolt ?></option>
                <?php endforeach; ?>
            </select>                
        </div>
    </div> 
   
    <?php 
        if ($listarAlerta[0]->cdcdr == '0'):
            $etiqueta = 0;
        endif;             
    ?>
    
    <div class="col-lg-4">
        <div class="form-group">
            CDR
            <input type="text" class="form-control mt-2 inputCdr" name="inputCdr" value="<?= $etiqueta ?>" required readonly disabled>
            <small id="helpCDR" class="form-text">Nro do CDR [4 digitos]</small>                        
        </div>
    </div> 
     
    <?php 
        //var_dump($listarAlerta[0]); 
        if ($listarAlerta[0]->cdramal != '0'):
            $consultarRamaisCRDs = json_decode(SuporteModel::consultarRamaisCDRs($listarAlerta[0]->cdcdr));
            $consultarRamaisCRDs = $consultarRamaisCRDs->dados; 
        endif;
    ?>

    <div class="col-lg-8">
        <div class="form-group">
            Ramal
            
            <?php if ($listarAlerta[0]->cdramal == '0'): ?>
                <select class="form-control mt-2" readonly disabled="">
                    <option></option>
                </select>
            <?php endif; ?>
            
            <?php if ($listarAlerta[0]->cdramal != '0'): ?>
                <select class="form-control mt-2" name="ramaisCDR" required="" readonly disabled="">
                    <?php foreach ($consultarRamaisCRDs as $keyRam => $valueRam) : ?> 
                    <option <?= ($listarAlerta[0]->cdramal == $valueRam->noramal ? "selected" : "") ?>> <?= $valueRam->noramal . " - ".$valueRam->dcreferencia  ?> </option>
                    <?php endforeach; ?>
                </select>   
            <?php endif; ?>
        </div>
    </div> 
     
    <?php
        
        if ($listarAlerta[0]->cdcdr == '0'):
            $cdramal = 0;
        endif;
        
         if ($listarAlerta[0]->cdramal != '0'):
            foreach ($consultarRamaisCRDs as $keyRam1 => $valueRam1) :
                if ($listarAlerta[0]->cdramal == $valueRam1->cdramal):
                    $cdramal = $valueRam1->cdramal;
                endif; 
            endforeach;
        endif;
        
        if ($listarAlerta[0]->cdramal != '0'):
            $consultarCaixas = json_decode(SuporteModel::consultarCaixasFTTH2($cdramal));
            $consultarCaixas = $consultarCaixas->dados; 
        endif;
                             
        
    ?>

    <div class="col-lg-6">
        <div class="form-group">
            Caixa   
            
            <?php if ($listarAlerta[0]->cdcaixa == '0' ): ?>
                 <select class="form-control mt-2" required disabled>
                     <option></option>
                 </select>
            <?php endif; ?>
            
            <?php if ($listarAlerta[0]->cdramal != '0' && $listarAlerta[0]->cdcaixa != '0'): ?>
                <select class="form-control mt-2" name="caixaRamal" required disabled> 
                    <?php foreach ($consultarCaixas as $keyCaixa => $valueCaixa) : ?>    
                    <option <?= ( intval($listarAlerta[0]->cdcaixa) == intval($valueCaixa->cdetiqueta)) ? "selected" : "" ?>  >  <?= $valueCaixa->cdetiqueta . " - ".$valueCaixa->nmbairro. " | ".$valueCaixa->dcendereco ?>  </option>
                    <?php endforeach; ?>
                </select>  
            <?php endif; ?>
        </div>
    </div> 

    <div class="col-lg-6">
        <div class="form-group">
            Status do alerta                        
            <select class="form-control mt-2" name="flstatus" required="" form="formAlertaSuporteUpdate">                       
                <option value="0" <?= $listarAlerta[0]->flstatus == 0 ? "selected" : "" ?> >ATIVO</option>
                <option value="1" <?= $listarAlerta[0]->flstatus == 1 ? "selected" : "" ?> >INATIVO</option>
            </select>                         
        </div>
    </div> 

</div> 

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
    <button  class="btn btn-primary btn-update" form="formAlertaSuporteUpdate"> Salvar Alterações </button>
</div>




