<?php

require('conexao.php');

$error = '';

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        $error = "Preencha seu email!";
    }
    elseif (strlen($_POST['senha']) == 0) {
        $error = "Preencha sua senha!";
    }
    else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuários WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $usuario['senha'];

            header("Location: painel.php");

            exit;

        } else{
            $error = "Falha ao logar! email ou senha incorretos!";
        }
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
*{
    padding: 0;
}


body{
    display: flex;
    background-color: #111111;
    color: white;
    height: 90vh;
    width: 99%;
    justify-content: center;
}

header{
    display: flex;
    height: 100px;
    width: 100vw;
    justify-content: center;
    align-items: center;
}

h1{
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

.box-center{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    gap: 10px;
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

.entrar{
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #8A2BE2;
    color: white;
    border: none;
    height: 5%;
    width: 30%;
    border-radius: 5px;
    transition: 0.2s;
}

.entrar:hover{
    transform: scale(1.05);
    background-color: #7B68EE;
    color: black;
}

p{
    text-decoration: none;
    padding: 0;
    gap: 0;
    margin: 0;
}

.conta{
    text-decoration: none;
    padding: 0;
    gap: 0;
    height: 5px;
    color: #8A2BE2;
}
    </style>

</head>
<body>
    <form action="" class="box-center" method="POST">

        <h1>Acesse sua conta!</h1>

        <input type="text" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?? ''; ?>">

        <input type="password" name="senha" placeholder="Senha">

        <button type="submit" class="entrar">Entrar</button>

        <span style="
        font-family: Arial, Helvetica, sans-serif; 
        display: flex; 
        color: red;"><?php if(isset($error) && $error != "") echo $error; ?></span>

        <p>ou</p>

        <a class="conta" type="button" href="cadastrar.php"><p>Crie sua conta!</p></a>

    </form>
    
</body>
</html>