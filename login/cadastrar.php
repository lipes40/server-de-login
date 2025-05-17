<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    
    <style>
        body{
            background-color: #111111;
        }

        header{
            display: flex;
            justify-content: center;
            max-height: 60px;
        }

        h1{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        h3{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        input{
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            background-color: black;
            color: white;
            border: none;
            height: 8%;
            width: 30%;
            border-radius: 10px;
            padding-left: 5px;
        }

        .button{
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #8A2BE2;
            color: white;
            border: none;
            height: 10%;
            width: 30%;
            margin-top: 20px;
            border-radius: 20px;
            transition: 0.2s;
        }

        .button:hover{
            transform: scale(1.05);
            background-color: #7B68EE;
            color: black;
        }

    </style>

</head>
<body>

    <header><h1>Crie sua conta!</h1></header>
    
    <form action="cria_usuario.php" method="POST" onsubmit="return enviar()">
        <h3>Insira o nome</h3>
        <input type="text" name="c-nome" id="name" placeholder="Nome" value="<?php echo $_POST['c-nome'] ?? ''; ?>">

        <h3>Insira o email</h3>
        <input type="text" name="c-email" id="email" placeholder="email" value="<?php echo $_POST['c-email'] ?? ''; ?>">

        <h3>Insira o senha</h3>
        <input type="password" name="c-senha" id="senha" placeholder="senha" value="<?php echo $_POST['c-senha'] ?? ''; ?>">

        <h3>Confirme a senha</h3>
        <input type="password" name="c-reSenha" id="reSenha" placeholder="Confime a Senha" value="<?php echo $_POST['c-reSenha'] ?? ''; ?>">

        <input class="button" type="submit" value="enviar">

    </form>

</body>
<script>
    let name = document.getElementById("name")
    let email = document.getElementById("email")
    let senha = document.getElementById("senha")
    let reSenha = document.getElementById("reSenha")

    function enviar() {
        if(name.value.length == 0) {
            alert("Preenscha seu nome!");
            return false;
        }
        else if(email.value.length == 0) {
            alert("Preencha seu email!");
            return false;
        }
        else if(senha.value.length == 0) {
            alert("Preenscha a senha!");
            return false;
        }
        else if(reSenha.value.length == 0) {
            alert("confirme a senha!");
            return false;
        }
        else if(senha.value != reSenha.value) {
            alert("suas senhas estão Diferentes!");
            return false;
        }
        else{
            return true;
        }
    }
</script>
</html>