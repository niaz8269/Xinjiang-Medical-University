<?php include 'includes/header.php'; ?>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            font-size: 1rem;
            margin-top: 20px;
            color: black;
        }

        ul {
            padding: 0;
        }
        .icon {
            margin-right: 10px;
            color: black;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.2rem;
            }

            ul li {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            ul li {
                font-size: 0.8rem;
            }
        }
    </style>
    <div class="container">
        <h1 id="visa-immig">Student Visa and Immigration</h1>
        <div>
            <p class="section-title">Visa Process:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-file-alt icon"></i> Apply for an X1 (study) visa after receiving the admission letter and JW202 form.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-building icon"></i> Submit the visa application at the nearest Chinese embassy or consulate.</li>
            </ul>
        </div>
        <div>
            <p class="section-title">Required Documents for Visa:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-envelope-open-text icon"></i> Admission letter from XJMU.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-file icon"></i> JW202 form issued by the university.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-passport icon"></i> Passport and recent photographs.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-notes-medical icon"></i> Medical examination report.</li>
            </ul>
        </div>
        <div>
            <p class="section-title">Post-Arrival Registration:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-map-marker-alt icon"></i> Students must register with local authorities within 24 hours of arrival.</li>
            </ul>
        </div>
        <div>
                         <h1 id="pre-arrival">Pre-Arrival Information:</h1>
            <p class="section-title">Travel Arrangements:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-plane icon"></i> Nearest airport: Urumqi Diwopu International Airport (URC).</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-bus icon"></i> University provides airport pickup services for new students.</li>
            </ul>
        </div>
        <div>
            <p class="section-title">Accommodation Options:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-building icon"></i> On-campus dormitories for international students (shared or single rooms).</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-home icon"></i> Guidance for renting off-campus housing if preferred.</li>
            </ul>
        </div>
        <div>
            <p class="section-title">Orientation Programs:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-compass icon"></i> Introduction to the campus, city, and academic policies.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-globe icon"></i> Workshops on adapting to Chinese culture and lifestyle.</li>
            </ul>
        </div>
        <div>
            <p class="section-title">Packing Tips:</p>
            <ul class="list-unstyled">
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-thermometer-half icon"></i> Bring appropriate seasonal clothing for Xinjiang’s diverse climate.</li>
                <li class="p-3 bg-light border-start border-4 border-dark shadow-sm rounded mb-2"><i class="fas fa-file-alt icon"></i> Ensure all academic and travel documents are in order.</li>
            </ul>
        </div>
    </div>
    <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>