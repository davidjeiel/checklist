<?php

/* 
 * @description:    Classe destinada a mapear as aplicações PHP e instanciar em variáveis
 * @author:         David Jeiel <david.rocha@caixa.gov.br> - c117813
 * @copyright:      Janeiro de 2017
 * @version:        1.0
 */

class config{
    
    public $endereco;
    public $diretorio;
    public $mvc;
        public $ctrl;    
            public $classes;
                public $class_demandas;
            public $funcoes;
                public $recordset;                public $processadores;
                public $regras;
        public $mdl;
            public $css;
            public $fonts;
            public $icon;
            public $img;
            public $js;
        public $view;
            public $src;
            public $arquivos;
            public $vw_demandas;
            public $docs;
            public $mensagens;
    public $instancia;
    public $base_de_dados;
    public $tabela;
    public $login;
    public $pass;
    
    public function __construct() {            
            
        $this->endereco = $_SERVER['SERVER_NAME']."/";
        $this->diretorio = $_SERVER['REQUEST_URI'];
        $this->mvc = $this->endereco. "mvc/";
        $this->ctrl = $this->mvc. "ctrl/";
        $this->classes = $this->ctrl. "classes/";
        $this->class_demandas = $this->classes. "demandas/";
        $this->funcoes = $this->ctrl. "funcoes/php/";
        $this->recordset = $this->funcoes. "recordset/";
        $this->processadores = $this->funcoes. "processadores/";
        $this->regras = $this->funcoes. "regras/";
        $this->mdl = $this->mvc. "mdl/";
        $this->css = $this->mdl. "css/";
        $this->fonts = $this->mdl. "fonts/";
        $this->icon = $this->mdl. "icon/";
        $this->img = $this->mdl. "img/";
        $this->js = $this->mdl. "js/";
        $this->view = $this->mvc. "view/";
        $this->src = $this->view. "src/";
        $this->arquivos = $this->view. "arquivos/";
        $this->vw_demandas = $this->view. "demandas/";
        $this->docs = $this->view. "docs/";
        $this->mensagens = $this->view. "mensagens/";
        $this->endereco_app = "";
        $this->base_de_dados = "";
        $this->tabela = "";
        $this->login = "";
        $this->pass = "";
    }
    
    public function app(){
        $_aux_pag = $_SERVER['REQUEST_URI'];
        $_aux_dir = explode($_aux_pag, "/");
        $_num = count($_aux_dir);
        return $_aux_dir[0];
        //$dir_app = explode(dir(count($dir)), ".");
        //return $dir(0);
    }
    
    public function __destruct() {
        return "A CLASSE ".__CLASS__." FOI DESTRUÍDA";
    }
}

    $conf = new config;
    $end = $conf->app();
    echo $end;