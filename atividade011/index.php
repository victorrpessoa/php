<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 011</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $preco = $_GET["preco"] ?? 0;
        $ajuste = $_GET["ajuste"] ?? 0;

        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="ipreco" min="0" step="0.01" placeholder="<?=$preco?>" required>
            <label for="ajuste">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="ajuste" id="iajuste" min="0" max="100" step="1" value="<?=$ajuste?>" oninput="mudaValor()">
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado do Reajuste</h2>
        <?php
            $reajuste = $preco + ($preco * ($ajuste / 100));
            $p = numfmt_format_currency($padrao, $preco, "BRL");
            $r = numfmt_format_currency($padrao, $reajuste, "BRL");
            echo "<p>O produto que custava $p, com <strong>$ajuste% de aumento</strong> vai passar a custar <strong>$r</strong> a partir de agora.";
        ?>
    </section>
    <script>
        mudaValor();
        function mudaValor(){
            p.innerText = iajuste.value;
        }
    </script>
</body>
</html>