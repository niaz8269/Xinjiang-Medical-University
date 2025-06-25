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

// Check if application is already submitted
$stmt = $conn->prepare("SELECT status FROM applications WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0 && $result->fetch_assoc()['status'] === 'submitted') {
    die(json_encode(['status' => 'error', 'message' => 'Application is already submitted and cannot be modified']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST request received");

    $section = $_POST['section'] ?? '';
    $formData = $_POST['form_data'] ?? [];

    try {
        $conn->begin_transaction();

        switch ($section) {
            case 'personal_details':
                 // Save personal details
                $stmt = $conn->prepare("INSERT INTO personal_details 
                    (user_id, given_name, surname, date_of_birth, gender, marital_status, 
                    country_of_birth, city_of_birth, religion, nationality, native_language, 
                    passport_no, passport_expiry, personal_tel, personal_email, alternate_email, 
                    wechat_id, skype_no, personal_address, emergency_contact_name, 
                    emergency_contact_gender, relationship, emergency_tel, emergency_email, 
                    emergency_address) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                    given_name = VALUES(given_name), surname = VALUES(surname), 
                    date_of_birth = VALUES(date_of_birth), gender = VALUES(gender), 
                    marital_status = VALUES(marital_status), country_of_birth = VALUES(country_of_birth), 
                    city_of_birth = VALUES(city_of_birth), religion = VALUES(religion), 
                    nationality = VALUES(nationality), native_language = VALUES(native_language), 
                    passport_no = VALUES(passport_no), passport_expiry = VALUES(passport_expiry), 
                    personal_tel = VALUES(personal_tel), personal_email = VALUES(personal_email), 
                    alternate_email = VALUES(alternate_email), wechat_id = VALUES(wechat_id), 
                    skype_no = VALUES(skype_no), personal_address = VALUES(personal_address), 
                    emergency_contact_name = VALUES(emergency_contact_name), 
                    emergency_contact_gender = VALUES(emergency_contact_gender), 
                    relationship = VALUES(relationship), emergency_tel = VALUES(emergency_tel), 
                    emergency_email = VALUES(emergency_email), emergency_address = VALUES(emergency_address)");
                
                $stmt->bind_param("issssssssssssssssssssssss", 
                    $userId,
                    $formData['given_name'],
                    $formData['surname'],
                    $formData['date_of_birth'],
                    $formData['gender'],
                    $formData['marital_status'],
                    $formData['country_of_birth'],
                    $formData['city_of_birth'],
                    $formData['religion'],
                    $formData['nationality'],
                    $formData['native_language'],
                    $formData['passport_no'],
                    $formData['passport_expiry'],
                    $formData['personal_tel'],
                    $formData['personal_email'],
                    $formData['alternate_email'],
                    $formData['wechat_id'],
                    $formData['skype_no'],
                    $formData['personal_address'],
                    $formData['emergency_contact_name'],
                    $formData['emergency_contact_gender'],
                    $formData['relationship'],
                    $formData['emergency_tel'],
                    $formData['emergency_email'],
                    $formData['emergency_address']
                );
                break;
                
            case 'education_background':
                 // Save education background
                $stmt = $conn->prepare("INSERT INTO education_background 
                    (user_id, education_type, education_level, field_of_study, 
                    country_of_institute, institute_name, qualification, year_from, year_to) 
                    VALUES (?, 'highest', ?, ?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                    education_level = VALUES(education_level), 
                    field_of_study = VALUES(field_of_study), 
                    country_of_institute = VALUES(country_of_institute), 
                    institute_name = VALUES(institute_name), 
                    qualification = VALUES(qualification), 
                    year_from = VALUES(year_from), 
                    year_to = VALUES(year_to)");
                
                $stmt->bind_param("isssssss", 
                    $userId,
                    $formData['education_level'],
                    $formData['field_of_study'],
                    $formData['country_of_institute'],
                    $formData['institute_name'],
                    $formData['qualification'],
                    $formData['year_from'],
                    $formData['year_to']
                );
                break;
                
            case 'documents':
                 // Handle file uploads
                $documentId = $formData['document_id'];
                $fileName = $_FILES['document_file']['name'];
                $fileTmpName = $_FILES['document_file']['tmp_name'];
                $fileContent = file_get_contents($fileTmpName);
                
                $stmt = $conn->prepare("INSERT INTO application_documents 
                    (user_id, document_type_id, document_name, is_mandatory, file_name, file_content) 
                    VALUES (?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                    file_name = VALUES(file_name), 
                    file_content = VALUES(file_content)");
                
                $isMandatory = (in_array($documentId, [1, 2, 3, 5, 8, 15])) ? 1 : 0;
                $documentName = $documentData[$documentId - 1]['name'];
                
                $stmt->bind_param("iisiss", 
                    $userId,
                    $documentId,
                    $documentName,
                    $isMandatory,
                    $fileName,
                    $fileContent
                );
                break;
                
            default:
                throw new Exception("Invalid section");
        }

        if (!$stmt->execute()) {
            throw new Exception("Failed to save data");
        }

        // Update application status to draft if not exists
        $stmt = $conn->prepare("INSERT INTO applications (user_id, status) VALUES (?, 'draft')
                              ON DUPLICATE KEY UPDATE updated_at = NOW()");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $conn->commit();
        $response = ['status' => 'success', 'message' => 'Data saved successfully'];
    } catch (Exception $e) {
        $conn->rollback();
        $response = ['status' => 'error', 'message' => $e->getMessage()];
        error_log("Save error: " . $e->getMessage());
    }
}

echo json_encode($response);
?>