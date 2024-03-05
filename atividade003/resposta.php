<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 003</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas v1.0</h1>
        <?php
            $cotacao = 4.97;
            $respFormulario = $_GET["dinheiro"];
            $dolar = $respFormulario / $cotacao;

            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            $dinheiro = numfmt_format_currency($padrao, $respFormulario, "BRL");
            $conversao = numfmt_format_currency($padrao, $dolar, "USD");
        ?>
        <p>Seus <?=$dinheiro?> equivalem a <strong><?=$conversao?></strong><sup>*</sup></p>
        <p style="font-size: 0.85em;"><sup>*</sup><strong>Cotação fixa de R$4,97</strong> informada diretamente no código</p>
        <button onclick="javascript:history.go(-1)">&#x2B05; Voltar</button>
    </main>
</body>
</html>