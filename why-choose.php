<?php include 'includes/header.php'; ?>
        <style>
      /* Custom Section Title */
      .section-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #343a40;
        text-transform: uppercase;
        letter-spacing: 1px;
      }
  
      /* Feature Box Styling */
      .feature-item {
        padding: 25px;
        margin-bottom: 20px;
        background-color: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
  
      .feature-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      }
  
      /* Animation on hover */
      .feature-item h4 {
        font-size: 1.3rem;
        font-weight: bold;
        transition: color 0.3s ease;
      }
  
      .feature-item:hover h4 {
        color: #007bff;
      }
  
      .feature-item p {
        color: #495057;
        font-size: 1rem;
      }
  
      /* Custom Animation */
      .fade-in {
        animation: fadeIn 1.5s ease-in;
      }
  
      @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
      }
  
      /* Image Styling */
      .image-box {
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }
  
      .image-box img {
        border-radius: 10px;
        width: 100%;
        height: auto;
      }
  
      /* Responsive Adjustments */
      @media (max-width: 767px) {
        .feature-item {
          padding: 20px;
        }
        .section-title {
          font-size: 1.5rem;
        }
      }
    </style>
  <!-- Main Content -->
  <div class="container py-5 fade-in">
    <h1 class="text-center section-title">Why Choose Xinjiang Medical University?</h1>

    <div class="row">
      <!-- Top Medical Education -->
      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>Top Medical Education</h4>
          <p>XJMU is renowned for its excellence in medical sciences, with state-of-the-art research facilities and an experienced faculty team.</p>
        </div>
      </div>

      <!-- International Recognition -->
      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>International Recognition</h4>
          <p>Programs are accredited and recognized by global medical councils, including WHO and ECFMG, ensuring global career opportunities for graduates.</p>
        </div>
      </div>

      <!-- Cultural Diversity -->
      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4 class="py-2">Cultural Diversity</h4>
          <p>The university hosts a large number of international students, creating a multicultural environment.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Affordable Education -->
      <div class="col-sm-12 col-md-6  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>Affordable Education</h4>
          <p>Compared to many countries, XJMU offers quality medical education at a significantly lower cost.</p>
        </div>
      </div>

      <!-- Safe and Welcoming Environment -->
      <div class="col-sm-12 col-md-6 text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>Safe and Welcoming Environment</h4>
          <p>The campus is located in Urumqi, a vibrant city that combines modern amenities with rich cultural heritage.</p>
        </div>
      </div>

      <section id="acad" class="container-fluid bg-light">
        <div class="container text-center">
          <h3 class="mb-5">Academic Ranking - Xinjiang Medical University</h3>
      
          <div class="row">
            <!-- Ranking 1 -->
            <div class="col-md-4 mb-4">
              <div class="ranking-paragraph border-start border-4 shadow-sm h-100 p-4 feature-item animate__animated animate__fadeInUp">
                <h4><i class="fa fa-trophy"></i> Top Medical University in Xinjiang</h4>
                <p>
                  Ranked as the number one medical university in the region for academic excellence, research, and student satisfaction. With a rich history of medical education, Xinjiang Medical University has been leading the way in producing qualified medical professionals who excel both locally and internationally.
                </p>
              </div>
            </div>
      
            <!-- Ranking 2 -->
            <div class="col-md-4 mb-4">
              <div class="ranking-paragraph border-start border-4 shadow-sm h-100 p-4 feature-item animate__animated animate__fadeInUp">
                <h4><i class="fa fa-globe"></i> Global Medical Ranking</h4>
                <p>
                  Xinjiang Medical University is ranked among the top 500 medical universities worldwide for quality education, cutting-edge research, and innovative healthcare programs. This recognition reflects the university’s commitment to delivering world-class medical education to students from all over the world.
                </p>
              </div>
            </div>
      
            <!-- Ranking 3 -->
            <div class="col-md-4 mb-4">
              <div class="ranking-paragraph border-start border-4 shadow-sm h-100 p-4 feature-item animate__animated animate__fadeInUp">
                <h4><i class="fa fa-medkit"></i> Best Medical School in China</h4>
                <p>
                  Ranked in the top 10% of medical universities in China for its exceptional medical programs, advanced clinical training, and research in the field of health sciences. The university continues to be a leader in medical education and research, shaping the future of healthcare in China and beyond.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- New Section with Images -->
    <div class="row mt-5">
      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="image-box">
          <img src="assets/images/affil-hospt.webp" alt="Hospital Image">
          <h5 class="text-center mt-3">First Affiliated Hospital</h5>
          <p class="text-center">State-of-the-art medical care and clinical training facilities.</p>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="image-box">
          <img src="assets/images/main-image.webp" alt="Campus Image">
          <h5 class="text-center mt-3" style="padding: 3px;">University Campus</h5>
          <p class="text-center">A modern, vibrant campus with all the amenities you need for student life.</p>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="image-box">
          <img src="assets/images/main-image2.webp" alt="Global Network Image">
          <h5 class="text-center mt-3">Global Network</h5>
          <p class="text-center">Be part of a global community with international recognition and partnerships.</p>
        </div>
      </div>
    </div>

    <!-- Another Custom Section with Features -->
    <div class="row mt-5">
      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>Modern Research Facilities</h4>
          <p>Our research centers are equipped with cutting-edge technology to support groundbreaking medical research.</p>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>International Student Support</h4>
          <p>We offer dedicated support services to ensure that international students thrive in their studies and life at XJMU.</p>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4  text-center mb-4">
        <div class="feature-item animate__animated animate__fadeInUp">
          <h4>Student Accommodation</h4>
          <p>Modern on-campus housing options ensure a comfortable living experience for all students.</p>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>