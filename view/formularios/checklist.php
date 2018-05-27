<!--#include file="../../../ctrl/funcoes/asp/recordset/far/selecao-checklist.asp"-->

<table class="table table-bordered">	
	<tr align="center" class="active">
		<td>Item</td>
		<td>Status</td>
	</tr>
	<tbody>
		<% do while not rsSelecaoPerguntaChecklist.eof %>
		<tr>			
			<td width="800">				
				<input type="text" title='<%= rsSelecaoPerguntaChecklist("descricao") %>' class="form-control" value='<%= rsSelecaoPerguntaChecklist("pergunta") %>' disabled>
				<input type="hidden" name="pergunta" value="<%= rsSelecaoPerguntaChecklist("id_pergunta") %>">
			</td>
			<td id="seletor-estado" width="138">
				<select class="form-control" id="status" name="status" required>
					<option></option>
					<option value="1">Sim</option>
					<option value="2">Não</option>
					<option value="3">Não se aplica</option>
				</select>
			</td>						
		</tr>		
		<tr>
			<td colspan="3">
				<textarea class="form-control" name="observacao" placeholder="Observações..."></textarea>
			</td>
		</tr>
		<% rsSelecaoPerguntaChecklist.MoveNext() %>
		<% loop %>
	</tbody>
</table>		