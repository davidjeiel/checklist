<?php
    $qtd = $_REQUEST['qtd'];
?>
<form id="cadastra_db">
    <?php for( $i=1; $i<=$qtd; $i++ ): ?>
        <fieldset>
            <div class="col-md-1"></div>        
            <div class="col-md-2">
                NOME
                <input type="text" name="no_param" id="no_param" class="form-control">
            </div>
            <div class="col-md-6">
                DESCRIÇÃO
                <input type="text" name="de_param" id="de_param" class="form-control">
            </div>
            <div class="col-md-2">
                TIPO
                <select class="form-control" id="dipoDado" name="dipoDado">
                    <option></option>
                    <option value="1">Texto</option>
                    <option value="2">Número</option>
                    <option value="3">Data</option>
                    <option value="4">Valores</option>
                </select>                
            </div>
        </fieldset>
   <?php endfor; ?>
   <center>
        <button class="btn btn-success btn-flutuante" type="submit">Enviar</button>
    </center>
</form>