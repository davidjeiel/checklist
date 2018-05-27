<?php   
    __autoload("conexao");
/* 
 * Classe que seleciona dados do usuário que acessa ao sistema. * 
 * @author: David Jeiel <david.rocha@caixa.gov.br>
 * @copyright: Dezembro de 2016
 * @version: 0.1
 */
class usuarios extends conexao
{   
    public $matricula;
    public $Nome;
    public $Funcao;
    public $Celula;
    public $Coordenacao;
    public $CPF;
    public $Conta;
    public $NumCelula;
    public $Supervisor;
    public $IdCoordenacao;
    public $Coordenador;
    public $EMail;
    public $CodFuncao;
    public $CodFuncaoEventual;
    public $FuncaoEventual;
    public $DataNascimento;
    public $TipoCargo;
    public $CodPerfil;
    public $Perfil;
    
    function __construct() {        
        $this->matricula = parent::cMatriculaUsuario();

        try
        {           
            $sql_usuarios = "SELECT *
                             FROM VW.empregados 
                             WHERE cUsuario = '".$this->matricula."' ";          

            $result = parent::runSelect($sql_usuarios);           

            foreach ( $result as $value ) {                
                  $this->Nome              = $value['vNome_Empregado'];
                  $this->Funcao            = $value['Funcao']; 
                  $this->Celula            = $value['nome_celula']; 
                  $this->Coordenacao       = $value['nome_coordenacao'];           
                  $this->CPF               = $value['cpf'];
                  $this->Conta             = $value['conta']; 
                  $this->NumCelula         = $value['celula'];     
                  $this->Supervisor        = $value['Supervisor'];     
                  $this->IdCoordenacao     = $value['id_coordenacao'];         
                  $this->Coordenador       = $value['Coordenador'];       
                  $this->EMail             = $value['vEmail_Empregado']; 
                  $this->CodFuncao         = $value['CodFuncao'];     
                  $this->CodFuncaoEventual = $value['CodFuncaoEventual'];             
                  $this->FuncaoEventual    = $value['FuncaoEventual'];         
                  $this->DataNascimento    = $value['dData_Nascimento'];         
                  $this->TipoCargo         = $value['iCodigo_Tipo_Cargo'];     
                  $this->CodPerfil         = $value['CodPerfil'];     
                  $this->Perfil            = $value['descPerfil']; 
            }    
        }catch(PDOException $e) { 
          die($e->getMessage());  
        };
    }
    
    function __destruct() {
        return "A CLASSE ".__CLASS__." FOI DESTRUÍDA";
    }
}

  $user = new usuarios;

  $c_nomeUsuario    = $user->Nome;
  $c_matricula      = $user->matricula;  
  $c_Funcao         = $user->Funcao;
  $c_Celula         = $user->Celula;
  $c_Coordenacao    = $user->Coordenacao;
  $c_CPF            = $user->CPF;
  $c_Conta          = $user->Conta;
  $c_NumCelula      = $user->NumCelula;
  $c_Supervisor     = $user->Supervisor;
  $c_IdCoordenacao  = $user->IdCoordenacao;
  $c_Coordenador    = $user->Coordenador;
  $c_EMail          = $user->EMail;
  $c_CodFuncao      = $user->CodFuncao;
  $c_CodFncEventual = $user->CodFuncaoEventual;
  $c_FuncaoEventual = $user->FuncaoEventual;
  $c_DataNascimento = $user->DataNascimento;
  $c_TipoCargo      = $user->TipoCargo;
  $c_CodPerfil      = $user->CodPerfil;
  $c_Perfil         = $user->Perfil;  