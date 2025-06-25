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
    <div class="container">
      <h2 class="text-center my-4">Xinjiang Medical University Fee Structure</h2>
      <div class="table-responsive">
          <table class="table table-bordered table-striped ms-md-5 ms-lg-5 ms-sm-0 text-center align-middle">
                  <thead>
                      <tr>
                          <th class="bg-dark text-white">Education category</th>
                          <th class="bg-dark text-white">Level</th>
                          <th class="bg-dark text-white">Major</th>
                          <th class="bg-dark text-white">Tuition (RMB)</th>
                          <th class="bg-dark text-white">Language of instruction</th>
                          <th class="bg-dark text-white">Length of schooling</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Undergraduates -->
                      <tr>
                          <td rowspan="5"><strong>Undergraduates</strong></td>
                          <td>Clinical Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year (For English)</td>
                          <td>English</td>
                          <td>6 years</td>
                      </tr>
                      <tr>
                          <td>Traditional Chinese Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>20,000/year (For Chinese)</td>
                          <td>Chinese</td>
                          <td>5 years</td>
                      </tr>
                      <tr>
                          <td>Clinical Discipline of Chinese and Western Integrative Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>20,000/year (For Chinese)</td>
                          <td>Chinese</td>
                          <td>5 years</td>
                      </tr>
                      <tr>
                          <td>Stomatology</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>20,000/year (For Chinese)</td>
                          <td>Chinese</td>
                          <td>5 years</td>
                      </tr>
                      <tr>
                          <td>Pharmacy</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>20,000/year (For Chinese)</td>
                          <td>Chinese</td>
                          <td>4 years</td>
                      </tr>
      
                      <!-- Postgraduates -->
                      <tr>
                          <td rowspan="5"><strong>Degree Education</strong></td>
                          <td>Clinical Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Public Health and Preventive Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Pharmacy</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Stomatology</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Traditional Chinese Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
      
                      <!-- PhD Students -->
                      <tr>
                          <td rowspan="5"><strong>PhD Students</strong></td>
                          <td>Clinical Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Public Health and Preventive Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Pharmacy</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Stomatology</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
                      <tr>
                          <td>Traditional Chinese Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine</td>
                          <td>30,000/year</td>
                          <td>Chinese/English</td>
                          <td>3 years</td>
                      </tr>
      
                      <!-- Non-degree education -->
                      <tr>
                          <td rowspan="4"><strong>Non-Degree Education</strong></td>
                          <td>Traditional Chinese Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine, Intermediate Course</td>
                          <td>15,000/6 months</td>
                          <td>Chinese</td>
                          <td>6 months</td>
                      </tr>
                      <tr>
                          <td>Traditional Chinese Medicine</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine, Advanced Course</td>
                          <td>23,000/year</td>
                          <td>Chinese</td>
                          <td>1 year</td>
                      </tr>
                      <tr>
                          <td>Medical Technology Training</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine, Advanced Course</td>
                          <td>15,000/6 months</td>
                          <td>Chinese/English</td>
                          <td>6 months/1 year</td>
                      </tr>
                      <tr>
                          <td>Chinese/Medical Chinese</td>
                          <td>Acupuncture and Moxibustion and Tuina of Chinese Medicine, Advanced Course</td>
                          <td>12,000/year</td>
                          <td>Chinese</td>
                          <td>1 year</td>
                      </tr>
      
                      <!-- Accommodation Fee -->
                      <tr>
                          <td colspan="5" rowspan="15"><strong>Accommodation fee</strong></td>
                      </tr>
                      <tr>    
                          <td>Double room: 4,500/year</td>
                      </tr>
                      <tr>
                          <td>Single room: 11,000/year</td>
                      </tr>
                      <tr>
                          <td>Water fee and electricity fee shall be borne by students.</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>