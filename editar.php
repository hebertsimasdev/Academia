<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Aluno</h1>
    <?php 
        require 'conexao.php';
        $id = $_REQUEST["id"];
        $dados = []; // criando variavel vetor
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
    <form action="editando.php" method="POST" >
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

        <button type="submit">Salvar</button>
    </form>
</body>
</html>