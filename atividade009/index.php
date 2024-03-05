<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 009</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $v1 = $_GET["v1"] ?? 0;
        $p1 = $_GET["p1"] ?? 1;
        $v2 = $_GET["v2"] ?? 0;
        $p2 = $_GET["p2"] ?? 1;
    ?>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">1º Valor</label>
            <input type="number" name="v1" id="iv1" min="0" placeholder="<?=$v1?>" required>
            <label for="p1">1º Peso</label>
            <input type="number" name="p1" id="ip1" min="1" placeholder="<?=$p1?>" required>
            <label for="v2">2º Valor</label>
            <input type="number" name="v2" id="iv2" min="0" placeholder="<?=$v2?>" required>
            <label for="p2">2º Peso</label>
            <input type="number" name="p2" id="ip2" min="1" placeholder="<?=$p2?>" required>
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section id="resultado">
        <h2>Cálculo de Médias</h2>
        <?php
            $mediaAS = ($v1 + $v2) / 2;
            $mediaAP = ($v1 * $p1 + $v2 * $p2) / ($p1 + $p2);
            echo "<p>Analisando os valores $v1 e $v2:<ul><li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a ". number_format($mediaAS, 2, ",", ".") .".</li><li>A <strong>Média Aritmética Ponderada</strong> com pesos $p1 e $p2 é igual a ". number_format($mediaAP, 2, ",", ".") .".</li></ul>";        
        ?>
    </section>
</body>
</html>