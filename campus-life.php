<?php include 'includes/header.php'; ?>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .hero-section {
            background-image: url('assets/images/xjmu34.webp') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-section h1 {
            z-index: 1;
            font-size: 3rem;
            text-transform: uppercase;
            animation: fadeInDown 1s;
        }

        .card-hover:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        .section-title {
            margin-top: 30px;
            font-weight: bold;
            font-size: 2rem;
            color: black;
        }

        .feature-card {
            transition: transform 0.3s ease-in-out;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            .container{
                padding: 0px !important;
                margin: 0px !important;
            }
        }
    </style>
    <div class="hero-section" style="background-image: url(assets/images/bigbanner03.webp); background-size: cover;">
        <h1 class="animate__animated animate__fadeInDown text-white">Life at Xinjiang Medical University</h1>
    </div>

    <div class="container py-3">
        <h2 class="section-title text-center">Campus Facilities</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card feature-card p-3">
                    <img src="assets/images/xjmu43.webp" alt="Classrooms" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Modern Classrooms</h5>
                        <p class="card-text">State-of-the-art classrooms equipped with the latest technology to enhance learning.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-3">
                    <img src="assets/images/xjmu21.webp" alt="Sports Complex" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mt-3">Sports Complex</h5>
                        <p class="card-text">A fully equipped sports complex with facilities for various indoor and outdoor games.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-3">
                    <img src="assets/images/library.webp" alt="Library" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mt-5">Extensive Library</h5>
                        <p class="card-text mt-4">A vast library with resources to support students' academic and research needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <h2 class="section-title text-center">Student Societies</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card feature-card p-3">
                    <img src="assets/images/xjmu40.webp" alt="Cultural Club" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mt-3">Cultural Clubs</h5>
                        <p class="card-text mt-3">Join cultural clubs to celebrate diversity and build connections with fellow students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card feature-card p-3">
                    <img src="assets/images/art.webp" alt="Art Club" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Art and Drama Societies</h5>
                        <p class="card-text">Explore your creative side through art and drama societies at the university.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <h2 class="section-title text-center">Exploring Urumqi</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card feature-card p-3">
                    <img src="assets/images/localbazar.webp" alt="Local Market" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Vibrant Markets</h5>
                        <p class="card-text">Discover the vibrant local markets offering a glimpse into Xinjiang’s culture.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-1">
                    <img src="assets/images/mountains.webp" alt="Mountains" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Scenic Mountains</h5>
                        <p class="card-text">Explore the stunning mountain ranges surrounding Urumqi for outdoor adventures.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-1">
                    <img src="assets/images/historical.webp" alt="Historical Landmark" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Historical Landmarks</h5>
                        <p class="card-text">Visit historical landmarks that tell the rich story of Xinjiang’s heritage.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <h2 class="section-title text-center">Cultural Activities</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card feature-card p-3">
                    <img src="assets/images/festivals.webp" alt="Festival Celebration" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Festival Celebrations</h5>
                        <p class="card-text">Participate in vibrant festivals and experience Xinjiang’s unique traditions and culture.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card feature-card p-3">
                    <img src="assets/images/cultural-workshops.webp" alt="Cultural Workshop" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Cultural Workshops</h5>
                        <p class="card-text">Engage in workshops to learn about the heritage, language, and art of Xinjiang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>