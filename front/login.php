<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/mobile.css">
    <title>Login</title>
</head>
<body>
                
    <header id="header">
        
        <div class="pesquisa">
            
            <img src="../img/senai.png" alt="Logo" class="ynfuan">
             
                <a href="index.php"><button class="botao">Voltar</button></a>
                
        </div>

    </header>
    
    <main id="maincadastro">
        
        <h1>Login</h1>

        <form action="" method="post" class="formAssinatura">
            
            
            <input type="text" name="login" id="login" required minlength="3" placeholder="Informe o seu login">
            <input type="password" name="senha" id="senha" required minlength="3" placeholder="Informe a sua senha">

<?php
    include("../conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $senha = $_POST["senha"];
        $login = $_POST["login"];

        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $stmt = $conexao->prepare($sql);
        $stmt->bindvalue(":senha", $senha);
        $stmt->bindvalue(":login", $login);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $res = "Pode Logar";
        }else{
            $res = "Não pode logar";
        }

        echo "<script>alert('{$res}');</script>";
    }
?>

            <a href="index.php"><button class="botaao" type="submit">Entrar</button></a>
        
        </form>

        <a href="cadastro.php"><button class="botaao" type="submit">Não tem conta?</button></a>
        
    </main>

    <footer id="rodape">
        
        <div class="divEsquerda">
            
            <div class="textoEsquerdaCima">
                <p>Copyright &copy; Elbazar.com.br LTDA.</p>
            </div>

            <div class="textoEsquerdaBaixo">
                <p>CNPJ nº03.007.331/0001-41 / Av. das Nações Unidas, nº3.003, Bonfim, Osasco/SP-</p>
                <p>CEP 06233-903 - Empresa do grupo Mercado Livre.</p>
            </div>

        </div>

        <div class="divDireita">

            <div class="direitaEsquerda">
                
                <div class="direitaEsquerdaCima">
                    <p>Trabalhe Conosco</p>
                </div>
                <div class="direitaEsquerdaMeio">
                    <p>Contato</p>
                </div>
                <div class="direitaEsquerdaBaixo">
                    <p>Termos e Condições</p>
                </div>

            </div>

            <div class="direitaDireita">

                <div class="direitaDireitaCima">
                    <p>Acessibilidade</p>
                </div>
                <div class="direitaDireitaMeio">
                    <p>Como cuidamos da sua privacidade</p>
                </div>
                <div class="direitaDireitaBaixo">
                    <p>Informações sobre seguros</p>
                </div>

            </div>

        </div>

    </footer>

</body>
</html>