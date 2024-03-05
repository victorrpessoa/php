<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 004</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas v2.0</h1>
        <?php
            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);
            $cotacao = $dados["value"][0]["cotacaoCompra"];

            $respFormulario = $_GET["dinheiro"];
            $dolar = $respFormulario / $cotacao;

            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            $dinheiro = numfmt_format_currency($padrao, $respFormulario, "BRL");
            $conversao = numfmt_format_currency($padrao, $dolar, "USD");
            $ajuste = numfmt_format_currency($padrao, $cotacao, "BRL");
        ?>
        <p>Seus <?=$dinheiro?> equivalem a <strong><?=$conversao?></strong><sup>*</sup></p>
        <p style="font-size: 0.85em;"><sup>*</sup>Cotação obtida diretamente do site do <a href='https://www.bcb.gov.br/' target='_blank'><strong>Banco Central do Brasil</strong></a></p>
        <button onclick="javascript:history.go(-1)">&#x2B05; Voltar</button>
    </main>
</body>
</html>