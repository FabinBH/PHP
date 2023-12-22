<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado</title>
</head>
<body>
    <header>
        <h1>Resultado dos números</h1>
    </header>
    <main>
        <?php
        $num = $_GET["num"];
        $s = $num + 1;
        $a = $num - 1;
        echo "<h1>O número escolhido foi $num!</h1>";
        echo "<p>O seu antecessor é <strong>$a!</strong></p>";
        echo "<p>O seu sucessor é <strong>$s!</strong></p>";
        ?>
        <button onclick="javascript:window.location.href='index.html'">Quero voltar</button>
    </main>
</body>
</html>