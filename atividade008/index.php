<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade PHP 008</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $raiz = $_GET["raiz"] ?? 0;
    ?>
    <main>
        <h1>Informe um número</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="raiz">Número</label>
            <input type="number" name="raiz" id="iraiz" placeholder="<?=$raiz?>" required>
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <section id="resposta">
        <h2>Resultado Final</h2>
        <?php
            $raizquad = sqrt($raiz);
            $raizcub = $raiz ** (1/3);
            echo "<p>Analisando o <strong>número $raiz</strong>, temos:";
            echo "<ul><li>A sua raiz quadrada é <strong>" . number_format($raizquad, 3, ",", ".") . "</strong></li><li>A sua raiz cúbica é <strong>" . number_format($raizcub, 3, ",", ".") . "</strong></li></ul>";
        ?>
    </section>
</body>
</html>