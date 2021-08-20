<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro Usuário - DashBoard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <!--
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            -->
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary">
            <span data-feather="calendar"></span>
            Salvar
        </button>
    </div>
</div>

<form action="" method="POST"></form>

<div class="row">
    
    <div class="col-lg-4 mb-3">
        <label>Cód</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="">
        <div id="emailHelp" class="form-text">Cód do usuário</div>
    </div>
      
</div>

<div class="row mt-2">

    <div class="col-lg-6 mb-3">
        <label>Nome Completo</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
        <div id="emailHelp" class="form-text">Nome completo do usuário</div>
    </div>
    <div class="col-lg-6 mb-3">
        <label>E-mail</label>
        <input type="email" class="form-control" id="exampleInputPassword1">
        <div id="emailHelp" class="form-text">E-mail valido para o usuário, servirá como login</div>
    </div>
    
</div>

<div class="row mt-2">

    <div class="col-lg-6 mb-3">
        <label>Nivel de permissão</label>
        <select class="form-select" aria-label="Default select example">
            <option>Selecione</option>
            <option value="admin">Administrador</option>
            <option value="visitante">Visitante</option>
        </select>
        <div id="emailHelp" class="form-text">Nível de permissões de acesso ao sistema</div>
    </div>
    <div class="col-lg-6 mb-3">
        <label>Status</label>
        <select class="form-select" aria-label="Default select example">
            <option>Selecione</option>
            <option value="ativo">Ativo</option>
            <option value="inatico">Inativo</option>
        </select>
        <div id="emailHelp" class="form-text">E-mail valido para o usuário, servirá como login</div>
    </div>
    
</div>


<div class="row mt-2">

    <div class="col-lg-12 mb-3">
        <label>Observações complementares</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    
</div>

<script src="<?= URL ?>/App/Views/cadastroUsuario/usuarioFormulario.js"></script>




