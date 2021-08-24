<?php

class AlertaSuporteModel
{
    
    public function insertAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/insertAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
       
    public function insertMsgAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/insertMsgAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
       
    public function updateAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/updateAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
    
    public function updateMsgAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/updateMsgAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
    
    public function deleteAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/deleteAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
    
    public function deleteMsgAlerta($post)
    {        
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);        
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/deleteMsgAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;                             
    }
    
    public function listarAlerta()
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/listarAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function listarMensagemAlerta()
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/listarMensagemAlertaSuporte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function listarMensagemAlertaParaCadastrarMapaAlerta()
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA.'alertaSuporte/listarMensagemAlertaSuporteParaCadastrarAlerta',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function listarAlertaPorCdAlerta($cdalerta)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."alertaSuporte/listarAlertaSuportePorCdAlerta/$cdalerta",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function listarMsgAlertaPorCdAlerta($cdmsgalerta)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."alertaSuporte/listarMsgAlertaSuportePorCdAlerta/$cdmsgalerta",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function buscarEtiquetaCDR($cdcdr, $cdcidade)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."mapaFTTH/consultasCdrEtiqueta/$cdcdr/$cdcidade",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function validarCDR($noolt, $cdcidade, $cdcdr)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."alertaSuporte/validarCDR/$noolt/$cdcidade/$cdcdr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function verificarMsgAlertaNoCadastroAlertas($cdmsgalerta)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."alertaSuporte/verificarMsgAlertaNoCadastroAlertas/$cdmsgalerta",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
    public function buscarMapaLogin($cdusuariosfi)
    {       
        $tokenMmApi = getTokenMinhaMMApi(MINHA_MMA_AUTH_API["email"], MINHA_MMA_AUTH_API["senha"]);   
        if (!$tokenMmApi):
            return false;
        endif;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_API_MINHA_MMA."mapaFTTH/consultarMapaCompletoPorCliente/$cdusuariosfi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $tokenMmApi],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;              
    }
    
}

