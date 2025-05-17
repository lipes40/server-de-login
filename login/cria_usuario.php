<?php

    require("connector.php");

/*if(isset($_POST)){
    echo "<pre>";

    print_r($_POST);

    echo "<pre>";
}*/

if(isset($_POST)) {
    $nome = $_POST['c-nome'];
    $email = $_POST['c-email'];
    $senha = $_POST['c-senha'];

    $query = "INSERT INTO usuários (nome, email, senha) VALUE ('$nome', '$email', '$senha')";

    //statment
    $stmt = $pdo->prepare($query);
    $stmt->execute();
}

header("Location: index.php")

?>