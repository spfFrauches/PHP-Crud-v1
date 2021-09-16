<form method="POST" action="#" id="formUsuarios"></form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listar Usuários - DashBoard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-5">      
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Detalhes técnicos <i class="bi bi-info-circle"></i> </button>
        </div>
        <a href="<?= URL ?>adminDashBoard/usuarios" class="btn btn-sm btn-outline-secondary btnSalvarFormularioUsuarios" form="formUsuarios">         
            Novo usuário
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
</div>

<div class="row">   
    <div class="col-lg-12 mb-3 mt-5">
              
        <table class="table table-striped table-hover">           
            <thead>
                <tr>
                    <th scope="col">Cód</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($usuarios as $key => $value): ?>
                <tr>
                    <th scope="row"><?= $value->CodUser ?></th>
                    <td><?= $value->NomeUser ?></td>
                    <td><?= $value->EmailUser ?></td>
                    <td>
                        <a href="#" class="me-3 modalEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="bi bi-pencil-square"></i></a>

                        <a href="#" class="modalExcluir" data-bs-toggle="modal" data-bs-target="#modalExcluir"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?> 
            </tbody>   
        </table>
       
    </div>     
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body editar">
              ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body excluir">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
 

<script src="<?= URL ?>App/Modulos/DashBoardUsuarios/Usuarioslistar.js"></script>

