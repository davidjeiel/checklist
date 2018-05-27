<?php

/* 
 * Função possibilita segregar acessos de acordo com o cadastro do usuário
 * Cadas perfil de acesso permite ações conforme suas atribuições
 */

include 'usuario.php';

$coordenacao_usuario = $usuario['IdCoordenacao'];
$celula_usuario      = $usuario['NumCelula'];

if( $usuario['CodFuncao'] == "2061" || $usuario['CodFuncao'] == "2060" || $usuario['CodFuncao'] == "2141" ){  
  
            $sql_dados_usuario =  "SELECT";
            $sql_dados_usuario .= "      cUsuario";
            $sql_dados_usuario .= "     ,vNome_Empregado";
            $sql_dados_usuario .= "     ,cpf";
            $sql_dados_usuario .= "     ,conta";
            $sql_dados_usuario .= "     ,celula";
            $sql_dados_usuario .= "     ,nome_celula";
            $sql_dados_usuario .= "     ,Supervisor";
            $sql_dados_usuario .= "     ,id_coordenacao";
            $sql_dados_usuario .= "     ,nome_coordenacao";
            $sql_dados_usuario .= "     ,Coordenador";
            $sql_dados_usuario .= "     ,CodPerfil";
            $sql_dados_usuario .= "     ,descPerfil";
            $sql_dados_usuario .= "     ,CodFuncao";
            $sql_dados_usuario .= "     ,Funcao";
            $sql_dados_usuario .= "     ,iCodigo_Tipo_Cargo";
            $sql_dados_usuario .= "     ,CodFuncaoEventual";
            $sql_dados_usuario .= "     ,FuncaoEventual";
            $sql_dados_usuario .= "     ,dData_Nascimento";
            $sql_dados_usuario .= "     ,vEmail_Empregado";
            $sql_dados_usuario .= " FROM VW.empregados";
            $sql_dados_usuario .= " WHERE id_coordenacao = $coordenacao_usuario;";

  } else {
             $sql_dados_usuario =  "SELECT" ;
            $sql_dados_usuario .= "      cUsuario";
            $sql_dados_usuario .= "     ,vNome_Empregado";
            $sql_dados_usuario .= "     ,cpf";
            $sql_dados_usuario .= "     ,conta";
            $sql_dados_usuario .= "     ,celula";
            $sql_dados_usuario .= "     ,nome_celula";
            $sql_dados_usuario .= "     ,Supervisor";
            $sql_dados_usuario .= "     ,id_coordenacao";
            $sql_dados_usuario .= "     ,nome_coordenacao";
            $sql_dados_usuario .= "     ,Coordenador";
            $sql_dados_usuario .= "     ,CodPerfil";
            $sql_dados_usuario .= "     ,descPerfil";
            $sql_dados_usuario .= "     ,CodFuncao";
            $sql_dados_usuario .= "     ,Funcao";
            $sql_dados_usuario .= "     ,iCodigo_Tipo_Cargo";
            $sql_dados_usuario .= "     ,CodFuncaoEventual";
            $sql_dados_usuario .= "     ,FuncaoEventual";
            $sql_dados_usuario .= "     ,dData_Nascimento";
            $sql_dados_usuario .= "     ,vEmail_Empregado";
            $sql_dados_usuario .= " FROM VW.empregados";
            $sql_dados_usuario .= " WHERE celula = $celula_usuario;";
  }
  
      try { # Permite a visualização dos dados de todos os empregados da célula     

            $selecao_coordenacao = $conn->prepare($sql_dados_usuario);
            $selecao_coordenacao->execute();
            
    } catch(PDOException $e) 
    {
      die($e->getMessage());  
    }
    
    foreach ($selecao as $value) {
        echo $value['vNome_Empregado'];
    }
    
    
    
                        
    
