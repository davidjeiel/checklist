<?php 
    function __autoload($nome_da_classe)
    {	
        if($nome_da_classe == "selecoes-por-usuario"){
            $cl_dir = explode( __DIR__, "\\" );
            $clss_diretorio = str_replace(__DIR__, "\\", "/");
            $clss_diretorio .= $clss_diretorio."/";
            include_once(__DIR__."demandas/".$nome_da_classe.'.class.php');	            
        }else{
            include_once($nome_da_classe.'.class.php');	            
        }
    } 
?>