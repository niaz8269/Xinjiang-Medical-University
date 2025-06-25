<?php include 'includes/header.php'; ?>
        <style>
        .table-container { display: none; }
        .table-container.active { display: block; }
        .btn.active { background-color: #3B71CA; color: white; border-color: #3B71CA; }
    </style>
    <div class="container py-5">
        <h1 class="text-center">Programs</h1>
        <p class="text-center">Starred programs are entitled to admit Chinese Government Scholarship students</p>
        
        <div class="text-center mb-4">
            <button class="btn btn-outline-primary active rounded-5" onclick="showTable('bachelor', this)">Bachelor</button>
            <button class="btn btn-outline-primary rounded-5" onclick="showTable('master', this)">Master</button>
            <button class="btn btn-outline-primary rounded-5" onclick="showTable('doctoral', this)">Doctoral</button>
            <button class="btn btn-outline-primary rounded-5" onclick="showTable('non-degree', this)">Non-degree</button>
        </div>

        <div id="bachelor" class="table-container active">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>PROGRAM</th>
                            <th>DURATION</th>
                            <th>Intake</th>
                            <th>TUITION FEE</th>
                            <th>INSTRUCTION LANGUAGE</th>
                        </tr>
                    </thead>
                    <tbody id="bachelor-programs"></tbody>
                </table>
            </div>
        </div>

        <div id="master" class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>PROGRAM</th>
                            <th>DURATION</th>
                            <th>Intake</th>
                            <th>TUITION FEE</th>
                            <th>INSTRUCTION LANGUAGE</th>
                        </tr>
                    </thead>
                    <tbody id="master-programs"></tbody>
                </table>
            </div>
        </div>

        <div id="doctoral" class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>PROGRAM</th>
                            <th>DURATION</th>
                            <th>Intake</th>
                            <th>TUITION FEE</th>
                            <th>INSTRUCTION LANGUAGE</th>
                        </tr>
                    </thead>
                    <tbody id="doctoral-programs"></tbody>
                </table>
            </div>
        </div>

        <div id="non-degree" class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>PROGRAM</th>
                            <th>DURATION</th>
                            <th>Intake</th>
                            <th>TUITION FEE</th>
                            <th>INSTRUCTION LANGUAGE</th>
                        </tr>
                    </thead>
                    <tbody id="non-degree-programs"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const programData = [
            {
                title: "bachelor-programs",
                rows: [
                { course: "Bachelor of Medicine & Bachelor of Surgery (MBBS)", duration: "6 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English" },
                { course: "Clinical Medicine", duration: "6 years", intake: "Sept/Oct", fee: "¥ 20,000", language: "Chinese" },
                { course: "Acupuncture and Moxibustion", duration: "5 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Clinical of Chinese and Western Medicine", duration: "5 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Pharmacy", duration: "5 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Stomatology", duration: "5 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Preventive Medicine", duration: "5 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                ]
            },
            {
                title: "master-programs",
                rows: [
                { course: "Nutrition and Food Hygiene", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Health Toxicology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Epidemiology and Health Statistics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Occupational and Environmental Health", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Child, Adolescent and Maternal Health", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Stomatology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Stomatology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pharmacy", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pharmacology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Human Anatomy Histology & Embryology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pathology & Pathophysiology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Emergency Medicine (Critical Care)", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Ultrasound Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Intensive Care Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Radiation Oncology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Radiology Imaging", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pediatric Surgery", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Osteology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "General Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Pathology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Nuclear Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Genetics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Internal Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Paediatrics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Geratology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Neurology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Psychiatry and Psychohygiene", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Dermatology and Venereology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Diagnostics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Surgery", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Gynaecology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Ophthalmology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Otorhinolaryngology (ear-nose-throat medicine)", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Oncology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Rehabilitation & Physiotherapy", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Sports Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Anaesthesiology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Emergency Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Acupuncture and Moxibustion", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                ]
            },
            {
                title: "doctoral-programs",
                rows: [
                { course: "Nutrition and Food Hygiene", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Health Toxicology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Epidemiology and Health Statistics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Occupational and Environmental Health", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Child, Adolescent and Maternal Health", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "Chinese" },
                { course: "Clinical Stomatology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Stomatology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pharmacology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Emergency Medicine (Critical Care)", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Ultrasound Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Intensive Care Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Radiation Oncology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Radiology Imaging", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Pediatric Surgery", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Osteology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "General Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Pathology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Nuclear Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Genetics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Internal Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },{ course: "Clinical Stomatology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Paediatrics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Geratology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Neurology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Dermatology and Venereology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Psychiatry and Psychohygiene", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinical Diagnostics", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Surgery", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Gynaecology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Ophthalmology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Otorhinolaryngology (ear-nose-throat medicine)", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Oncology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Rehabilitation & Physiotherapy", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Sports Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Emergency Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Anaesthesiology", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                { course: "Clinics of Integration of Chinese and Western Medicine", duration: "3 years", intake: "Sept/Oct", fee: "¥ 30,000", language: "English/Chinese" },
                ]
            },
            {
                title: "non-degree-programs",
                rows: [
                    { course: "Chinese language", duration: "1 year", intake: "March/Sept", fee: "¥ 12,000", language: "Bilingual" },
                    { course: "Chinese language", duration: "6 months", intake: "March/Sept", fee: "¥ 6,000", language: "Bilingual" },
                ]
            }
        ];

        programData.forEach(program => {
            const tableBody = document.getElementById(program.title);
            program.rows.forEach(row => {
                const newRow = `<tr>
                    <td>${row.course}</td>
                    <td>${row.duration}</td>
                    <td>${row.intake}</td>
                    <td>${row.fee}</td>
                    <td>${row.language}</td>
                </tr>`;
                tableBody.innerHTML += newRow;
            });
        });

        function showTable(id, button) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.classList.remove('active'));
            document.getElementById(id).classList.add('active');

            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }
    </script>
      <?php include 'includes/chatbot.php'; ?>
    <?php include 'includes/socials.php'; ?>
    <?php include 'includes/footer.php'; ?>