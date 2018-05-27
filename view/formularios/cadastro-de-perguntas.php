<div class="container">
	<div class="page-header">
		<h3 align="center">Cadastro de perguntas - Checklist do Dossiê</h3>
	</div>
	<form action="" method="get" id="formulario-perguntas-far">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-3">
				Tipo de edição:
				<select class="form-control" id="select-tipo" onchange="SeletorTipoPergunta();">
					<option>Selecione aqui</option>
					<option value="insercao">Inserção</option>
					<option value="alteracao">Alteração</option>
					<option value="exclusao">Exclusão</option>
				</select>
			</div>
			<div class="col-md-3" id="selecao-PerguntaParaEdicao">
				
			</div>
			<div class="col-md-3"></div>
		</div>
		<hr>
		<div class="row" id="pergunta-obs-far">
			<fieldset>
				Pergunta:
				<input class="form-control" type="text" name="pergunta">
			</fieldset>
			<fieldset style="padding-buttom: 25px;">
				Observações:
				<textarea class="form-control" name="obs">

				</textarea>		
			</fieldset><br>
		</div>
		<center>
			<button type="submit" class="btn btn-success" id="btn-env-form-checklist-far">Enviar</button>
		</center>
	</form>
	<!--#include file="../../../ctrl/funcoes/asp/recordset/far/selecao-perguntas.asp"-->
	<%
		
		response.write("<ul class='list-group'>")
		response.write("<li class='list-group-item active'>")
			response.write("<h3 align='center'>Lista de Perguntas</h3>")
		response.write("</li>")

		do while not rsSelecaoPerguntasChecklist.eof
			
				response.write("<li class='list-group-item'>")
					response.write(rsSelecaoPerguntasChecklist("pergunta"))
				response.write("</li>")
			
		rsSelecaoPerguntasChecklist.MoveNext()
		loop
		response.write("</ul>")
	%>
</div>