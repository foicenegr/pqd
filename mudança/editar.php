<?php
    include_once  'conexao.php';
    include_once  'funcoes.php';

if (isset ($_GET['acao'])&& $GET ['acao'] == 'editar'){

    //tf terndrio
    $id = isset ($_GET['id'])? $_GET[id]: 0;

    // vamos abrir a conexao com o banco de dados
    $conexaoComBanco = abrirbanco();

    $sql = "select * FROM pessoas WHERE id = ?";
    //preparar o SQL para consultar o id no banco de dados
    $pegardados = $conexaoComBnanco->prepare(SQL);
    //substituir o ???
    $pegardados->bind_param("i", $id);
    //Executar o SQL que preparamos
    $pegarDados->execute();
    $result = $pegarDados->fetch();

    if ($result->num_rows == i){
        $registro = $result->fetch_assoc();
    }
    else {
        echo"nenhum registro encontrado";
        exit;
    }
    $pegarDados->close();
    fecharBanco($con);
}
if($_SEVER['REQUEST_METHOD'] == "POST"){
    $id= $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nacismento = $_POST['nacismento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
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