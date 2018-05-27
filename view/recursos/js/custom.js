    
    $(document).ready(function(){
       //$("#painel-principal").load('view/painel/dados-demanda.php'); 
       //$("#form_cria_db").hide();
    });
        
    function isola(str,begin,end){
       t=str.split(begin);
       t=t[1].split(end);
       return t[0];
    }
    
    

    var oDiretorio  = "http://"+window.location.host + "/";	
    var oPagina     = window.document.URL;
    var oApp        = isola(window.location.pathname,"/", "/");

            function SeletorTipoPergunta(){

                    tipo = $('#select-tipo').val();

                    if ( tipo == "insercao" ) {

                            $('#selecao-PerguntaParaEdicao').hide();
                            $('#formulario-perguntas-far').attr("action","../mvc/ctrl/funcoes/asp/processadores/far/cadastro-de-perguntas.asp");
                            $('#pergunta-obs-far').show();

                    }if( tipo == "alteracao" ){

                            $('#formulario-perguntas-far').attr("action","../mvc/ctrl/funcoes/asp/processadores/far/edita-perguntas.asp");
                            $('#selecao-PerguntaParaEdicao').load('../mvc/ctrl/funcoes/asp/seletores/far/seletor-perguntas.asp');
                            $('#pergunta-obs-far').show();
                            $('#seletor-perguntas-far-checklist').attr('onchange', 'PerguntasParaEdicao();');	
                            $('#selecao-PerguntaParaEdicao').show();

                    }if ( tipo == "exclusao" ) {

                            $('#formulario-perguntas-far').attr("action","../mvc/ctrl/funcoes/asp/processadores/far/exclui-perguntas.asp");
                            $('#selecao-PerguntaParaEdicao').load('../mvc/ctrl/funcoes/asp/seletores/far/seletor-perguntas.asp');
                            $('#pergunta-obs-far').hide();

                    }
            }

		function PerguntasParaEdicao(){
			$("#pergunta").attr('value', '<%= rsSelecaoPerguntasChecklist("pergunta") %>');
			$("#obs").attr('value', '<%= rsSelecaoPerguntasChecklist("descricao") %>');
		}

		function ParecerFAR(){
			$('#painel-principal').load(form_parecer_far);
		}
		
		function CadDecorrencias(){
			$('#painel-principal').load(form_cad_decorrencias_far);	
		}

	//  Fim das funcionalidades da aplicação FAR //

	/*********************************************************************************************************************************
	/																																 /
	/ 							Funcionalidades inerentes à aplicação SIAPF incluindo requisições AJAX								 /
	/																																 /
	/********************************************************************************************************************************/

		function validaSIAPF(obj){
			if ((obj.value.length < 11) && (obj.value.length > 0)) {
				alert('Preenchimento incorreto! Exemplo: "0000.000-00".');
				obj.focus();
				return false;
			}
			if (obj.value.length==11){
				if (obj.value.substring(5,4)!= ".") {
					alert('Preenchimento incorreto! Exemplo: "0000.000-00".');
					obj.focus();
					return false;
				}
				if (obj.value.substring(9,8)!= "-") {
					alert('Preenchimento incorreto! Exemplo: "0000.000-00".');
					obj.focus();
					return false;
				}
			}
		}
		
		function validaSIAPF2(obj){
			if ((obj.value.length < 9 ) || (obj.value.length > 9)){
				alert('Preenchimento tem que ter 9 dígitos! Exemplo: "043008733".');
				obj.focus();
				obj.value = '';
				return false;
			}
		}

	//  Fim das funcionalidades da aplicação FAR //
		
	/*********************************************************************************************************************************
	/																																 /
	/ 							Funcionalidades inerentes à aplicação RH incluindo requisições AJAX									 /
	/																																 /
	/********************************************************************************************************************************/

		function paginaRh(){
			window.location.replace(pagina_rh);			
		}

		function exibePainel(){
			$('#painel-principal').load(painel_rh);
		}

		function cadastroRH(){
			$('#painel-principal').load(form_cadastro_rh);
		}

		function verificaAusencias(){
			$('#painel-principal').load(form_ausencias);	
		}

		function atualizar(){
			empregado 	= $('#empregado').val();
			celula 		= $('#selecao_celulas').val();			
			ramal 		= $('#ramal_comp').val();			
			end_logico	= $('#endereco_logico').val();

			$.ajax({

				url: '/mvc/ctrl/funcoes/asp/processadores/rh/cadastro.asp',
				type: 'HTML',
				method: 'GET',
				data: {
					empregado 	: empregado,
					celula 		: celula,
					end_logico  : end_logico,
					ramal 		: ramal					

				},success: function(){					
					alert("Seu cadastro foi atualizado com sucesso!");''
					$('#painel-principal').load('/mvc/view/rh/formularios/cadastro.asp?empregado='+empregado);
				},error: function(result){	
					$("#painel-principal").append(result);									
					$('#painel-principal').load('paginas/mensagens/erros/alerta-de-erros.php');
					$('#titulo-container-de-alerta').append(titulo_de_erro_cadastro_complementar);
					$('#texto-container-de-alerta').append(texto_de_erro_cadastro_complementar);	
				}				
			});			
		};

		function tabelaAcessos(){			
			usr = $("#selecao-usuario").val();					
			$.ajax({
				url: tbl_acessos_rh,
				method: 'post',
				type: 'html',
				data:{
					empregado: usr
				},success: function(result){
					$('#tabela-acessos').html(result);
				}
			});			
		};

		function controleAcessos(){			
			$.ajax({
				url: form_ctrl_acessos,
				method: "POST",
				datatype: "html",
				complete: function(){					
					$('#select-acessos-2').load(sel_ctrl_sistemas);
					$('#select-acessos-3').load(sel_perfil);					
				},success: function(result){
					$('#painel-principal').html(result);																		
				}
			}).done(function(){				
				$("#selecao-usuario").attr('onchange', 'tabelaAcessos();')
			})
		};

		function excluirAcesso(){
			sistema = $('#selecao_sistema').val();
			usuario = $('#selecao-usuario').val();
			$.ajax({
				url: pss_exclui_acesso,
				data: {sistema: sistema, usuario: usuario},
				method: 'post',
				datatype: 'html',
				success: function(){
					alert('O acesso foi excluído com sucesso!');
					tabelaAcessos();
				}
			})
		}

	//  Fim das funcionalidades da aplicação RH //

	/*********************************************************************************************************************************
	/																																 /
	/ 							Funcionalidades inerentes à aplicação FGHAB incluindo requisições AJAX								 /
	/																																 /
	/********************************************************************************************************************************/

		function IncluirFGHAB()
		{
			$('#painel-principal').load('../mvc/view/fghab/formularios/IncluirContrato.asp');
		}

		function enviar()
		{
			contrato=document.form.txt_num_contrato.value;
			digito=document.form.txtdig.value;
			evento=document.form.slcevento.value;
			dt_contrato=document.form.txt_dt_contrato.value;
			mutuario=document.form.txtmutuario.value;
			renda=document.form.txtrenda.value;
			dt_solicitacao=document.form.txt_dt_solicitacao.value;
			dt_cnfso=document.form.txt_dt_cnfso.value;
			dt_evento=document.form.txt_dt_evento.value;
			endereco=document.form.txtendereco.value;
			uf=document.form.uf.value;
			municipio=document.form.slcmunicipio.value;
			
			
			valida="";

			if (evento == "")
			{
				alert("O campo Evento é de preenchimento obrigatório!");
				valida="nao";
				return false;
			}
			if (contrato == "" || contrato.length < 12)
			{
				alert("O campo Nº do Contrato possui 12 digitos!");
				valida="nao";
				return false;
			}
			
			if (digito == "")
			{
				alert("O campo Dígito do Contrato deve ser preenchido corretamente!");
				valida="nao";
				return false;
			}

			/*	if (dt_contrato == "")
		{
			alert("O campo Data do Contrato é de preenchimento obrigatório");
			valida="nao";
			return false;
		} 

		if (mutuario == "")
		{
			alert("O campo Mutuário é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (renda == "")
		{
			alert("O campo Renda é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (dt_solicitacao == "")
		{
			alert("O campo Data da Solicitação é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (dt_cnfso == "")
		{
			alert("O campo Data de Recebimento na CNFSO é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (dt_evento == "")
		{
			alert("O campo Data do Evento é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (endereco == "")
		{
			alert("O campo Endereço é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (uf == "")
		{
			alert("O campo UF é de preenchimento obrigatório");
			valida="nao";
			return false;
		}

		if (municipio == "")
		{
			alert("O campo Município é de preenchimento obrigatório");
			valida="nao";
			return false;
		} */

		

	
		if (valida != "nao")
		{
			document.form.action="Rec_Contrato1.asp";
			document.form.submit();
		}
		else
		{

		}
		}


		function mostraMutu2(btmut)
		{
			//Se o usuário clicar no botão + ele mostra os campos abaixo na tela
			mut2=document.form.txtmutuario2.value;
			
			if( (btmut=="+") || (mut2 != "") ) {     
			  document.getElementById("mutu2_1").style.display = "block"; 
			  document.getElementById("mutu2_2").style.display = "block"; 
			  document.getElementById("mutu2_3").style.display = "block"; 
			  document.getElementById("mutu2_4").style.display = "block"; 
			}else
				//se o usuario não clicar ele esconde os campos na tela
			{     
	  		  document.getElementById("mutu2_1").style.display = "none"; 
			  document.getElementById("mutu2_2").style.display = "none";  
			  document.getElementById("mutu2_3").style.display = "none";  
			  document.getElementById("mutu2_4").style.display = "none";  
			}
		}

		function mostraMutu3(btmut2)
		{
			//Se o usuário clicar no botão + ele mostra os campos abaixo na tela
			mut3=document.form.txtmutuario3.value;
			if( (btmut2=="+")  || (mut3 != "") ){     
			  document.getElementById("mutu3_1").style.display = "block"; 
			  document.getElementById("mutu3_2").style.display = "block"; 
			  document.getElementById("mutu3_3").style.display = "block"; 
			  document.getElementById("mutu3_4").style.display = "block"; 
			}else
				//se o usuario não clicar ele esconde os campos na tela
			{     
	  		  document.getElementById("mutu3_1").style.display = "none"; 
			  document.getElementById("mutu3_2").style.display = "none";  
			  document.getElementById("mutu3_3").style.display = "none";  
			  document.getElementById("mutu3_4").style.display = "none";  
			}
		}

		function mostraMutu4(btmut3)
		{
			//Se o usuário clicar no botão + ele mostra os campos abaixo na tela
			mut4=document.form.txtmutuario4.value;
			if ( (btmut3=="+")  || (mut4 != "") ){     
				document.getElementById("mutu4_1").style.display = "block"; 
				document.getElementById("mutu4_2").style.display = "block"; 
				document.getElementById("mutu4_3").style.display = "block"; 
				document.getElementById("mutu4_4").style.display = "block"; 
			}else
				//se o usuario não clicar ele esconde os campos na tela
			{     
	  		  document.getElementById("mutu4_1").style.display = "none"; 
			  document.getElementById("mutu4_2").style.display = "none";  
			  document.getElementById("mutu4_3").style.display = "none";  
			  document.getElementById("mutu4_4").style.display = "none";  
			}
		}
	
		
	//  Fim das funcionalidades da aplicação FGHAB //

	/*********************************************************************************************************************************
	/																																 /
	/ 							Funcionalidades inerentes à aplicação Demandas incluindo requisições AJAX							 /
	/																																 /
	/********************************************************************************************************************************/
		//Acessar a página de criação de novas demandas
		/*	
			function criaNovaDemanda(){
				$('#painel-principal').load(form_demandas);
			}
		*/			
	//  Fim das funcionalidades da aplicação Demandas //