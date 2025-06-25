<?php
session_start();
require_once 'db_connect.php';

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die(json_encode(['status' => 'error', 'message' => 'User not logged in']));
}

$userId = $_SESSION['user_id'];
$response = ['status' => 'error', 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn->begin_transaction();

        // 1. Check if all mandatory fields are completed
        $requiredTables = ['personal_details', 'education_background'];
        foreach ($requiredTables as $table) {
            $stmt = $conn->prepare("SELECT COUNT(*) as count FROM $table WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            
            if ($result['count'] == 0) {
                throw new Exception("Please complete all required sections before submitting");
            }
        }

        // 2. Check if all mandatory documents are uploaded
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM application_documents 
                               WHERE user_id = ? AND is_mandatory = 'Yes'");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        
        if ($result['count'] < 6) { // Adjust based on your mandatory docs
            throw new Exception("Please upload all mandatory documents before submitting");
        }

        // 3. Update application status
        $stmt = $conn->prepare("INSERT INTO applications (user_id, status, submitted_at) 
                               VALUES (?, 'submitted', NOW())
                               ON DUPLICATE KEY UPDATE 
                               status = VALUES(status), 
                               submitted_at = VALUES(submitted_at)");
        $stmt->bind_param("i", $userId);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to submit application");
        }

        $conn->commit();
        $response = ['status' => 'success', 'message' => 'Application submitted successfully'];
    } catch (Exception $e) {
        $conn->rollback();
        $response = ['status' => 'error', 'message' => $e->getMessage()];
    }
}

echo json_encode($response);
?>