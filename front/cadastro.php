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
    <title>Cadastro</title>
</head>
<body>
            
    <header id="header">
        
        <div class="pesquisa">
            
            <img src="../img/senai.png" alt="Logo" class="ynfuan">
             
                <a href="index.php"><button class="botao">Voltar</button></a>
                
        </div>

    </header>

    <main id="maincadastro">
        
        <h1>Cadastro</h1>

        <form action="" method="POST" class="formAssinatura">
            
            <input type="text" name="nome" id="nome" placeholder="Informe o seu Nome" required>

            <input type="email" name="email" id="email" placeholder="Informe o seu E-mail" required>
            
            <input type="password" name="senha" id="senha" placeholder="Informe a sua senha" required>

            <input type="text" name="login" id="login" placeholder="Informe o seu login" required>

<?php
    include("../conexao.php");

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
            $res =  "Registrado com sucesso";
        }else{
            $res = "falha ao registrar o usuário";
        }

        echo "<script>alert('{$res}');</script>";
    }
?>

            <a href="login.php"><button class="botaao" type="submit">Cadastre-se!</button></a>

        </form>

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