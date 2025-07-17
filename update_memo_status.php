<?php
require 'connect/connect.php'; // Or whatever file sets up your DB connection
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $status = $_POST['status'] ?? '';

    $validStatuses = ['Pending', 'Acknowledged', 'Actioned'];

    if (!$id || !in_array($status, $validStatuses)) {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        exit;
    }

    $stmt = dbConnect()->prepare("UPDATE memos SET status = ? WHERE id = ?");
    if ($stmt->execute([$status, $id])) {
        echo json_encode(['success' => true, 'message' => "Memo status updated to '{$status}'"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update memo status.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
