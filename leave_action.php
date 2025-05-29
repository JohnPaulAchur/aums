<?php
// session_start();
require_once 'connect/connect.php'; 

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['urole'] !== 'Admin') {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit;
    }

    $id = intval($_POST['id']);
    $action = $_POST['action'];

    if (!in_array($action, ['Approved', 'Declined'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid status']);
        exit;
    }

    $stmt = dbConnect()->prepare("UPDATE leave_app SET status = ? WHERE id = ?");
    if ($stmt->execute([$action, $id])) {
        echo json_encode(['status' => 'success', 'message' => "Leave status updated to $action"]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
    }
}
