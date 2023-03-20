<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$pratos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($pratos))
{
    echo "Nenhum prato encontrado";
}
?>