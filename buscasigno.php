<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//Recebe a data do formulario.
$dtaNasc = $_POST['data'];
//separa a data do formulario em dia/mes
$dtaNew = date('d/m', strtotime($dtaNasc));
//cria uma array com a data do formulario [0]=> dia , [1]=>mes
$data = explode('/', $dtaNew);
//recebe xml
$xml = simplexml_load_file('signos.xml');

foreach ($xml as $signo){
    $nome = $signo->signoNome;
    $descricao = $signo->descricao;
    $dataSigI = explode('/', $signo->dataInicio);
    $dataSigF = explode('/', $signo->dataFim);
    if($data[1] == $dataSigI[1] and $data[0] > $dataSigI[0] OR $data[1] == $dataSigF[1] and $data[0] < $dataSigF[0] ){
       echo '<h1>Seu signo é: <strong>' . $nome . '</strong><br></h1>';
       echo '<h3> De ' . $signo->dataInicio . ' até ' . $signo->dataFim . '</h3>';
        echo '<p>'. $descricao .  '<p>';

    }
}
?>
<button onclick="history.go(-1);">Voltar</button>
</body>
</html>