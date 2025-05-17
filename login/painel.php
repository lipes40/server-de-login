<?php
include('protect.php');

$mostrar = true;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>.
    
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        body{
            display: flex;
            background-color: #111111;
            flex-direction: column;
            height: 100vh;
            width: 100%;
        }

        header{
            display: flex;
            width: 100vw;
            height: 10%;
            justify-content: space-between;
            align-items: center;
        }

        .base-line{
            display: flex;
            align-items: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            justify-content: center;
            margin-bottom: 50px;
        }
        
        .conjunto{
            margin-top: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;

        }

        button{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #8A2BE2;
            color: white;
            border: none;
            height: 50px;
            width: 200px;
            border-radius: 15px;
            bottom: 0;
            margin-bottom: 10px;
            transition: 0.2s;
        }

        button:hover{
            transform: scale(1.05);
            background-color: #7B68EE;
            color: black;
        }

        .mostrar{
            margin-right: 20px;
        }

        .info{
            display: none;
            margin-top: 100px;
            flex-direction: column;
        }

        h1{
            color: white;
            margin-left: 20px;
        }

        h2{
            color: white;
        }

        h3{
            color: white;
        }
    </style>

</head>
<body>

    <header>
    <h1>Sejá bem vindo ao Painel</h1> 
    <button class="mostrar" onclick="mostra()">Minhas informações</button>
    </header>

    <div class="conjunto">
        <h2>Olá <?php echo $_SESSION['nome']; ?> Tudo Bem?</h2>

        <div id="info" class="info">
            <h3><?php if($mostrar) echo "Nome: " . $_SESSION['nome']; ?></h3>
            <h3><?php if($mostrar) echo "Email: " . $_SESSION['email']; ?></h3>
            <h3><?php if($mostrar) echo "Senha: " . $_SESSION['senha']; ?></h3>
        </div>

        

        <div class="base-line">
            <a href="logout.php"><button>Sair</button></a>
        </div>
    </div>

</body>
<script>
    let mostrar = false;
    const obj = document.getElementById('info');

    function mostra() {
        
        if(mostrar == false) {
            obj.style.display = "flex"
            mostrar = true;
        }
        else {
            obj.style.display = "none"
            mostrar = false;
        }

    }
</script>
</html>