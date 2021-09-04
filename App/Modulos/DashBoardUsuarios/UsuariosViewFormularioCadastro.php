<form action="#" method="POST" id="formUsuarios"></form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro Usuário - DashBoard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <!--
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            -->
        </div>
        <button type="submit" class="btn btn-sm btn-outline-secondary" form="formUsuarios">
            Salvar
        </button>
    </div>
</div>

<div class="row">   
    <div class="col-lg-4 mb-3">
        <label>Cód</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp" readonly>
        <div id="emailHelp" class="form-text">Cód do usuário</div>
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
        <div id="emailHelp" class="form-text"  >E-mail válido para o usuário, servirá como login</div>
    </div>   
</div>

<div class="row mt-2">
    <div class="col-lg-6 mb-3">
        <label>Nivel de permissão</label>
        <select class="form-select" name="NivelPermUser" form="formUsuarios" >
            <option value="">Selecione</option>
            <option value="0">Administrador</option>
            <option value="1">Visitante</option>
        </select>
        <div id="emailHelp" class="form-text">Nível de permissões de acesso ao sistema</div>
    </div>
    <div class="col-lg-6 mb-3">
        <label>Status</label>
        <select class="form-select" name="StatusUser" form="formUsuarios" >
            <option value="">Selecione</option>
            <option value="0">Ativo</option>
            <option value="1">Inativo</option>
        </select>
        <div id="emailHelp" class="form-text">E-mail valido para o usuário, servirá como login</div>
    </div>   
</div>

<div class="row mt-2">
    <div class="col-lg-6 mb-3">
        <label>Senha</label>
        <input type="password" class="form-control" name="passwordUser" form="formUsuarios" >
    </div>
    <div class="col-lg-6 mb-3">
        <label>Confirmar Senha</label>
        <input type="password" class="form-control" name="passwordUserConfirm" form="formUsuarios" >
    </div>   
</div>

<div class="row mt-2">
    <div class="col-lg-12 mb-3">
        <label>Observações complementares</label>
        <textarea class="form-control" name="ObsComplementarUser" rows="3" form="formUsuarios"></textarea>
    </div>   
</div>

<script src="<?= URL ?>App/Modulos/DashBoardUsuarios/UsuariosFormulario.js"></script>

