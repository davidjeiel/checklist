<div class="">	
	<div class="page-header">
		<h3 align="center">FAR - Monitoramento DFI / Reparos / Benfeitorias</h3>
	</div>
	<form method="post" action="../../mvc/ctrl/funcoes/asp/processadores/far/cria-demandas.asp">
		<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">			
			<div class="col-md-2"></div>
			<div class="col-md-3">	
				Selecione o Tipo de financiamento:			
				<select class="form-control" name="tp_financ" id="tp_financ" required>	
					<option value="">Tipo de financiamento</option>
					<option value="6">MCMV - Minha Casa Minha Vida</option>
					<option value="7">PAR - Programa de Arrendamento Residencial</option>
				</select>
			</div>				
			
			<div class="col-md-2">
				Solicitação do dossiê:
				<input type="date" class="form-control" name="dt_sol_dossie" required>
			</div>
			<div class="col-md-2">
				Reiteração:
				<input type="date" class="form-control" name="dt_reiteracao" required>
			</div>
			<div class="col-md-2">
				Recepção do dossiê:
				<input type="date" class="form-control" name="dt_recepcao" required>
			</div>
			
			<div class="col-md-1"></div>
		</fieldset>
		<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
			<div class="col-md-2">
				Gerência:
				<select class="form-control" name="gerencia" id="gerencia" required>
					<option></option>
					<option value="GIHAB">GIHAB</option>
					<option value="GILIE">GILIE</option>
					<option value="RELIE">RELIE</option>
				</select>
			</div>
			<div class="col-md-2" id="sel_filial"></div>			
			<div class="col-md-2">	
				Número / PA:			
				<input type="text" class="form-control" placeholder="Número do PA" maxlength="4" name="nu" required>
			</div>
			<div class="col-md-2">
				Total autorizado / PA:
				<input type="text" class="form-control" placeholder="Valor de liberação" name="vlr_lib" onkeypress="return FormataReais(this,'.',',',event);" required>
			</div>
			<div class="col-md-2">
				Data / PA:
				<input type="date" class="form-control" name="dt_parecer" required>
			</div>
		</fieldset>
		<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
			<div class="col-md-1">
				Nº APF:
				<input type="text" class="form-control" placeholder="APF" name="APF" maxlength="6" required>
			</div>
			<div class="col-md-3">
				Nome do empreendimento:
				<input type="text" class="form-control" placeholder="Nome do empreendimento" name="nome_empr" required>
			</div>
			<div class="col-md-1">
				<!--#include file="../../../ctrl/funcoes/asp/seletores/seletor-uf-ibge.asp"-->
			</div>
			<div class="col-md-3" id="sel-municipio"></div>
			<div class="col-md-4" id="tp_despesa"></div>
		</fieldset>
		<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					Data de migração:
					<input type="date" class="form-control" name="dt_migracao" required>
				</div>
				<div class="col-md-4">
					Data do habite-se:
					<input type="date" class="form-control" name="dt_habite_se" required>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="col-md-3"></div>
		</fieldset>		
		<div class="panel panel-default" id="form-checklist">
			<div class="panel-heading">
				<h3 align="center">
					<a type="button" class="btn btn-success btn-xl" data-toggle="collapse" href="#tabela_checklist">Checklist</a>	
				</h3>
			</div>
			<div class="panel-collapse collapse" id="tabela_checklist">
				<!--#include file="checklist.asp"-->
			</div>
		</div>		
		<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
			<div class="col-md-2">
				Decisão Judicial:
				<select class="form-control" name="dc_judic" required>
					<option></option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>					
				</select>
			</div>
			<div class="col-md-2">
				Classificação do parecer
				<select class="form-control" name="classificacao" required>
					<option></option>
					<option value="1">Normal</option>
					<option value="2">Urgente</option>
					<option value="3">Emergencial</option>
				</select>
			</div>
			<div class="col-md-4">
				Nome da construtora
				<input type="text" class="form-control" name="nome_cstr" required>
			</div>
			<div class="col-md-2">
				Tipo de área
				<select class="form-control" id="tp_area" name="tp_area" required>
					<option></option>
					<option value="1">Individual</option>
					<option value="2">Comum</option>					
				</select>
			</div>
			<div class="col-md-2" id=""></div>
		</fieldset>
		<div id="individual">	
			<fieldset id="area-individual" class="container" style="padding-top: 15px; padding-bottom: 25px;">
				<div class="col-md-12" style="padding-bottom: 25px;">
					<div class="col-md-2">	
						<label>Número da Unidade</label>
						<input type="text" name="un_habitacional" id="un_habitacional" placeholder="Apenas números"	class="form-control">				
					</div>
					<div class="col-md-2">
						<label>Número do contrato</label>
						<input type="text" class="form-control" placeholder="Apenas números" id="num_contrato" name="num_contrato">
					</div>
					<div class="col-md-2">
						<!--#include file="../../../ctrl/funcoes/asp/seletores/far/seletor-tp-imovel.asp"-->
					</div>
					<div class="col-md-2" id="finalidade_pagamento">
						<label>Decorrente de:</label>	
					</div>	
					<div class="col-md-2" style="padding-top: 22px;">				
						<!--<div class="btn-group">-->
							<button type="button" class="btn btn-success" id="btn-hab" onclick="addImovel();" style="padding-top: 10px">
								<label>Adicionar Imóvel </label> 
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						<!--
							<button type="button" class="btn btn-danger" id="btn-exc-hab" onclick="excluiImovel();" style="padding-top: 10px">
									<label>Excluir Imóvel </label> 
									<span class="glyphicon glyphicon-minus"></span>
								</button>
							</div>
						-->
					</div>				
				</div>				
			</fieldset>
		</div>
		<div id="comum">	
			<fieldset id="area-comum" class="container"  style="padding-top: 15px; padding-bottom: 25px;">
				<div class="col-md-12" style="padding-bottom: 25px;">
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<label>Descrição de área comum:</label>
						<input type="text" class="form-control" placeholder="Descrição: playground, garagem,etc..." name="desc_comum" id="desc_comum">
					</div>
					<div class="col-md-3" style="padding-top: 25px">
						<button type="button" class="btn btn-primary" id="add-area-comum" onclick="addAreaComum();" >
							<label>Adicionar área comum </label>						
							<span class="glyphicon glyphicon-plus"></span>
						</button>
					</div>
					<div class="col-md-3"></div>
				</div>
			</fieldset>
		</div>
		
		<div class="col-lg-12 well">
			<div class="page-header">
				<h3 align="center">Parecer - CEFUS</h3>
			</div>
			<fieldset class="col-md-12 well" style="padding-top: 15px; padding-bottom: 15px;">
				<div class="col-md-4"></div>						
				<div class="col-md-4">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<label>Despesa cabível</label>						
						<select class="form-control" name="tp_parecer" id="tp_parecer" required>
							<option></option>
							<option value="1">Sim</option>
							<option value="2">Não</option>					
							<option value="3">Parcial</option>					
						</select>				
					</div>
					<div class="col-md-4"></div>					
				</div>
				<div class="col-md-4"></div>				
			</fieldset>	
			<fieldset class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;" id="cond_parecer">
				<div class="col-md-3"></div>
				<div class="col-md-6 panel panel-default" style="padding-bottom: 15px; padding-top: 15px;" required>
					<div class="col-md-2"></div>
					<div class="col-md-4">
						Valor cabível ao FAR:
						<input type="text" class="form-control" name="vlr_far">
					</div>
					<div class="col-md-4">
						Valor não cabível ao FAR:
						<input type="text" class="form-control" name="vlr_negado">
					</div>
				</div>
				<div class="col-md-2"></div>
			</fieldset>
		</div>
		
		<fieldset class="col-lg-12" style="padding-top: 15px; padding-bottom: 15px;" >
			<textarea class="form-control" name="desc_parecer" placeholder="Descrição do parecer" style="height: 250;" required></textarea>
		</fieldset>
		<center>
			<button class="btn btn-success btn-flutuante" type="submit">Enviar</button>
		</center>
	</form>
</div>
<script type="text/javascript" src="../../mvc/mdl/js/parecer.js"></script>