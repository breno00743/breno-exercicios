<?php
// salva_usuario.php
// Caminho absoluto para garantir include correto
include_once __DIR__ . "/conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Acesso inválido.";
    exit;
}

// Verifica se $con existe e é um mysqli
if (!isset($con) || !($con instanceof mysqli)) {
    die("Erro: conexão com o banco não disponível. Verifique o arquivo conexao.php");
}

// Recebe e valida campos mínimos
$nome = trim($_POST["nome_completo"] ?? "");
$usuario = trim($_POST["usuario"] ?? "");
$email = trim($_POST["email"] ?? "");
$data_nascimento = $_POST["data_nascimento"] ?? null;
$cpf = trim($_POST["cpf"] ?? "");
$senha_raw = $_POST["senha"] ?? "";

if ($nome === "" || $usuario === "" || $email === "" || $senha_raw === "") {
    echo "Por favor preencha os campos obrigatórios.";
    exit;
}

// Hash da senha
$senha = password_hash($senha_raw, PASSWORD_DEFAULT);

// Usa prepared statement para evitar SQL injection
$stmt = $con->prepare("INSERT INTO usuarios (nome_completo, usuario, email, data_nascimento, cpf, senha) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    echo "Erro no prepare: " . $con->error;
    exit;
}

$stmt->bind_param("ssssss", $nome, $usuario, $email, $data_nascimento, $cpf, $senha);

if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso! <a href='entrada.php'>Entrar</a>";
} else {
    // Se houver erro de duplicidade (usuario/email/cpf UNIQUE) mostrar mensagem amigável
    if ($con->errno === 1062) {
        echo "Erro: já existe um usuário com esse e-mail/usuário/CPF.";
    } else {
        echo "Erro ao cadastrar: (" . $con->errno . ") " . htmlspecialchars($con->error);
    }
}

$stmt->close();
$con->close();
?>
