<?php
    include("config/cabecalho.php");
?>

<form action="" method="POST">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="informe seu nome" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="informe seu E-mail" required>

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" placeholder="informe sua senha" required>

    <label for="login">Login</label>
    <input type="text" name="login" id="login" placeholder="informe seu login" required>

    <button type="submit">Enviar</button>
    <button type="reset">Limpar</button>

</form>

<?php
    include("conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $login = $_POST["login"];

        $sql = "INSERT INTO usuario(nome, email, senha, login) VALUES (:nome, :email, :senha, :login)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindvalue(":nome", $nome);
        $stmt->bindvalue(":email", $email);
        $stmt->bindvalue(":senha", $senha);
        $stmt->bindvalue(":login", $login);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo "Registrado com sucesso";
        }else{
            echo "falha ao registrar o usuário";
        }
    }
?>

<?php
    include("config/rodape.php");
?>