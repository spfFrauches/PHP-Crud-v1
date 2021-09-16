<div class="row mt-5 msgSucess text-center text-success">   
    <div class="col-lg-12 mb-3">
        <h1 class="display-1"><i class="bi bi-check-circle"></i></h1>
    </div> 
    <div class="col-lg-12 mb-3">
        <h4>Cadastro efetuado com sucesso!</h4>
    </div> 
    <div class="col-lg-12 mb-3">      
        <a href="<?=URL?>adminDashBoard/usuarios" class="btn btn-outline-success">Voltar</a>
    </div> 
</div>

<div class="row mt-5 msgError text-center text-danger">   
    <div class="col-lg-12 mb-3">
        <h1 class="display-1"><i class="bi bi-x-circle"></i></h1>
    </div> 
    <div class="col-lg-12 mb-3">
        <h4>Desculpe mas não foi possivel efetuar o cadastro</h4>
    </div> 
    <div class="col-lg-12 mb-3">
        <a  class="btn btn-outline-danger detalheErro" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detalhes</a>
        <button type="button" class="btn btn-outline-danger btnVoltarErroCadastroUsuarios">Voltar</button>
        <div class="collapse mt-5" id="collapseExample">
          <div class="card card-body detalheErroTexto">
              Detalhes técnicos do erro...
          </div>
        </div>
    </div> 
</div>
