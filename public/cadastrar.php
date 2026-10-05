<?php

require_once "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];

    $sql = "INSERT INTO brinquedos
            (nome, categoria, descricao, faixa_etaria, preco, quantidade_estoque)
            VALUES (?, ?, ?, ?, ?, ?)";

    $comando = $conexao->prepare($sql);

    $comando->bind_param(
        "ssssdi",
        $nome,
        $categoria,
        $descricao,
        $faixaEtaria,
        $preco,
        $estoque
    );

    $comando->execute();

    $comando->close();
}

header("Location: ../index.php");
exit;