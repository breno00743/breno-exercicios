<?php
include("conexao.php");
session_start();

// verifica login
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"] ?? ''; // evita erro se o campo não vier

    // caminho da pasta uploads (formato correto para Windows)
    $diretorio = dirname(__FILE__) . "\\uploads\\";

    // cria a pasta caso não exista
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // verifica se o arquivo foi enviado
    if (isset($_FILES["arquivo"]) && $_FILES["arquivo"]["error"] == 0) {
        $nome_original = basename($_FILES["arquivo"]["name"]);
        $novo_nome = time() . "_" . $nome_original;
        $caminho_arquivo = $diretorio . $novo_nome;

        // move o arquivo para a pasta uploads
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminho_arquivo)) {
            // salva no banco
            $sql = "INSERT INTO submissao (usuario_id, titulo, descricao, arquivo)
                    VALUES ('$usuario_id', '$titulo', '$descricao', '$novo_nome')";

            if ($con->query($sql)) {
                echo "Submissão enviada com sucesso!<br>";
                echo "<a href='envia_submissao.php'>Enviar outra</a> | ";
                echo "<a href='atividades.php'>Ver atividades</a>";
            } else {
                echo "Erro ao salvar no banco: " . $con->error;
            }
        } else {
            echo "Erro ao mover o arquivo. Verifique permissões da pasta.";
        }
    } else {
        echo "Nenhum arquivo foi enviado ou ocorreu um erro no upload.";
    }
}

$con->close();
?>
