<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversão concluída</title>
</head>
<body>
    <main>
    <h1>Moeda convertida com sucesso!</h1>
        <?php
            // Valor a ser convertido
            $valor = $_GET["valor"];

            // Cotação atual através da API do Banco Central
            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
            $dados = json_decode(file_get_contents($url), true);
            $cotacao = $dados["value"][0]["cotacaoCompra"];

            // Padronizando o output e mostrando o resultado
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            $final = $valor / $cotacao;
            echo "<p>". numfmt_format_currency($padrao, $valor, "BRL") . " convertidos para Dólar Americano (USD)<br>";
            echo "Resultado: <strong>" . numfmt_format_currency($padrao, $final, "USD") . "</strong></p>";
        ?>
        <button onclick="javascript:window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>