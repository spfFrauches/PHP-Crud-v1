<style>   
    @media only screen and (max-width: 600px) {}
</style>

<div class="container">
    <div class="row pt-5 mt-5 text-white">          
        <div class="col-lg-8 col-7">
            <h3 class="text-light">
                Alertas Suporte              
                <span class="position-relative ml-1"> 
                    <i class="bi bi-exclamation-triangle"></i> <span class="gredisonStyle">1</span>
                </span>
            </h3>           
        </div>
        <div class="col-lg-4 col-5 text-right">           
            <a style="width: 110px" href="<?= Rotas::HOME() ?>suporte/homeSuporteAdmin" class="btn btn-light btn-sm"><b style="color: #0d2b5f;"><i class="bi bi-arrow-left"></i>Voltar</b></a>
        </div>
    </div>
</div>

<br/>
 
<div class="container"> 
    <div class="card text-white" style="background:#0d2b5f;">
        <div class="card-body">
            <p class="text-white" style="font-size: 18px; margin-top: -5px">
                <b>Ola, <?= $_SESSION["suporte"]->nmusuario ?></b> 
            </p>
            <p class="text-white" style="font-size: 22px"> 
                <b>Alertas do Suporte</b> 
            </p>
            <p class="text-white" style="font-size: 18px; margin-top: -15px"> 
                Cadastro de alertas de suporte. Registro de áreas/regiões com problemas para que o cliente
                visualize como mensagem de alerta ao entrar na tela de abertura de suporte.
            </p>            
        </div>
    </div>     
</div>

<?php // var_dump ($listarAlerta); ?>

<br/><br/>

<div class="container">
    <div class="row">        
        <div class="text-light col-lg-6 col-6 textoMobileTitulo" style="font-size: 19px">
            <b>Cadastro de Alertas</b>            
        </div>
        <div class="text-light col-lg-6 col-6 text-right" style="font-size: 19px">
            <button  class="btn btn-light btn-sm" id="btnNovoAlerta"> 
                <b style="color: #0d2b5f;">Novo alerta</b>
            </button>         
        </div>
    </div>
</div>

<br/><br/>



<div class="container viewDivListAlertaSuporte">
    <div class="my-3 p-3 rounded shadow-sm text-white" style="background-color: #0d2b5f"> 
        <div style="color:#fff"> 
            <br/>       
            <table class="table table-striped table-responsive-sm">
                <thead>
                    <tr>
                       <th>Cód.</th>
                       <th >Alerta</th>
                       <th >Data Alerta</th>
                       <th >Status</th>
                       <th>Observação Alerta</th>
                       <th>Ações</th>
                   </tr>
                </thead>
                <tbody> 
                    <?php if (empty($listarAlerta)): ?>
                        <tr>
                           <td> Nenhum alerta cadastrado </td>                         
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                        </tr> 
                    <?php endif; ?>  
                        
                    <?php foreach ($listarAlerta as $key => $value): ?>
                        <tr>
                            <td> <?= $value->cdalerta ?> </td>                         
                            <td> <?= $value->dcmsgalerta ?> </td>
                            <td> <?= date("d/m/Y", strtotime($value->dtini)) ?> </td>
                            <td> 
                                <?= ($value->flstatus == 0 ? "Ativo" : "Inativo")  ?> 
                            </td>
                            <td> <?= $value->dcobsalerta ?> </td>
                            <td>
                                <a href="#" class="carregarModalAlerta" data-toggle="modal" data-target="#detalhesModalAlerta" data-modal="<?= $value->cdalerta ?>">
                                    <i class="bi bi-search"></i>
                                </a>
                                &nbsp;
                                <a href="#" class="carregarModalAlertaExcluir" data-toggle="modal" data-target="#detalhesModalAlertaExcluir" data-modal="<?= $value->cdalerta ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr> 
                    <?php endforeach; ?> 
                    
                </tbody>              
            </table>
        </div>
    </div>
</div>

<div class="container viewDivFormAlertaSuporte">
    <div class="my-3 p-3 rounded shadow-sm text-white" style="background-color: #0d2b5f">            
        <form method="post" name="formAlertaSuporte" id="formAlertaSuporte" class="formAlertaSuporte" autocomplete="off">
            <?= AUTH(); ?>
        </form>
        <input type="hidden" name="funcao" value="dadosFormAlertaSuporte" form="formAlertaSuporte"> 
        
        <div class="row mt-2">       
            <div class="col-lg-12"> 
                
                <label>Alerta</label>               
                <select class="form-control mt-2" id="mensagemAlerta" name="cdmsgalerta" form="formAlertaSuporte" required="">
                    <option></option>
                    <?php foreach ($listarMsgAlerta as $keyMsgAlerta => $valueMsgAlerta):?>
                    <option value="<?= $valueMsgAlerta->cdmsgalerta ?>"> <?= $valueMsgAlerta->dcmsgalerta ?> </option>
                    <?php endforeach;  ?>
                </select>
                
                <script>                                         
                    var dcMsg = [];                                       
                    <?php foreach ($listarMsgAlerta as $keyMsgAlerta => $valueMsgAlerta) :?>
                        dcMsg[<?= $valueMsgAlerta->cdmsgalerta ?>] = '<?= $valueMsgAlerta->dcobsalerta ?>';                                   
                    <?php endforeach; ?>                                        
                    $("#mensagemAlerta").change(function(){                                                                             
                        $(".msgT").text(dcMsg[parseInt($("#mensagemAlerta").val())]);
                    });                                       
                </script> 
                <br/>
                <textarea class="form-control msgT" id="txtmsgalerta" name="txtmsgalerta"rows="3" form="formAlertaSuporte" required="" readonly=""></textarea>
                             
            </div>
        </div>    
            
        <div class="row mt-4"> 

            <div class="col-lg-6">     
                <div class="form-group">
                    <label>Data Inicial</label>                    
                    <input type="datetime-local" class="form-control dtini" id="dtini" name="dtini" form="formAlertaSuporte" required=""/>
                </div>            
            </div>             
            <div class="col-lg-6">     
                <div class="form-group">
                    <label>Prev. Termino</label>                    
                    <input type="datetime-local" class="form-control dtfim" id="dtfim" name="dtfim" form="formAlertaSuporte" required=""/>
                </div>            
            </div>              
            <div class="col-lg-12">     
                <div class="form-group">
                    <hr/>  
                    <p style="font-size: 22px">Área / Região do alerta</p> 
                    <hr/>
                </div>            
            </div>  
            <div class="col-lg-6">
                <div class="form-group">                        
                    <label>Cidade</label>
                    <select class="form-control mt-2 inputCidade" name="cidadeOLT" form="formAlertaSuporte" required="">                       
                        <option></option>
                    </select>
                    <small id="emailHelp" class="form-text">Informe o Nro da Agenda</small>
                </div>
            </div>             
            <div class="col-lg-3">
                <div class="form-group">
                    <label>OLT</label>
                    <select class="form-control mt-2" id="oltBusca" name="oltBusca" form="formAlertaSuporte" required="" >                       
                        <option></option>
                    </select> 
                </div>
            </div>             
            <div class="col-lg-3">
                <div class="form-group">
                    <label>CDR</label>
                    <input type="text" class="form-control mt-2 inputCdr" id="inputCdr" name="inputCdr" form="formAlertaSuporte">
                    <small id="helpCDR" class="form-text">Nro do CDR [4 digitos]</small>                        
                </div>
            </div>             
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Ramal</label>                        
                    <select class="form-control mt-2" id="ramaisCDR" name="ramaisCDR" form="formAlertaSuporte">                       
                        <option></option>
                    </select>                         
                </div>
            </div>            
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Caixa</label>                        
                    <select class="form-control mt-2" id="caixaRamal" name="caixaRamal" form="formAlertaSuporte" >                       
                        <option></option>
                    </select>                         
                </div>
            </div>            
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status do alerta</label>                        
                    <select class="form-control mt-2" name="flstatus" form="formAlertaSuporte" required="">                       
                        <option value="0">ATIVO</option>
                        <option value="1">INATIVO</option>
                    </select>                         
                </div>
            </div>             
        </div> 
        
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-light btn-sm botaoSalvarAlerta"  form="formAlertaSuporte"><b style="color: #0d2b5f">Salvar Alerta </b></button>
                </div>
            </div>              
        </div>
    </div>
</div>

<br/>

<!-- --------------------------------------------------------------------------- -->
<!-- MODAL DINAMINCO CHAMADO JS PARA DETALHES DOS DETALHES LISTADOS ------------ -->
<!-- --------------------------------------------------------------------------- -->

<div class="modal fade bd-example-modal-lg" id="detalhesModalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #000">Detalhes e Edição do Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit"> </div>           
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="detalhesModalAlertaExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #000">Excluir Mgs de Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body excluir"> </div>            
        </div>
    </div>
</div>

<script src="<?= Rotas::HOME() ?>view/AlertasSuporte/AlertaSuporte_1_0_1.js"></script>


