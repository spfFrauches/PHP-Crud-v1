<form action="<?= URL ?>adminDashBoard/usuarios/delete/<?= $_POST['cduser'] ?>" method="POST" >    
    <div class="row">  
        <?php 
        
        /*
            echo "<pre>";
            var_dump($dadosUsuario[0]);
            echo "</pre>";
         * 
         */
        
        ?>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cód.</label>
                <input type="email" class="form-control" value="<?= $dadosUsuario[0]->CodUser ?>" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail Access</label>
                <input type="email" class="form-control" value="<?= $dadosUsuario[0]->EmailUser ?>" readonly>
            </div>
        </div>        
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abortar</button>
        <button type="submit" class="btn btn-danger">Excluir usuário</button>
    </div>
</form>

