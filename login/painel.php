<?php
include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Sejá bem vindo ao Painel</h1> 
    <h2><?php echo $_SESSION['nome']; ?></h2>

    <a href="logout.php"><button>Sair</button></a>
</body>
</html>