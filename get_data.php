<?php
header('Content-Type: application/json');

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['user_id'])) {
        throw new Exception('User not logged in', 401);
    }

    require_once 'db_connect.php';
    
    $userId = $_SESSION['user_id'];
    $response = ['status' => 'success'];

    // Get application status
    $stmt = $conn->prepare("SELECT status FROM applications WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $appStatus = $stmt->get_result()->fetch_assoc();
    $response['application_status'] = $appStatus['status'] ?? 'draft';

    // Get personal details
    $stmt = $conn->prepare("SELECT * FROM personal_details WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $response['personal_details'] = $stmt->get_result()->fetch_assoc();
    
    // Get education background
    $stmt = $conn->prepare("SELECT * FROM education_background WHERE user_id = ? AND education_type = 'highest'");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $response['education_background'] = $stmt->get_result()->fetch_assoc();
    
    // Get documents
    $stmt = $conn->prepare("SELECT document_type_id, file_name FROM application_documents WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $response['documents'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    $response = [
        'status' => 'error',
        'message' => $e->getMessage(),
        'code' => $e->getCode()
    ];
}

die(json_encode($response));