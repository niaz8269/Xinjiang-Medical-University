<?php include 'includes/header.php'; ?>
        <style>
      @media (max-width: 650px) {
            /* Make the table container scrollable */
            .table-responsive {
                -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on mobile devices */
                overflow-x: auto; /* Allow horizontal scrolling */
                -ms-overflow-style: none;  /* Remove the scrollbar in IE */
            }
            .table td:before {
                /* Add labels before each column for better clarity */
                content: attr(data-label);
                font-weight: bold;
                position: absolute;
                left: 10px;
                top: 10px;
            }
        }
      
        </style>
    <div class="container my-5">
      <!-- Page Header -->
      <header class="text-center mb-4">
          <h1 class="fw-bold" style="font-family: Times New Roman;">Scholarships at Xinjiang Medical University</h1>
          <p class="text-muted">Explore various scholarship opportunities to support your education.</p>
      </header>

      <!-- Scholarships Overview Section -->
      <section class="mb-5">
          <h2 class="" style="font-family: Times New Roman;">Available Scholarships</h2>
          <p>Xinjiang Medical University offers a variety of scholarships to assist students in achieving their educational goals. These scholarships are designed to recognize academic excellence, financial need, and other achievements.</p>
      </section>

      <!-- Scholarships Table -->
      <section class="mb-5">
          <h2 class="" style="font-family: Times New Roman;">Scholarship Details</h2>
          <div class="table-responsive">
              <table class="table table-bordered table-striped align-middle text-center">
                  <thead class="table-dark">
                      <tr>
                          <th>Scholarship Name</th>
                          <th>Eligibility Criteria</th>
                          <th>Benefits</th>
                          <th>Application Deadline</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Chinese Government Scholarship (CSC)</td>
                          <td>Outstanding academic performance and recommendation from the university.</td>
                          <td>Full tuition, accommodation, and monthly stipend.</td>
                          <td>March 31</td>
                      </tr>
                      <tr>
                          <td>Xinjiang Government Scholarship</td>
                          <td>International students with excellent grades and financial need.</td>
                          <td>Partial tuition waiver and living allowance.</td>
                          <td>April 15</td>
                      </tr>
                      <tr>
                          <td>President’s Scholarship</td>
                          <td>Top-performing students in the previous academic year.</td>
                          <td>Full or partial tuition waiver.</td>
                          <td>September 30</td>
                      </tr>
                      <tr>
                          <td>Confucius Institute Scholarship</td>
                          <td>Proficiency in the Chinese language (HSK Level 4 or above).</td>
                          <td>Full tuition and monthly stipend.</td>
                          <td>May 15</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </section>

      <!-- Application Process Section -->
      <section class="mb-5">
          <h2 class="" style="font-family: Times New Roman;">How to Apply</h2>
          <ol class="list-group list-group-numbered">
              <li class="list-group-item">Check the eligibility criteria for the scholarship you wish to apply for.</li>
              <li class="list-group-item">Prepare the necessary documents, including transcripts, recommendation letters, and personal statements.</li>
              <li class="list-group-item">Submit your application through the official university portal or relevant authority.</li>
              <li class="list-group-item">Await the scholarship committee's decision, which will be communicated via email.</li>
          </ol>
          <a href="apply-form.php" class="btn  d-block fst-italic mt-1" style="background: linear-gradient(to bottom, #f80303, #f0bdb6); opacity:0.9;">
            <strong>APPLY NOW</strong>
        </a>
      </section>

      <!-- Contact Information Section -->
      <section>
          <h2 class="" style="font-family: Times New Roman;">Contact Information</h2>
          <p>If you have any questions regarding scholarships, please feel free to contact the International Student Office at Xinjiang Medical University:</p>
          <ul class="list-unstyled">
              <li><strong>Email:</strong>   drayaz@cas.moe</li>
              <li><strong>Phone:</strong>   +8618624016307</li>
              <li><strong>Address:</strong> No. 123, University Avenue, Urumqi, Xinjiang, China</li>
          </ul>
      </section>
  </div>

  <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>
