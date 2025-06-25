<?php include 'includes/header.php'; ?>
        <style>
      .table {
     border-bottom-color: black;
     border-radius: 0% !important;
 }
 .card-body{
     border: 1px solid black;
     border-collapse: collapse; 
 }
 .card {
     border: none;
     box-shadow: none !important;
     width: 500px;
 }
 table tr:last-child td {
border-bottom: none;
 }
 .btn{
     font-size: small;
 }
 </style>
    <div class="container container-fluid my-3 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-sm">
                        <tr><strong  style="margin-left: 35%;">File Download</strong></tr>
                        <hr>
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>File Name</th>
                                <th class="text-end px-3">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td>1</td>
                                <td>Fee Structure</td>
                                <td class="text-end px-3"><a href="assets/downloads/Fee Structure.pdf" class="btn btn-danger rounded-0 p-1" download>Download</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Application Form Sample</td>
                                <td  class="text-end px-3"><a href="assets/downloads/XJMU Application Form Sample. 2024.pdf" class="btn btn-danger rounded-0 p-1" download>Download</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Application Form</td>
                                <td  class="text-end px-3"><a href="assets/downloads/XJMU Application Form. Sep 2024.doc" class="btn btn-danger rounded-0 p-1" download>Download</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Physical Form</td>
                                <td  class="text-end px-3"><a href="assets/downloads/Physical Form.docx" class="btn btn-danger rounded-0 p-1" download>Download</a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Introduction Book Manual</td>
                                <td  class="text-end px-3"><a href="assets/downloads/Xinjiang Medical University PPT-2024 [Read-Only].pdf" class="btn btn-danger rounded-0 p-1" download>Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>