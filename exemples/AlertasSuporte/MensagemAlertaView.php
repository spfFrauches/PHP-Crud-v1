<style>   
    @media only screen and (max-width: 600px) {}
</style>

<div class="container">
    <div class="row pt-5 mt-5 text-white">          
        <div class="col-lg-8 col-7">
            <h3 class="text-light">
                Mensagens para Alertas de Suporte              
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
                <b>Cadastro de mensagens de alerta</b> 
            </p>           
            
            <p class="text-white" style="font-size: 18px; margin-top: -15px"> 
                Mensagens para os alertas de problemas/manutenções a serem
                visualizadas pelo cliente. 
            </p> 
            
        </div>
    </div>     
</div>

<br/><br/>

<div class="container">
    <div class="row">        
        <div class="text-light col-lg-6 col-6 textoMobileTitulo" style="font-size: 19px">
            <b>Cadastro de Mensagem</b>            
        </div>
        <div class="text-light col-lg-6 col-6 text-right" style="font-size: 19px">
            <button  class="btn btn-light btn-sm" id="btnMsgNovoAlerta"> 
                <b style="color: #0d2b5f;">Nova mensagem</b>
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
                       <th scope="col">Cód.</th>
                       <th scope="col">Descrição</th>
                       <th scope="col">Mensagem</th>
                       <th scope="col">Status</th>
                       <th> Ação </th>
                   </tr>
                </thead>
                <tbody> 
                    <?php if (empty($listarMsgAlerta)): ?>
                        <tr>
                           <td> Nenhum alerta cadastrado </td>                         
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                        </tr> 
                    <?php endif; ?>     
                        
                    <?php foreach ($listarMsgAlerta as $keyMsg => $valueMsg) : ?>
                        <tr>
                           <td> <?= $valueMsg->cdmsgalerta ?> </td>                         
                           <td> <?= $valueMsg->dcmsgalerta ?> </td>
                           <td> <?= $valueMsg->dcobsalerta ?> </td>
                           <td> 
                               <?= ($valueMsg->flstatus == '0') ? "Ativo" : "Inativo" ?> 
                           </td>
                           <td >                           
                                <a href="#" class="carregarModalMsgAlerta" data-toggle="modal" data-target="#detalhesModalMsgAlerta" data-modal="<?= $valueMsg->cdmsgalerta ?>">
                                    <i class="bi bi-search"></i>
                                </a>
                               &nbsp;
                                <a href="#" class="carregarModalMsgAlertaExcluir" data-toggle="modal" data-target="#detalhesModalMsgAlertaExcluir" data-modal="<?= $valueMsg->cdmsgalerta ?>">
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
        
        <form method="post" name="formMsgAlertaSuporte" id="formMensagemAlertaSuporte" class="formMgsAlertaSuporte" autocomplete="off">
            <?= AUTH(); ?>
        </form>
        <div class="row mt-2">             
            <div class="col-lg-12">     
                <div class="form-group">
                    <label>Nome do Alerta</label>                    
                    <input type="text" class="form-control" id="nmalerta" name="nmalerta" form="formMensagemAlertaSuporte" required=""/>
                </div>            
            </div>             
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Detalhes/Observações do alerta (Visualização lado cliente)</label>
                    <textarea class="form-control" id="txtmsgalerta" name="txtmsgalerta"rows="3" form="formMensagemAlertaSuporte" required=""></textarea>
                    <small id="txtmsgSpam" class="form-text">Máximo de 120 caracteres no texto </small>
                </div>
            </div>                                                                                          
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status</label>                        
                    <select class="form-control mt-2" name="flstatus" form="formMensagemAlertaSuporte" required="">                       
                        <option value="0">ATIVO</option>
                        <option value="1">INATIVO</option>
                    </select>                         
                </div>
            </div>            
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-light btn-sm"  form="formMensagemAlertaSuporte">
                        <b style="color: #0d2b5f">Salvar</b>
                    </button>
                </div>
            </div>              
        </div>
        
    </div>
</div>

<br/>

<!-- --------------------------------------------------------------------------- -->
<!-- MODAL DINAMINCO CHAMADO JS PARA DETALHES DOS DETALHES LISTADOS ------------ -->
<!-- --------------------------------------------------------------------------- -->

<div class="modal fade bd-example-modal-lg" id="detalhesModalMsgAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #000">Mensagem de Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit"> </div>           
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="detalhesModalMsgAlertaExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script src="<?= Rotas::HOME() ?>view/AlertasSuporte/MensagemAlerta.js"></script>


