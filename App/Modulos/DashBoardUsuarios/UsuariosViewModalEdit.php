<form action="<?= URL ?>adminDashBoard/usuarios/update/<?= $_POST['cduser'] ?>" method="POST" >    
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
    <div class="row mt-2">
        <div class="col-lg-6 mb-3">
            <label>Nivel de permissão</label>
            <select class="form-select NivelPermUser" name="NivelPermUser" form="formUsuarios" >
                <option value="">Selecione</option>
                <option value="0" <?= $dadosUsuario[0]->NivelPermUser == "0" ? "selected" :"" ?>>Administrador</option>
                <option value="1" <?= $dadosUsuario[0]->NivelPermUser == "1" ? "selected" :"" ?>>Visitante</option>
            </select>
            <div id="PermisaoHelp" class="form-text">Nível de permissões de acesso ao sistema</div>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Status</label>
            <select class="form-select StatusUser" name="StatusUser" form="formUsuarios" >
                <option value="" >Selecione</option>
                <option value="0" <?= $dadosUsuario[0]->StatusUser == "0" ? "selected" :"" ?>>Ativo</option>
                <option value="1" <?= $dadosUsuario[0]->StatusUser == "1" ? "selected" :"" ?>>Inativo</option>
            </select>
            <div id="StatusHelp" class="form-text">Status inicial de acesso ao sistema</div>
        </div>   
    </div>
    
     <div class="row mt-2">
        <div class="col-lg-6 mb-3">
            <label>Senha</label>
            <input type="password" class="form-control PasswordUser" name="PasswordUser" form="formUsuarios" value="<?= $dadosUsuario[0]->PasswdUser ?>" >
            <div id="PasswdHelp" class="form-text">Senha de acesso ao sistema</div>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Confirmar Senha</label>
            <input type="password" class="form-control PasswordUserConfirm" name="PasswordUserConfirm" form="formUsuarios"  value="<?= $dadosUsuario[0]->PasswdUser ?>">
            <div id="PasswdConfirmaHelp" class="form-text">Confirmação da senha de acesso</div>
        </div>   
    </div>
    <div class="row mt-2">
        <div class="col-lg-12 mb-3">
            <label>Observações complementares</label>
            <textarea class="form-control" name="ObsComplementarUser" rows="3" form="formUsuarios"><?= $dadosUsuario[0]->ObsComplementarUser ?></textarea>
        </div>   
    </div>   
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
</form>

