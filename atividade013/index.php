<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 013</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .nota {
            height: 50px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php 
        $dinheiro = $_GET["dinheiro"] ?? 0;
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

        $saque = numfmt_format_currency($padrao, $dinheiro, "BRL");
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="dinheiro">Qual valor você deseja sacar? (R$)*</label>
            <input type="number" name="dinheiro" id="idinheiro" min="5" step="5" placeholder="<?=$dinheiro?>" required>
            <p style="font-size: 0.8em;"><sup>*</sup>Notas disponíveis: R$100, R$50, R$10, R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <section id="resultado">
        <h2>Saque de <?=$saque?> realizado</h2>
        <?php
            $cem = intdiv($dinheiro, 100);
            $cinquenta = intdiv(($dinheiro % 100), 50);
            $dez = intdiv((($dinheiro % 100) % 50), 10);
            $cinco = intdiv(((($dinheiro % 100) % 50) % 10), 5);
        ?>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li><img src="imagens/100-reais.jpg" alt="Nota R$100" class="nota">x<?=$cem?></li>
            <li><img src="imagens/50-reais.jpg" alt="Nota R$50" class="nota">x<?=$cinquenta?></li>
            <li><img src="imagens/10-reais.jpg" alt="Nota R$10" class="nota">x<?=$dez?></li>
            <li><img src="imagens/5-reais.jpg" alt="Nota R$5" class="nota">x<?=$cinco?></li>
        </ul>
    </section>
</body>
</html>