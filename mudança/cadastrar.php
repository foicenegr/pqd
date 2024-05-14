<?php

    include 'conexao.php';
    
    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
    // exit;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
     // captura os dados digitados no form e salva em variaveis
     // para facilitar a manipulção dos dados
         
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    // vamos abrir a conexão com o banco de dados
    $con = abrirBanco(); 

    // vamos criar o sql para realizar o insert dos dados no BD
    $sql = "INSERT INTO pessoas (nome, sobrenome, nascimento, endereco, telefone)
            VALUES
            ('$nome', '$sobrenome', '$nascimento', '$endereco', '$telefone')";
         
         if ($con->query($sql) === TRUE) {
            echo "Sucesso ao cadastrar o contato";
        } else {
            echo "Erro ao cadastrar o contato";
        }

        fecharBanco($con);
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head> 8
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <title>Agenda</title>
</head>
<body>
    <header>
        <h1>Agenda de Contatos</h1> 
   
    <nav> 
        <div class="div">
        <li> <a href="index.php"> Home</a></li>
        <li> <a href="cadastrar.php"> cadastrar</a></li></div>
    </nav> </header>

    <section>
        <h2>cadastrar contato</h2>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" placeholder="Nome" name="nome"> <br>
            
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" placeholder="Sobrenome" name="sobrenome"> <br>
            
            <label for="nascimento">Nascimento:</label>
            <input type="date" id="nascimento" placeholder="Nascimento" name="nascimento"> <br>

            <label for="endereco"> Endereco:</label>
            <input type="text" id="endereco" placeholder="Endereco" name="endereco"> <br>
            
            <label for="telefone">Telefone:</label>
            <input type="number" id="telefone" placeholder="telefone" name="telefone"> <br>

            <input type="Submit" value="Cadastrar">
        </form>
    </section>
</body>
</html>