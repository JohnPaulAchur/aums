<?php
session_start();
include 'connect/connect.php'; // Your DB connection
if ($_SESSION['urole'] !== 'Admin') exit;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = dbConnect()->prepare("UPDATE complain SET status = 'Resolved' WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
}
?>
