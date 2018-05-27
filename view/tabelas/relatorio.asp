<!--#include file="../../../ctrl/funcoes/asp/recordset/far/relatorio-respostas.asp"-->

<div class="page-header">
	<h3 align="center">Conferência de dados - Checklist</h3>
</div>
<div class="col-md-12">
	<table class="table table-hover table-bordered">
		<tr align="center" class="active">
			<td>Demanda</td>
			<td>Resposta</td>
			<td>Status</td>
			<td>Observação</td>
		</tr>
		<tbody>
			<% do while not rsRelRespostas.eof %>
			<tr>	
				<td align="center"><%= rsRelRespostas("id_demanda") %></td>
				<td align="center"><%= rsRelRespostas("pergunta") %></td>
				<td align="center">
					<% 						
						select case rsRelRespostas("estado")
							case "1"
								resp = "Sim"
							case "2"
								resp = "Não"
							case "3"
								resp = "Não se aplica"
						end select	
						response.write(resp)
					%>
				</td>				
				<td align="center"><%= rsRelRespostas("observacao") %></td>
			</tr>
			<% rsRelRespostas.MoveNext() %>
			<% loop %>
		</tbody>
	</table>
</div>