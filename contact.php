<?php include 'includes/header.php'; ?>
        <style>
      .contact-header {
          margin-top: 5px;
          margin-left: 5%;
          max-width: 90%;
          padding: 10px;
          text-align: center;
      }
      .contact-section {
          padding: 40px 20px;
      }
      .contact-info {
          background: #f8f9fa;
          padding: 20px 20px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .contact-form {
          background: #ffffff;
          padding: 5px 10px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
  </style>
     <!-- Header Section -->
     <div class="contact-header rounded-pill">
      <h1>Contact Xinjiang Medical University</h1>
      <p>We are here to assist you with any queries or concerns.</p>
  </div>

  <!-- Main Contact Section -->
  <div class="container contact-section my-2 rounded-3" style="background-color: gray;">
      <div class="row">
          <!-- Contact Information -->
          <div class="col-md-6 col-sm-12 mb-4">
              <div class="contact-info">
                  <h4>Contact Information</h4>
                  <p><strong>Address:</strong></p>
                  <p>567 Xinyi Road,<br>Urumqi, Xinjiang, China</p>
                  <p><strong>Phone:</strong> +8618624016307</p>
                  <p><strong>Email:</strong> <a href="mailto:drayaz@cas.moe">drayaz@cas.moe</a></p>
                  <p><strong>Working Hours:</strong><br>Monday to Friday: 9:00 AM - 5:00 PM<br>Saturday & Sunday: Closed</p>
                  <p><strong>Follow Us:</strong></p>
                  <div class="d-flex gap-2">
                      <a href="https://www.facebook.com/XinjiangMedicalUniversity" class="btn btn-outline-primary">Facebook</a>
                      <a href="#" class="btn btn-outline-info">Twitter</a>
                      <a href="https://www.instagram.com/studyatxjmu/" class="btn btn-outline-danger">Instagram</a>
                  </div>
              </div>
          </div>

          <!-- Contact Form -->
          <div class="col-md-6">
              <div class="contact-form">
                  <h4>Send Us a Message</h4>
                  <form>
                      <div class="mb-3">
                          <label for="name" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email Address</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                      </div>
                      <div class="mb-3">
                          <label for="subject" class="form-label">Subject</label>
                          <input type="text" class="form-control" id="subject" placeholder="Enter the subject" required>
                      </div>
                      <div class="mb-3">
                          <label for="message" class="form-label">Your Message</label>
                          <textarea class="form-control" id="message" rows="5" placeholder="Write your message here" required></textarea>
                      </div>
                      <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

    <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>

