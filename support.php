<?php include 'includes/header.php'; ?>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .section-title {
            margin-top: 30px;
            font-weight: bold;
            font-size: 2rem;
            color: black;
            text-align: center;
        }
        .card-hover:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }
        .feature-card {
            transition: transform 0.3s ease-in-out;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.5rem;
            }
            .container {
                padding: 15px;
            }
        }
    </style>
    <div class="container py-5">
        <h2 class="section-title">Dedicated Support for International Students</h2>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <img src="assets/images/iso.webp" alt="International Student Office" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-globe"></i> International Student Office</h5>
                        <p class="card-text">Assists with visa procedures, academic guidance, and personal matters to ensure a smooth transition for international students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <img src="assets/images/orientation.webp" alt="Orientation Programs" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle"></i> Orientation Programs</h5>
                        <p class="card-text">Comprehensive orientation sessions to familiarize international students with campus life, academic policies, and cultural norms.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h2 class="section-title">Health and Wellness</h2>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <img src="assets/images/clinic.webp" alt="On-campus Clinic" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clinic-medical"></i> On-campus Clinic</h5>
                        <p class="card-text">Provides medical services and health consultations to address students' health concerns promptly.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <img src="assets/images/counselling.webp" alt="Counseling Services" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-md"></i> Counseling Services</h5>
                        <p class="card-text">Offers psychological support and counseling to promote mental well-being among students.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h2 class="section-title">Career Counseling</h2>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-briefcase"></i> Career Guidance</h5>
                        <p class="card-text">Provides advice on internships, residencies, and career pathways to help students achieve their professional goals.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-handshake"></i> Job Placement Assistance</h5>
                        <p class="card-text">Assists students in finding suitable job opportunities through workshops and networking events.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h2 class="section-title">Language Assistance</h2>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-sm-12">
                <div class="card feature-card p-3 h-100">
                    <img src="assets/images/language.webp" alt="Chinese Language Courses" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-language"></i> Chinese Language Courses</h5>
                        <p class="card-text">Comprehensive courses designed to help international students master the Chinese language for better integration into local life and academics.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>
