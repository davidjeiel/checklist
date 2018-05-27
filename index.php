<?php
    include_once './view/src/cabecalho.php';
    include_once './view/src/menu.php';
?>
    <div class="container-far principal"> 
        <div class="page-header">
            <h1 align="center">
                Checklist
            </h1>
        </div>
        <div id="painel-principal" class="page-body container">
            <?php 
            /*
                include_once './app/db/conexao.class.php';
                $sql = "select * from usuarios";
                $conn = new conexao;

                $teste = $conn->runSelect($sql);

                foreach ($teste as $value) {
                    echo $value['nome']."<br>";
                }             

                include_once './app/db/conexao.php';
                $sql = "select * from usuarios";
                $rs  = $conn->prepare($sql);
                $result = $rs->execute();

                print_r($result);



                foreach(PDO::getAvailableDrivers() as $driver) {
                    echo $driver;
                }
            * 
            */
            
                include_once './app/db/mysqli_conn.php';
                $sql = " select * from usuarios ";
                $conn = new conexao();
                
                $rs = mysqli_query($conn, $sql) ;
                print_r($rs);            
            ?>
        </div>
    </div>
<?php
    include_once './view/src/rodape.php';