<?php
    include("config/cabecalho.php");
?>

<form action="" method="POST">

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
        $senha = $_POST["senha"];
        $login = $_POST["login"];

        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $stmt = $conexao->prepare($sql);
        $stmt->bindvalue(":senha", $senha);
        $stmt->bindvalue(":login", $login);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo "Pode Logar";
        }else{
            echo "Não pode logar";
        }
    }

    include("config/rodape.php");
?>