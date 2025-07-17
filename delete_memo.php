<?php
require 'connect/connect.php'; // Or your DB connection
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    if (!$id) {
        echo json_encode(['success' => false, 'message' => 'Invalid memo ID.']);
        exit;
    }

    $stmt = dbConnect()->prepare("UPDATE memos SET archived = 1 WHERE id = ?");
    if ($stmt->execute([$id])) {
        echo json_encode(['success' => true, 'message' => 'Memo deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete memo.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
