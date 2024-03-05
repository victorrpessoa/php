<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 005</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Analisador de Número Real</h1>
        <p>
            <?php 
                $valorReal = $_GET["real"];
                $int = (int) $valorReal;
                $frac = $valorReal - $int;
                $real = number_format($valorReal, 3, ",", ".");
                $inteiro = number_format($int, 0, ",", ".");
                $fracionario = number_format($frac, 3, ",", ".");
                echo "<p>Analisando o número <strong>$real</strong> informado pelo usuário:";
                echo "<ul><li>A parte inteira do número é <strong>$inteiro</strong></li><li>A parte fracionária do número é <strong>$fracionario</strong></li></ul>"
            ?>
        </p>
        <button onclick="javascript:history.go(-1)">&#x2B05; Voltar</button>
    </main>
</body>
</html>