<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 010</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $anoAtual = date("Y");
        $nascimento = $_GET["anoN"] ?? 2000;
        $atual = $_GET["anoA"] ?? $anoAtual; 
    ?>
    <main>
        <h1>Calculando a sua idade</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="anoN">Em que ano você nasceu?</label>
            <input type="number" name="anoN" id="ianoN" max="<?=$anoAtual-1?>" placeholder="<?=$nascimento?>" required>
            <label for="anoA">Quer saber sua idade em que ano? <?="(atualmente estamos em <strong>$anoAtual</strong>)"?></label>
            <input type="number" name="anoA" id="ianoA" min="<?=$anoAtual?>" placeholder="<?=$atual?>" required>
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado</h2>
        <?php 
            echo "<p>Quem nasceu em $nascimento vai ter <strong>" . $atual - $nascimento . " anos</strong> em $atual!";
        ?>
    </section>
</body>
</html>