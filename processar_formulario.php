<?php
// Verifica se os campos foram preenchidos
if (isset($_POST['nome']) && isset($_POST['email'])) {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Configurações do banco de dados
    $servidor = "localhost"; // ou o endereço do servidor, se estiver em outro lugar
    $usuario = "root"; // substitua pelo nome de usuário do banco de dados
    $senha = ""; // substitua pela senha do banco de dados
    $banco = "site"; // nome do banco de dados
    $tabela = "usuario"; // nome da tabela

    // Conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Insere os dados na tabela
    $sql = "INSERT INTO $tabela (nome, email) VALUES ('$nome', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>Cadastro realizado com sucesso!</p>";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
