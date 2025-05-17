<?php

include('conexao.php');

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
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <form action="" class="box-center" method="POST">

        <h1>Acesse sua conta!</h1>

        <input type="text" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?? ''; ?>">

        <input type="password" name="senha" placeholder="senha">

        <button type="submit" class="entrar">Entrar</button>

        <span style="
        font-family: Arial, Helvetica, sans-serif; 
        display: flex; 
        color: red;"><?php if(isset($error) && $error != "") echo $error; ?></span>

    </form>
</body>
</html>