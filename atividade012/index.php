<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 012</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $tempo = $_GET["tempo"] ?? 0;
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="tempo">Qual é o total de segundos?</label>
            <input type="number" name="tempo" id="itempo" min="0" placeholder="<?=$tempo?>" required>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Totalizando tudo</h2>
        <?php
            $s = intdiv($tempo, 604800);
            $d = intdiv(($tempo % 604800), 86400);
            $h = intdiv((($tempo % 604800) % 86400), 3600);
            $m = intdiv(((($tempo % 604800) % 86400) % 3600), 60);
            $seg = (((($tempo % 604800) % 86400) % 3600) % 60);
            echo "<p>Analisando o valor que você digitou, <strong>" . number_format($tempo, 0, ",", ".") . " segundos</strong> equivalem a um total de:<ul><li>$s semanas</li><li>$d dias</li><li>$h horas</li><li>$m minutos</li><li>$seg segundos</li></ul>"
        ?>
    </section>
</body>
</html>