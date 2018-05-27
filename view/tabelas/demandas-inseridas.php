<?php 
    include_once "../../app/db/recordset/dados_demandas.asp";
?>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr class="active" align="center">
					<td>Demanda</td>
					<td>Data <br>de Inclusão</td>
					<td>Deferido</td>
					<td>Valor Solicitado</td>
					<td>Valor Autorizado</td>
					<td>Valor Não Autorizado</td>
					<td><span class="glyphicon glyphicon-search"></span></td>
				</tr>
				<tbody>
					<% do while not rsDadosDemandas.eof %>
					<tr>
						<td align="center"><%= rsDadosDemandas("id_demanda") %></td>
						<td align="center"><%= cdate(rsDadosDemandas("dt_inclusao")) %></td>
						<td align="center"><%= rsDadosDemandas("deferido") %></td>
						<td align="center"><%= formatNumber(rsDadosDemandas("vlr_historico")) %></td>
						<td align="center"><%= formatNumber(rsDadosDemandas("vlr_autorizado")) %></td>
						<td align="center"><%= formatNumber(rsDadosDemandas("vlr_n_autorizado")) %></td>
						<td>
							<button class="btn btn-default">
								<a href="#" id="btn_verif_demanda"><span class="glyphicon glyphicon-eye-open"></span></a>
							</button>
						</td>
					</tr>
					<% rsDadosDemandas.MoveNext() %>
					<% loop %>
				</tbody>
			</table>
		</div>
	</div>
</div>