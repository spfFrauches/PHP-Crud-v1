<form method="POST" action="#" id="formUsuarios"></form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro Usuário - DashBoard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Como funciona</button>
            <!--
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            -->
            
        </div>
        <button type="submit" class="btn btn-sm btn-outline-secondary btnSalvarFormularioUsuarios" form="formUsuarios">
            Salvar
        </button>
    </div>
</div>



 
<?php 
    
    require "./App/Modulos/DashBoardUsuarios/UsuariosViewLoads.php";
    require "./App/Modulos/DashBoardUsuarios/UsuariosViewMsg.php";
    
?>


<div class="formularioCadastro">    
    <div class="row">   
        <div class="col-lg-4 mb-3">
            <label>Cód</label>
            <input type="text" class="form-control" readonly >
            <div id="CodHelp" class="form-text">Cód do usuário</div>
        </div>     
    </div>
    <div class="row mt-2">
        <div class="col-lg-6 mb-3">
            <label>Nome Completo</label>
            <input type="text" class="form-control NomeUser" name="NomeUser" form="formUsuarios">
            <div id="NomeUserHelp" class="form-text" >Nome completo do usuário</div>
        </div>
        <div class="col-lg-6 mb-3">
            <label>E-mail</label>
            <input type="email" class="form-control EmailUser" name="EmailUser" form="formUsuarios">
            <div id="EmailHelp" class="form-text"  >E-mail válido para o usuário, servirá como login</div>
        </div>   
    </div>
    <div class="row mt-2">
        <div class="col-lg-6 mb-3">
            <label>Nivel de permissão</label>
            <select class="form-select NivelPermUser" name="NivelPermUser" form="formUsuarios" >
                <option value="">Selecione</option>
                <option value="0">Administrador</option>
                <option value="1">Visitante</option>
            </select>
            <div id="PermisaoHelp" class="form-text">Nível de permissões de acesso ao sistema</div>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Status</label>
            <select class="form-select StatusUser" name="StatusUser" form="formUsuarios" >
                <option value="">Selecione</option>
                <option value="0">Ativo</option>
                <option value="1">Inativo</option>
            </select>
            <div id="StatusHelp" class="form-text">Status inicial de acesso ao sistema</div>
        </div>   
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 mb-3">
            <label>Senha</label>
            <input type="password" class="form-control PasswordUser" name="PasswordUser" form="formUsuarios" >
            <div id="PasswdHelp" class="form-text">Senha de acesso ao sistema</div>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Confirmar Senha</label>
            <input type="password" class="form-control PasswordUserConfirm" name="PasswordUserConfirm" form="formUsuarios" >
            <div id="PasswdConfirmaHelp" class="form-text">Confirmação da senha de acesso</div>
        </div>   
    </div>
    <div class="row mt-2">
        <div class="col-lg-12 mb-3">
            <label>Observações complementares</label>
            <textarea class="form-control" name="ObsComplementarUser" rows="3" form="formUsuarios"></textarea>
        </div>   
    </div>    
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Como funciona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 18px">Uma sinapse do código por detras desta tela/página</p>
                <ul>
                    <li>
                        Estamos usando muito jQuery nesta página
                    </li>
                    <li>
                        Ao passar pelos campos cada um deles é validado
                    </li>
                    <li>
                        Na passagem é validado apenas nível front-end
                    </li>
                    <li>
                        Ao clicar em salvar nova validação front-end é acionada
                    </li>
                    <li>
                        Tudo validado, é enviado o formulário via AJAX no jQuery
                    </li>
                    <li>
                        Em seguida validação de back-end acionado o arquivo .php
                    </li>
                    <li>
                        O formulário é processado e salvo em banco de dados.
                    </li>
                    
                </ul>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
    </div>
</div>

<script src="<?= URL ?>App/Modulos/DashBoardUsuarios/UsuariosFormulario.js"></script>

