    <div class="alert alert-success">
        <h4 align="center">
            Informe aqui os parâmetros que serão informados a cada demanda e para todos os controles estes dados serão necessários
        </h4>        
    </div>

<div class="row">
    <center>
        <div class="col-md-2"></div>
        <div class="col-md-6">
            Escolha a quantidade de parâmetros sua demanda necessitará
        </div>
        <div class="col-md-2">
            <select class="form-control" id="qtd">
                <option></option>
                <?php for($a = 1; $a <= 10; $a++): ?>            
                    <option value="<?php echo $a ;?>"><?php echo $a ;?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="col-md-2"></div>
    </center>
</div>
<div id="form_cria_db">
    
</div>
<script>
    $("#qtd").on("change", function(){
        var qtd = $("#qtd").val();
        $.ajax({
            url: 'view/formularios/dados_banco.php',
            method: 'POST',
            data: {qtd: qtd},
            success: function(result){
                $("#form_cria_db").html(result);
            }
        });
    });
</script>