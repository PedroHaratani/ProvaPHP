<?php
    date_default_timezone_set('America/Sao_Paulo');
    include_once "conexao.php";
    include "Horarios.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Informe os Horarios de entrada e saída</h2>
    <?php
        $dados = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $horario = new HorasTrabalho();
        $tempoCalculado;
        if(!empty($dados['CalcHorario'])){

            $query = "INSERT INTO horarios (entrada,saida) VALUES (:entrada,:saida)";
            $cad_horario = $conn->prepare($query);
            $cad_horario->bindParam(':entrada',$dados['entrada']);
            $cad_horario->bindParam(':saida',$dados['saida']);

            $cad_horario->execute();

            if($cad_horario->rowCount()){
                
                $horario -> setentrada($dados['entrada']);
                $horario -> setsaida($dados['saida']);
                $tempoCalculado = $horario->VerificaHorarios($horario->getentrada(),$horario->getsaida());

                echo $tempoCalculado;
                

            }else {
                echo "<span>Horário não cadastrado com sucesso</sapan>";
            }
        }
    ?>


    <form action="" method="get">
        <label>Entrada</label>
        <input type="datetime-local" name="entrada" require>
        <br><br>
        <label>Saída</label>
        <input type="datetime-local" name="saida" require>
        <br><br>
        <input type="submit" value="Calcular" name="CalcHorario">
    </form>

</body>
</html>