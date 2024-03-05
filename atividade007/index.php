<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 007</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $minimo = 1412;
        $sal = $_GET["salario"] ?? 0;

        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="salario" id="isalario" min="0" placeholder="<?=$sal?>" step="0.01" required>
            <p>Considerando o salário mínimo de <strong>R$1.412,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resposta">
        <h2>Resultado Final</h2>
        <?php
            $inteiro = intdiv($sal, $minimo);
            $resto = $sal % $minimo;

            $salario = numfmt_format_currency($padrao, $sal, "BRL");
            $salresto = numfmt_format_currency($padrao, $resto, "BRL");

            echo "Quem recebe um salário de $salario ganha <strong>$inteiro salários mínimos</strong> + $salresto";
        ?>
    </section>
</body>
</html>