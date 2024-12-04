<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Excluindo Aluno</h1>
    <?php 
        require 'conexao.php';
        $cpf = $_REQUEST["cpf"];
        $dados = [];
       // var_dump($id);
       $sql = $pdo->prepare("SELECT * FROM aluno WHERE cpf = :cpf");
       $sql->bindValue(":cpf",$cpf);
       $sql->execute();

       if($sql->rowCount() > 0){
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
       }else{
            header("Location:index.php");
            exit;
       }
       

    ?>
    <h2>Tem certeza que quer excluir o usuario abaixo?</h2>
    
    <form action="excluindo.php" method="POST" >
    <input  type="hidden" name="cpf" id="cpf" value="<?=$dados['cpf']; ?>">
        <label for="Nome">
            Nome <input type="text" name="nome" value="<?=$dados['nome']; ?>">
        </label>        
        <label for="Email">
            Email <input type="text" name="email" value="<?=$dados['email']; ?>">
        </label>
        <label for="Telefone">
            Nome <input type="text" name="telefone" value="<?=$dados['telefone']; ?>">
        </label>      
        <label for="Endereço">
            Nome <input type="text" name="endereco" value="<?=$dados['endereco']; ?>">
        </label>    
        <button type="submit">Excluir</button>


    </form>

    <a href="index.php">Voltar</a>

</body>
</html>