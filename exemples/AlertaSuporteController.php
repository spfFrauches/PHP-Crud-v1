<?php

require_once 'model/AlertaSuporteModel.php';

class AlertaSuporteController
{
       
    private $valueParams;

    public function setValueParams($params)
    {
        $this->valueParams = $params;
    }

    public function getValueParams()
    {
        return $this->valueParams;
    }
     
    public function abrirAlerta()
    {
        if(!isset($_SESSION["suporte"])):
            header('Location:' . HOME . 'login/suporte');
        endif; 
        
        $alerta = new AlertaSuporteModel();
        $listarMsgAlerta = json_decode( $alerta->listarMensagemAlertaParaCadastrarMapaAlerta() );
        $listarMsgAlerta = $listarMsgAlerta->dados;
                
        $alerta = new AlertaSuporteModel();
        $listarAlerta = json_decode( $alerta->listarAlerta() );
        $listarAlerta = $listarAlerta->dados;
                  
        require_once (PATH_HOME . '/view/header.php');
        require_once (PATH_HOME . '/view/AlertasSuporte/AbrirAlertaView.php');
        require_once (PATH_HOME . '/view/footer-Suporte.php');                
    }
    
    public function cadastrarAlertaSuporte()
    { 

        $alerta = new AlertaSuporteModel();
        $retorno = $alerta->insertAlerta($_POST);              
        echo $retorno;            
    }
    
    public function MensagemAlerta()
    {       
        if(!isset($_SESSION["suporte"])):
           header('Location: ' . HOME . 'login/suporte');
        endif; 
        
        $alerta = new AlertaSuporteModel();
        $listarMsgAlerta = json_decode( $alerta->listarMensagemAlerta() );
        $listarMsgAlerta = $listarMsgAlerta->dados;
        
        require_once (PATH_HOME . '/view/header.php');
        require_once (PATH_HOME . '/view/AlertasSuporte/MensagemAlertaView.php');
        require_once (PATH_HOME . '/view/footer-Suporte.php');           
    }
    
    public function cadastrarMensagemAlerta()
    {     
        $msgAlerta = new AlertaSuporteModel();
        $retorno = $msgAlerta->insertMsgAlerta($_POST);
        echo $retorno;
    }
    
    public function updateAlertaSuporte()
    {       
        $alerta = new AlertaSuporteModel();
        $retorno = $alerta->updateAlerta($_POST);
        echo $retorno;            
    }
    
    public function updateMsgAlertaSuporte()
    {       
        $alerta = new AlertaSuporteModel();
        $retorno = $alerta->updateMsgAlerta($_POST);
        echo $retorno;            
    }
       
    public function deleteAlertaSuporte()
    {        
        $alerta = new AlertaSuporteModel();
        $retorno = $alerta->deleteAlerta($_POST);
        echo $retorno;           
    }
    public function deleteMsgAlertaSuporte()
    {        
        $alerta = new AlertaSuporteModel();
        $retorno = $alerta->deleteMsgAlerta($_POST);
        echo $retorno;           
    }
    
}

