<?php

require_once 'funcoes/conexao.php';

    $matriculac = $_SERVER['REMOTE_USER'];
    $matriculac = substr($matriculac, -7, 7);    
    
try
{   
  $sql_usuarios  = "SELECT" ;
  $sql_usuarios .= "     cUsuario";
  $sql_usuarios .= "    ,vNome_Empregado";
  $sql_usuarios .= "    ,cpf";
  $sql_usuarios .= "    ,conta";
  $sql_usuarios .= "    ,celula";
  $sql_usuarios .= "    ,nome_celula";
  $sql_usuarios .= "    ,Supervisor";
  $sql_usuarios .= "    ,id_coordenacao";
  $sql_usuarios .= "    ,nome_coordenacao";
  $sql_usuarios .= "    ,Coordenador";
  $sql_usuarios .= "    ,CodPerfil";
  $sql_usuarios .= "    ,descPerfil";
  $sql_usuarios .= "    ,CodFuncao";
  $sql_usuarios .= "    ,Funcao";
  $sql_usuarios .= "    ,iCodigo_Tipo_Cargo";
  $sql_usuarios .= "    ,CodFuncaoEventual";
  $sql_usuarios .= "    ,FuncaoEventual";
  $sql_usuarios .= "    ,dData_Nascimento";
  $sql_usuarios .= "    ,vEmail_Empregado";
  $sql_usuarios .= " FROM VW.empregados";
  $sql_usuarios .= " where cUsuario = '$matriculac' ";          
  
  $result = $conn->prepare($sql_usuarios); 
  $result->execute();
}
catch(PDOException $e) 
{
  die($e->getMessage());  
}

foreach ($result as $value) {
  $cUsuario           = $value['cUsuario'];    
  $cNome              = $value['vNome_Empregado'];    
  $cCPF               = $value['cpf'];
  $cConta             = $value['conta'];
  $cNumCelula         = $value['celula'];
  $cCelula            = $value['nome_celula'];
  $cSupervisor        = $value['Supervisor'];
  $cIdCoordenacao     = $value['id_coordenacao'];
  $cNomeCoordenacao   = $value['nome_coordenacao'];
  $cCoordenador       = $value['Coordenador'];
  $cEMail             = $value['vEmail_Empregado'];
  $cCodFuncao         = $value['CodFuncao'];
  $cFuncao            = $value['Funcao'];
  $cCodFuncaoEventual = $value['CodFuncaoEventual'];
  $cFuncao_Eventual   = $value['FuncaoEventual'];
  $cData_Nascimento   = $value['dData_Nascimento'];
  $cTipo_Cargo        = $value['iCodigo_Tipo_Cargo'];
  $cPerfil            = $value['CodPerfil'];
  $cNomPerfil         = $value['descPerfil'];
}

  $usuario = array(
                  "Matricula"          => $cUsuario, 
                  "Nome"               => $cNome,
                  "CPF"                => $cCPF, 
                  "Conta"              => $cConta,
                  "NumCelula"          => $cNumCelula,
                  "Celula"             => $cCelula, 
                  "Supervisor"         => $cSupervisor,
                  "IdCoordenacao"      => $cIdCoordenacao,
                  "NomeCoordenacao"    => $cNomeCoordenacao, 
                  "Coordenador"        => $cCoordenador, 
                  "EMail"              => $cEMail, 
                  "CodFuncao"          => $cCodFuncao,
                  "Funcao"             => $cFuncao, 
                  "CodFuncaoEventual"  => $cCodFuncaoEventual,
                  "FuncaoEventual"     => $cFuncao_Eventual, 
                  "DataNascimento"     => $cData_Nascimento,
                  "TipoCargo"          => $cTipo_Cargo,
                  "CodPerfil"          => $cPerfil,
                  "Perfil"             => $cNomPerfil
                  );    