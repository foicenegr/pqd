<?php
include 'conexao.php';

if(isset($_GET['acao']) && $_GET['acao']== 'excluir') {
    
    $id = $_GET['id'];
    
    if ($id > 0) {
        $con = abrirBanco();
        $sql = "DELETE FROM pessoas WHERE id = $id";
        if ($con->query($sql) === true){
            echo "<script>alert ('contato excluido com sucesso')</script>";
        }
        else {
            
        }
    } 
else {

} 
fecharBanco($con);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
        
<h2>lista de contatos</h2>
        <table border="1">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>Naascimento</td>
                    <td>endereco</td>
                    <td>telefone</td>
                    <td>Acoes</td>
                </tr>
            </thead>

            <tbody>
<?php  
$con = abrirBanco(); 
$sql = "SELECT id, nome, sobrenome, nascimento, endereco, telefone
FROM pessoas";
$result = $con->query($sql);
//$registros = $result->fetch_assoc();
if ($result->num_rows > 0){
while ($registros = $result->fetch_assoc()){
  ?>
<tr>
    <td> <?= $registros['id'] ?></td>
    <td> <?= $registros['nome'] ?></td>
    <td> <?= $registros['sobrenome'] ?></td>
    <td> <?= date("d/m/Y", strtotime($registros['nascimento']))?></td>
    <td> <?= $registros['endereco'] ?></td>
    <td> <?= $registros['telefone'] ?></td>

    <td> 

    <a href="editar.php"> <button> editar</button></a>
    <a href="?acao=excluir&id=<?= $registros['id'] ?>" onclick="return confirm('tem certeza que deseja excluir')"> <button> excluir </button></a>
    </td>
</tr>

  <?php
}
}
else {?>

<tr>
    <td colspan='7'>Nenhum registro no banco de dados</td>
</tr>

<?php
}
?>
            </tbody>
        </table> 

        
            
        </body>
</html> 