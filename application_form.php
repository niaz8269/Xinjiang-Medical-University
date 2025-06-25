<?php
session_start();
include 'includes/header.php';

// Check if application is submitted
$isSubmitted = false;
if (isset($_SESSION['user_id'])) {
    require_once 'db_connect.php';
    $stmt = $conn->prepare("SELECT status FROM applications WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $appStatus = $result->fetch_assoc();
    $isSubmitted = ($appStatus['status'] ?? '') === 'submitted';
}

// Get user data
$userData = [];
if (isset($_SESSION['user_id'])) {
    $response = file_get_contents(__DIR__ . '/get_data.php');
    $userData = json_decode($response, true) ?? [];
}

// Hide buttons if submitted
if ($isSubmitted) {
    echo '<style>
        .verifySave, #finalSubmit { display: none !important; }
        .form-control, .form-select { background-color: #f8f9fa !important; }
    </style>';
}
?>

<script>
const userId = <?php echo json_encode($_SESSION['user_id'] ?? null); ?>;
const isSubmitted = <?php echo json_encode($isSubmitted); ?>;

document.addEventListener('DOMContentLoaded', function() {
    if (isSubmitted) {
        // Make all form fields readonly
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.readOnly = true;
            element.disabled = true;
        });
        
        // Change submit button text and disable it
        const finalSubmit = document.getElementById('finalSubmit');
        if (finalSubmit) {
            finalSubmit.textContent = 'Application Submitted';
            finalSubmit.disabled = true;
        }
    }
});
</script>

 <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .collapsable-section {
      margin-bottom: 15px;
    }
    .collapse-btn {
      width: 100%;
      text-align: left;
      padding: 5px;
      font-size: 16px;
      background-color: #f1f1f1;
      border: none;
      cursor: pointer;
    }
    .collapse-btn .plus, .collapse-btn .minus {
      font-size: 20px;
      margin-right: 10px;
    }
    .content {
      padding: 30px;
      margin-top: 5px;
    }
    .btn-custom {
      width: 100%;
      margin-top: 10px;
      margin-bottom: 10px !important;
      padding: 10px;
      font-size: 16px;
    }
    input, select, textarea, button{
      border-radius: 0% !important;
    }
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ccc;
    width: 100%; /* Matches the input width */
    z-index: 1000;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .dropdown-item {
    padding: 8px;
    cursor: pointer;
    }
    .dropdown-item:hover {
        background-color: #f1f1f1;
    }
    .dotted-border {
  border-top: 2px dotted #ccc;
  border-bottom: 2px dotted #ccc; 
  padding: 10px; 
  text-align: center;
}           
  </style>
<div class="container">
<!-- Collapsible Section 1: Personal Details -->
<div class="collapsable-section">
      <button class="collapse-btn">
        <span class="plus">+</span>
        <span class="minus" style="display:none;">-</span>
        Personal Details
      </button>
      <div class="content" style="display:none;">
<!-- Personal Information Section -->
<form id="personalDetailsForm" class="my-3" method="POST" action="save_data.php">
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Given Name (Passport) <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[given_name]" placeholder="Mandatory" required value="<?= $userData['given_name'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Surname (Passport) <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[surname]" placeholder="Mandatory" required value="<?= $userData['surname'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Date of Birth <span style="color: red;">*</span></label>
            <input type="date" class="form-control mandatory" name="form_data[date_of_birth]" required value="<?= $userData['date_of_birth'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Gender <span style="color: red;">*</span></label>
            <select class="form-select mandatory" name="form_data[gender]" required>
                <option value="">Select</option>
                <option value="Male" <?= ($userData['gender'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= ($userData['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= ($userData['gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Marital Status <span style="color: red;">*</span></label>
            <select class="form-select mandatory" name="form_data[marital_status]" required>
                <option value="">Select</option>
                <option value="Married" <?= ($userData['marital_status'] ?? '') === 'Married' ? 'selected' : '' ?>>Married</option>
                <option value="Single" <?= ($userData['marital_status'] ?? '') === 'Single' ? 'selected' : '' ?>>Single</option>
                <option value="Other" <?= ($userData['marital_status'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="col-md-4 position-relative">
            <label class="form-label">Country of Birth <span style="color: red;">*</span></label>
            <input type="text" id="countryInput" class="form-control mandatory" name="form_data[country_of_birth]" placeholder="Select or type a country" required value="<?= $userData['country_of_birth'] ?? '' ?>">
            <div id="countryDropdown" class="dropdown-content"></div>
        </div>
        <div class="col-md-4">
            <label class="form-label">City of Birth <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[city_of_birth]" placeholder="Mandatory" required value="<?= $userData['city_of_birth'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Religion <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[religion]" placeholder="Mandatory" required value="<?= $userData['religion'] ?? '' ?>">
        </div>
        <div class="col-md-6 position-relative">
            <label class="form-label">Nationality <span style="color: red;">*</span></label>
            <input type="text" id="nationalityInput" class="form-control mandatory" name="form_data[nationality]" placeholder="Select or type a nationality" required value="<?= $userData['nationality'] ?? '' ?>">
            <div id="nationalityDropdown" class="dropdown-content"></div>
        </div>
        <div class="col-md-6 position-relative">
            <label class="form-label">Native Language<span style="color: red;">*</span></label>
            <input type="text" id="nativeLanguageInput" class="form-control mandatory" name="form_data[native_language]" placeholder="Select or type a language" required value="<?= $userData['native_language'] ?? '' ?>">
            <div id="nativeLanguageDropdown" class="dropdown-content"></div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Passport No. <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[passport_no]" placeholder="Mandatory" required value="<?= $userData['passport_no'] ?? '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Date of Expiration</label>
            <input type="date" class="form-control" name="form_data[passport_expiry]" value="<?= $userData['passport_expiry'] ?? '' ?>">
        </div>
        <p class="note" style="color: red;">Note: The passport information you have provided will be used for admission documents (visa application documents), please ensure the accuracy of the information. If the validity period of the currently held passport is less than 12 months (calculated from the expected start date of study), please renew the passport and use it to complete the scholarship application. Applicants with no Given Name or Surname on the passport, please input special character * as substitution.</p>
    </div>

    <p class="mt-4 text-center dotted-border">Personal Contact Information</p>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Tel<span style="color: red;">*</span></label>
            <input type="number" class="form-control mandatory" name="form_data[personal_tel]" placeholder="Mandatory" required value="<?= $userData['personal_tel'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Email<span style="color: red;">*</span></label>
            <input type="email" class="form-control mandatory" name="form_data[personal_email]" placeholder="Mandatory" required value="<?= $userData['personal_email'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Alternate Email<span style="color: red;">*</span></label>
            <input type="email" class="form-control mandatory" name="form_data[alternate_email]" placeholder="Mandatory" required value="<?= $userData['alternate_email'] ?? '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">WeChat ID<span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[wechat_id]" placeholder="Mandatory" required value="<?= $userData['wechat_id'] ?? '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">SKYPE No<span style="color: red;">*</span></label>
            <input type="number" class="form-control mandatory" name="form_data[skype_no]" placeholder="Mandatory" required value="<?= $userData['skype_no'] ?? '' ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Address <span style="color: red;">*</span></label>
            <textarea class="form-control mandatory" name="form_data[personal_address]" rows="3" placeholder="Mandatory" required><?= $userData['personal_address'] ?? '' ?></textarea>
        </div>
    </div>

    <p class="mt-4 text-center my-3 dotted-border">Emergency Contact Information</p>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Emergency Contact Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[emergency_contact_name]" placeholder="Mandatory" required value="<?= $userData['emergency_contact_name'] ?? '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Gender <span style="color: red;">*</span></label>
            <select class="form-select mandatory" name="form_data[emergency_contact_gender]" required>
                <option value="">Male</option>
                <option value="Female" <?= ($userData['emergency_contact_gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= ($userData['emergency_contact_gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Relationship to you<span style="color: red;">*</span></label>
            <select class="form-select mandatory" name="form_data[relationship]" required>
                <option value="">Select</option>
                <option value="Parent" <?= ($userData['relationship'] ?? '') === 'Parent' ? 'selected' : '' ?>>Parent</option>
                <option value="Child" <?= ($userData['relationship'] ?? '') === 'Child' ? 'selected' : '' ?>>Child</option>
                <option value="Sibling" <?= ($userData['relationship'] ?? '') === 'Sibling' ? 'selected' : '' ?>>Sibling</option>
                <option value="Spouse" <?= ($userData['relationship'] ?? '') === 'Spouse' ? 'selected' : '' ?>>Spouse</option>
                <option value="Teacher" <?= ($userData['relationship'] ?? '') === 'Teacher' ? 'selected' : '' ?>>Teacher</option>
                <option value="Friend" <?= ($userData['relationship'] ?? '') === 'Friend' ? 'selected' : '' ?>>Friend</option>
                <option value="Other" <?= ($userData['relationship'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Tel <span style="color: red;">*</span></label>
            <input type="text" class="form-control mandatory" name="form_data[emergency_tel]" placeholder="Mandatory" required value="<?= $userData['emergency_tel'] ?? '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Email <span style="color: red;">*</span></label>
            <input type="email" class="form-control mandatory" name="form_data[emergency_email]" placeholder="Mandatory" required value="<?= $userData['emergency_email'] ?? '' ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Address <span style="color: red;">*</span></label>
            <textarea class="form-control mandatory" name="form_data[emergency_address]" rows="3" placeholder="Mandatory" required><?= $userData['emergency_address'] ?? '' ?></textarea>
        </div>
    </div>
    </form>
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary verifySave">Verify and Save</button>
    </div>
<hr>

      </div>
    </div>

    <!-- collapsable educational background section -->
    <div class="collapsable-section" id="education_background">
    <button class="collapse-btn">
        <span class="plus">+</span>
        <span class="minus" style="display:none;">-</span>
        Educational Background
    </button>
    <div class="content" style="display:none;">
        <form id="educationBackgroundForm" class="my-3" method="POST" action="save_data.php">
            <p class="mt-4 text-center my-3 dotted-border">Highest/Current Education</p>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Education Level <span style="color: red;">*</span></label>
                    <select class="form-select mandatory" name="form_data[education_level]" required>
                        <option value="">Select</option>
                        <option value="Senior High School" <?= ($userData['education_level'] ?? '') === 'Senior High School' ? 'selected' : '' ?>>Senior High School</option>
                        <option value="Bachelor's Degree" <?= ($userData['education_level'] ?? '') === "Bachelor's Degree" ? 'selected' : '' ?>>Bachelor's Degree</option>
                        <option value="Master's Degree" <?= ($userData['education_level'] ?? '') === "Master's Degree" ? 'selected' : '' ?>>Master's Degree</option>
                        <option value="Doctoral Degree" <?= ($userData['education_level'] ?? '') === "Doctoral Degree" ? 'selected' : '' ?>>Doctoral Degree</option>
                        <option value="Other" <?= ($userData['education_level'] ?? '') === "Other" ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Field of Study</label>
                    <input type="text" class="form-control" name="form_data[field_of_study]" value="<?= $userData['field_of_study'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Country of Institute <span style="color: red;">*</span></label>
                    <input type="text" class="form-control mandatory" id="instituteInput" name="form_data[country_of_institute]" required value="<?= $userData['country_of_institute'] ?? '' ?>">
                    <div id="instituteDropdown" class="dropdown-content"></div>
                </div>
                <div class="col-md-8 mt-4">
                    <label class="form-label">Institute Name</label>
                    <input type="text" class="form-control" name="form_data[institute_name]" value="<?= $userData['institute_name'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Qualification</label>
                    <input type="text" class="form-control" name="form_data[qualification]" value="<?= $userData['qualification'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Year Attended (From)</label>
                    <input type="date" class="form-control" name="form_data[year_from]" value="<?= $userData['year_from'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Year Attended (To)</label>
                    <input type="date" class="form-control" name="form_data[year_to]" value="<?= $userData['year_to'] ?? '' ?>">
                </div>
            </div> 
            <p class="mt-4 text-center my-3 dotted-border">Other Education</p>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Education Level <span style="color: red;">*</span></label>
                    <select class="form-select mandatory" name="form_data[education_level]" required>
                        <option value="">Select</option>
                        <option value="Senior High School" <?= ($userData['education_level'] ?? '') === 'Senior High School' ? 'selected' : '' ?>>Senior High School</option>
                        <option value="Bachelor's Degree" <?= ($userData['education_level'] ?? '') === "Bachelor's Degree" ? 'selected' : '' ?>>Bachelor's Degree</option>
                        <option value="Master's Degree" <?= ($userData['education_level'] ?? '') === "Master's Degree" ? 'selected' : '' ?>>Master's Degree</option>
                        <option value="Doctoral Degree" <?= ($userData['education_level'] ?? '') === "Doctoral Degree" ? 'selected' : '' ?>>Doctoral Degree</option>
                        <option value="Other" <?= ($userData['education_level'] ?? '') === "Other" ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Field of Study</label>
                    <input type="text" class="form-control" name="form_data[field_of_study]" value="<?= $userData['field_of_study'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Country of Institute <span style="color: red;">*</span></label>
                    <input type="text" class="form-control mandatory" id="instituteInput" name="form_data[country_of_institute]" required value="<?= $userData['country_of_institute'] ?? '' ?>">
                    <div id="instituteDropdown" class="dropdown-content"></div>
                </div>
                <div class="col-md-8 mt-4">
                    <label class="form-label">Institute Name</label>
                    <input type="text" class="form-control" name="form_data[institute_name]" value="<?= $userData['institute_name'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Qualification</label>
                    <input type="text" class="form-control" name="form_data[qualification]" value="<?= $userData['qualification'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Year Attended (From)</label>
                    <input type="date" class="form-control" name="form_data[year_from]" value="<?= $userData['year_from'] ?? '' ?>">
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label">Year Attended (To)</label>
                    <input type="date" class="form-control" name="form_data[year_to]" value="<?= $userData['year_to'] ?? '' ?>">
                </div>
            </div> 
        </form>
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary verifySave">Verify and Save</button>
            </div>
        <hr>
    </div>
</div>


<!-- Collapsible Section 3: Documents -->
<div class="collapsable-section" id="documents_section">
    <button class="collapse-btn">
        <span class="plus">+</span>
        <span class="minus" style="display:none;">-</span>
        Documents
    </button>
    <div class="content" style="display:none;">
    <form id="educationBackgroundForm" class="my-3" method="POST" action="save_data.php">
        <!-- Table -->
        <div class="table-responsive mt-3">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Document List</th>
                        <th>Mandatory or Not</th>
                        <th>Uploaded File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="documentTableBody"></tbody>
            </table>
         </form>
        </div>

        <div class="text-end mt-4">
            <button type="button" class="btn btn-primary verifySave">Verify and Save</button>
        </div>
        <hr>
    </div>
</div>

<script>
const documentData = [
    { id: 1, name: "Photo (Passport Size)", mandatory: "Yes" },
    { id: 1, name: "Passport Home Page", mandatory: "Yes" },
    { id: 7, name: "Passport Visa Page", mandatory: "Yes" },
    { id: 2, name: "Certificates of Highest Education", mandatory: "Yes" },
    { id: 3, name: "Transcripts of Highest Education", mandatory: "Yes" },
    { id: 5, name: "CV", mandatory: "Yes" },
    { id: 4, name: "Study Plan", mandatory: "No" },
    { id: 5, name: "Recommendation Letters", mandatory: "No" },
    { id: 8, name: "Physical Examination Record for Foreigner", mandatory: "Yes" },
    { id: 15, name: "Non-Criminal Record Report", mandatory: "Yes" },
    { id: 9, name: "Papers or Articles Published or to be Published", mandatory: "No" },
    { id: 11, name: "Other Supporting Documents", mandatory: "No" },
    { id: 12, name: "Chinese Language Proficiency Certificate", mandatory: "No" },
    { id: 13, name: "English Language Proficiency Certificate", mandatory: "No" }
];

// Add this before populateTable()
function loadDocumentData() {
    if (!userId) return;

    fetch(`get_data.php?user_id=${userId}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.status === 'success' && data.documents) {
                data.documents.forEach(doc => {
                    const fileNameSpan = document.getElementById(`fileName${doc.document_type_id}`);
                    if (fileNameSpan) {
                        fileNameSpan.textContent = doc.file_name;
                        // Optional: Store the document ID for later reference
                        fileNameSpan.dataset.docId = doc.id;
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error loading documents:', error);
        });
}
// Populate the document table
function populateTable() {
    const tableBody = document.getElementById("documentTableBody");
    tableBody.innerHTML = ""; // Clear previous content

    documentData.forEach(row => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td class="text-center">${row.id}</td>
            <td>${row.name}</td>
            <td class="text-center">${row.mandatory}</td>
            <td><span id="fileName${row.id}" class="file-name"></span></td>
            <td class="text-center">
                <button class="btn btn-light btn-upload" type="button" onclick="document.getElementById('fileInput${row.id}').click()">
                    <i class="fas fa-upload"></i> Upload
                </button>
                <input type="file" name="form_data[document_${row.id}]" id="fileInput${row.id}" style="display: none;" onchange="displayFileName(this, 'fileName${row.id}', ${row.id})">
            </td>
        `;
        tableBody.appendChild(tr);
    });

    // Load document data after table is populated
    if (typeof userId !== 'undefined') {
        loadDocumentData();
    }
}

// Initialize the table on page load
document.addEventListener("DOMContentLoaded", populateTable);
</script>
  <!-- Submit Button -->
  <button type="submit" id="finalSubmit" class="btn btn-primary btn-custom">Submit Application</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Collapsible Sections
    const collapseButtons = document.querySelectorAll('.collapse-btn');
    collapseButtons.forEach(button => {
      button.addEventListener('click', function () {
        const content = this.nextElementSibling;
        const plus = this.querySelector('.plus');
        const minus = this.querySelector('.minus');

        if (content.style.display === 'none') {
          content.style.display = 'block';
          plus.style.display = 'none';
          minus.style.display = 'inline';
        } else {
          content.style.display = 'none';
          plus.style.display = 'inline';
          minus.style.display = 'none';
        }
      });
    });

    // Submit Button
    document.getElementById('finalSubmit').addEventListener('click', function () {
      alert('Application submitted successfully!');
      window.location.href = 'main.php'; 
    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/javascript/apply.js"></script>