<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABONG Program Monitoring System</title>
    <meta charset="UTF-8">
    <meta name="keywords"
        content="LABONG, Program Monitoring System, Projects Dashboard, Activity Details, Consolidated Report, Create Project">
    <meta name="description"
        content="A comprehensive monitoring system for the LABONG program, featuring project dashboards, activity details, consolidated reports, and project creation functionalities.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="assets/images/deped-gentri-logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="app-title">
                <i class="fas fa-chart-line"></i>
                <h1>LABONG Program Monitoring System</h1>
            </div>
            <div class="program-badge">
                <i class="fas fa-layer-group"></i>
                <span>Program: LABONG</span>
            </div>
            <div class="project-controls">
                @if(empty(session()->get('user')))
                <a href="{{route('login')}}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="fas fa-sign-in"></i> Login
                </a>
                @else
                <a href="{{route('logout')}}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="fas fa-sign-out"></i> Logout
                </a>
                @endif
                <button class="btn btn-success" id="export-btn">
                    <i class="fas fa-file-export"></i> Export
                </button>
            </div>
        </header>
        <div class="tabs">
            <div class="tab active" data-target="projects-view">Projects Dashboard</div>
            <div class="tab" data-target="activity-view">Activity Details</div>
            <div class="tab" data-target="consolidated-view">Consolidated Report</div>
            @if(!empty(session()->get('user')))
            <div class="tab" data-target="create-view">Create Project</div>
            @endif
        </div>
        @if(session('success'))
        <div class="alert text-success" style="margin:5px;padding:5px;">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert text-danger" style="margin:5px;padding:5px;">
            {{ session('error') }}
        </div>
        @endif
        <!-- Projects Dashboard View -->

        <div id="projects-view" class="tab-content active">
            <div class="section-title">
                <i class="fas fa-project-diagram"></i>
                <h2>LABONG Program Projects</h2>
            </div>
            <div class="projects-grid">
                <!-- Project Card 1: I-CARE -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-hands-helping"></i> I-CARE</h3>
                        <div class="project-description">
                            Intensifying Curriculum, Assessment, Resources Resulting to Excellence
                        </div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalICare ?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listICare as $activity): ?>
                            <li data-project="icare">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 2: SINULID -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-book"></i> SINULID</h3>
                        <div class="project-description">Schools Initiative in Numeracy and Literacy Development</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalSinulid?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSinulid as $activity): ?>
                            <li data-project="sinulid">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 3: SAGIP -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-life-ring"></i> SAGIP</h3>
                        <div class="project-description">Sikaping Agapan, Gabayan, at Ibalik sa Paaralan</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalSagip?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSagip as $activity): ?>
                            <li data-project="sagip">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 4: LINGAP -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-heart"></i> LINGAP</h3>
                        <div class="project-description">Learners INclusive Growth through Applicable Programs</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalLingap?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listLingap as $activity): ?>
                            <li data-project="lingap">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 5: ISSHED -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-handshake"></i> ISSHED</h3>
                        <div class="project-description">Innovating and Strengthening Support through Holistic
                            Engagement of DepEd Partners</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalIsshed?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listIsshed as $activity): ?>
                            <li data-project="isshed">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 6: UX -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-laptop-code"></i> UX</h3>
                        <div class="project-description">Project User Experience (System Development)</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalUX?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listUX as $activity): ?>
                            <li data-project="ux">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 7: Gentri Saliksik -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-microscope"></i> Gentri Saliksik</h3>
                        <div class="project-description">Research, Continuous Improvement, and Innovations</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalGentri?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listGentri as $activity): ?>
                            <li data-project="gentri">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 8: OK sa DepEd Gentri -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-heartbeat"></i> OK sa DepEd Gentri</h3>
                        <div class="project-description">Oplan Kalusugan sa DepED GenTri</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalOkDepEd?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listOkDepEd as $activity): ?>
                            <li data-project="OkDepEd">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 9: SECURE-PUSO -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-shield-alt"></i> SECURE-PUSO</h3>
                        <div class="project-description">Strengthening and Empowering Children's Rights and Protection
                        </div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalSecurePuso?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSecurePuso as $activity): ?>
                            <li data-project="secure-puso">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 10: DRRM-SAFE -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-hard-hat"></i> DRRM-SAFE</h3>
                        <div class="project-description">Dagling Responde, Ramdam Mo - School Assessment of Facilities
                            and Equipment</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalDRRM?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listDRRM as $activity): ?>
                            <li data-project="drrm-safe">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 11: HUMANE -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-users"></i> HUMANE</h3>
                        <div class="project-description">Holistic Understanding and Management of Abilities and Needs of
                            Employees</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalHumane?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listHumane as $activity): ?>
                            <li data-project="humane">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Project Card 12: QMS/EOMS -->
                <div class="project-card">
                    <div class="project-header">
                        <h3><i class="fas fa-cogs"></i> QMS/EOMS</h3>
                        <div class="project-description">Management and Governance Process and System</div>
                    </div>
                    <div class="project-body">
                        <div class="project-meta">
                            <span><?=$totalQMS?> Activities</span>
                            <span>Overall Progress: 0%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listQMS as $activity): ?>
                            <li data-project="qms-eoms">
                                <a href="" class="no-line"><?=$activity['name']?></a><span
                                    class="activity-progress">0%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Detail View -->
        <div id="activity-view" class="tab-content">

            <div class="hierarchy-nav">

                <span id="back-to-projects">LABONG Program</span>

                <i class="fas fa-chevron-right"></i>

                <span id="current-project">I-CARE</span>

                <i class="fas fa-chevron-right"></i>

                <span id="current-activity">Employee Training Program</span>

            </div>



            <div class="activity-details">

                <div class="section-title">

                    <i class="fas fa-tasks"></i>

                    <h2>Activity: <span class="editable-field" id="activity-name">Employee Training Program</span></h2>

                </div>



                <div class="activity-info-grid">

                    <div class="info-card">

                        <h3>Amount Allocated</h3>

                        <p>₱<span class="editable-field" id="allocated-amount">250,000.00</span></p>

                    </div>

                    <div class="info-card">

                        <h3>Amount Utilized</h3>

                        <p>₱<span class="editable-field" id="utilized-amount">165,000.00</span></p>

                    </div>

                    <div class="info-card">

                        <h3>Target Date</h3>

                        <p><span class="editable-field" id="target-date">June 30, 2023</span></p>

                    </div>

                    <div class="info-card">

                        <h3>Date Conducted</h3>

                        <p><span class="editable-field" id="date-conducted">June 25, 2023</span></p>

                    </div>

                    <div class="info-card">

                        <h3>Budget Source</h3>

                        <p>

                            <select id="budget-source" class="editable-field" style="width: 100%;">

                                <option>MOOE-GAS</option>

                                <option>MOOE-HRTD</option>

                                <option>CO</option>

                                <option>PSF</option>

                                <option>SEF</option>

                                <option>SMN</option>

                                <option>Others</option>

                            </select>

                        </p>

                    </div>

                    <div class="info-card">

                        <h3>Proponent</h3>

                        <p><span class="editable-field" id="proponent-name">Juan Dela Cruz</span></p>

                    </div>

                </div>



                <div class="progress-container">

                    <div class="progress-header">

                        <h3>Overall Progress</h3>

                        <span class="progress-percentage" id="progress-percentage">71%</span>

                    </div>

                    <div class="progress-bar">

                        <div class="progress-fill" id="progress-bar" style="width: 71%"></div>

                    </div>

                </div>



                <div class="steps-container">

                    <div class="section-title">

                        <i class="fas fa-list-ol"></i>

                        <h2>Activity Deliverables</h2>

                    </div>



                    <div class="step-list">

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-1" checked disabled>

                            <div class="step-label">1. Submission of WFP (Encoding in PMIS)</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-2" checked disabled>

                            <div class="step-label">2. Submission of Activity/Training Proposal</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-3" checked disabled>

                            <div class="step-label">3. Approved proposal or request</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-4" checked disabled>

                            <div class="step-label">4. Activity Request (AR)</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-5" checked disabled>

                            <div class="step-label">5. Purchase Request (PR)</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-6" checked disabled>

                            <div class="step-label">6. Procurement Process</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-7" checked disabled>

                            <div class="step-label">7. Purchase Order (PO)</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-8" checked>

                            <div class="step-label">8. Delivery, Inspection and Acceptance</div>

                            <div class="step-status status-completed">Completed</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-9">

                            <div class="step-label">9. Release of Memorandum or Notice</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-10" disabled>

                            <div class="step-label">10. Pre-Conference</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-11" disabled>

                            <div class="step-label">11. Implementation</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-12" disabled>

                            <div class="step-label">12. Post-Conference</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-13" disabled>

                            <div class="step-label">13. Activity Completion Report</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-14" disabled>

                            <div class="step-label">14. Liquidation Report</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                        <div class="step-item">

                            <input type="checkbox" class="step-checkbox" id="step-15" disabled>

                            <div class="step-label">15. Payment/Disbursement</div>

                            <div class="step-status status-pending">Pending</div>

                        </div>

                    </div>

                </div>

            </div>



            <div class="ratings-container">

                <div class="section-title">

                    <i class="fas fa-star"></i>

                    <h2>Performance Ratings</h2>

                </div>



                <div class="rating-grid">

                    <div class="rating-card">

                        <h3>Accomplishment</h3>

                        <div class="rating-value" id="accomplishment-rating">3.5</div>

                        <div class="rating-stars">

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star-half-alt filled"></i>

                            <i class="star far fa-star"></i>

                        </div>

                        <p id="deliverables-status">Based on 8/15 deliverables</p>

                    </div>



                    <div class="rating-card">

                        <h3>BUR (Budget Utilization)</h3>

                        <div class="rating-value" id="bur-rating">4.0</div>

                        <div class="rating-stars">

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star far fa-star"></i>

                        </div>

                        <p id="bur-status">66% of budget utilized</p>

                    </div>



                    <div class="rating-card">

                        <h3>Timeliness</h3>

                        <div class="rating-value" id="timeliness-rating">5.0</div>

                        <div class="rating-stars">

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                        </div>

                        <p id="timeliness-status">5 days ahead of schedule</p>

                    </div>



                    <div class="rating-card">

                        <h3>Overall Rating</h3>

                        <div class="rating-value" id="overall-rating">4.2</div>

                        <div class="rating-stars">

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star fas fa-star filled"></i>

                            <i class="star far fa-star"></i>

                        </div>

                        <p id="overall-status">Activity Health: Good</p>

                    </div>

                </div>



                <div class="budget-section">

                    <div class="section-title">

                        <i class="fas fa-money-bill-wave"></i>

                        <h2>Budget Overview</h2>

                    </div>



                    <div class="budget-grid">

                        <div class="budget-card">

                            <h3>Allocated</h3>

                            <p id="budget-allocated">₱250,000</p>

                        </div>

                        <div class="budget-card">

                            <h3>Utilized</h3>

                            <p class="utilization" id="budget-utilized">₱165,000</p>

                        </div>

                        <div class="budget-card">

                            <h3>Remaining</h3>

                            <p class="remaining" id="budget-remaining">₱85,000</p>

                        </div>

                    </div>



                    <div class="budget-card" style="margin-top: 20px;">

                        <h3>BUR (Budget Utilization Rate)</h3>

                        <p class="bur" id="bur-percentage">66%</p>

                    </div>

                </div>

            </div>

        </div>

        <!-- Consolidated View -->
        <div id="consolidated-view" class="tab-content">
            <div class="section-title">
                <i class="fas fa-chart-pie"></i>
                <h2>Consolidated Program Status</h2>
            </div>
            <div class="activity-details">
                <div class="section-title">
                    <i class="fas fa-layer-group"></i>
                    <h2>LABONG Program Overview</h2>
                </div>
                <div class="activity-info-grid">
                    <div class="info-card">
                        <h3>Total Projects</h3>
                        <p>12</p>
                    </div>
                    <div class="info-card">
                        <h3>Total Activities</h3>
                        <p><?=$total?></p>
                    </div>
                    <div class="info-card">
                        <h3>Total Budget</h3>
                        <p>₱<?=number_format($totalBudget,2)?></p>
                    </div>
                    <div class="info-card">
                        <h3>Overall Progress</h3>
                        <p><?=$percent?>%</p>
                    </div>
                </div>

                <div class="progress-container">

                    <div class="progress-header">
                        <h3>Program Progress</h3>
                        <span class="progress-percentage"><?=$percent?>%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?=$percent?>%"></div>
                    </div>
                </div>

            </div>



            <div class="ratings-container">

                <div class="section-title">

                    <i class="fas fa-tasks"></i>

                    <h2>Project Status Overview</h2>

                </div>



                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">

                    <thead>

                        <tr style="background-color: #f1f8ff;">

                            <th style="padding: 12px; text-align: left;">Project</th>

                            <th style="padding: 12px; text-align: center;">Activities</th>

                            <th style="padding: 12px; text-align: center;">Progress</th>

                            <th style="padding: 12px; text-align: center;">Accomplishment</th>

                            <th style="padding: 12px; text-align: center;">BUR</th>

                            <th style="padding: 12px; text-align: center;">Timeliness</th>

                            <th style="padding: 12px; text-align: center;">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td style="padding: 12px; border-bottom: 1px solid #eee;">I-CARE</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">65%</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.8</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;"><span
                                    style="background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;">On
                                    Track</span></td>

                        </tr>

                        <tr>

                            <td style="padding: 12px; border-bottom: 1px solid #eee;">SINULID</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">52%</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;"><span
                                    style="background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;">Needs
                                    Attention</span></td>

                        </tr>

                        <tr>

                            <td style="padding: 12px; border-bottom: 1px solid #eee;">SAGIP</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">78%</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;"><span
                                    style="background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;">On
                                    Track</span></td>

                        </tr>

                        <tr>

                            <td style="padding: 12px; border-bottom: 1px solid #eee;">LINGAP</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">60%</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">4.2</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;"><span
                                    style="background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;">Needs
                                    Attention</span></td>

                        </tr>

                        <tr>

                            <td style="padding: 12px; border-bottom: 1px solid #eee;">ISSHED</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">2</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">40%</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">2.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">2.5</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">3.0</td>

                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;"><span
                                    style="background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;">At
                                    Risk</span></td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- Create Project View -->

        <div id="create-view" class="tab-content">
            <div class="section-title">
                <i class="fas fa-plus-circle"></i>
                <h2>Create New Activity</h2>
            </div>
            <div class="form-container">
                <form id="activity-form" method="POST" action="{{ route('save-project') }}">
                    @csrf
                    <div class="form-group">
                        <label for="activity-title">Activity Title</label>
                        <input type="text" name="activity-title" value="{{ old('activity-title') }}"
                            placeholder="Enter activity title" required />
                        @if($errors->has('activity-title'))
                        <span class="text-danger">{{ $errors->first('activity-title') }}</span>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="project-category">Under Which Project</label>
                                <select name="project-category" required>
                                    <option value="">Select Project</option>
                                    <option {{old('project-category')=='I-CARE' ? 'selected': ''}}>I-CARE</option>
                                    <option {{old('project-category')=='SINULID' ? 'selected': ''}}>SINULID</option>
                                    <option {{old('project-category')=='SAGIP' ? 'selected': ''}}>SAGIP</option>
                                    <option {{old('project-category')=='LINGAP' ? 'selected': ''}}>LINGAP</option>
                                    <option {{old('project-category')=='ISSHED' ? 'selected': ''}}>ISSHED</option>
                                    <option {{old('project-category')=='UX' ? 'selected': ''}}>UX</option>
                                    <option {{old('project-category')=='Gentri Saliksik' ? 'selected': ''}}>Gentri
                                        Saliksik</option>
                                    <option {{old('project-category')=='OK sa DepEd Gentri' ? 'selected': ''}}>OK sa
                                        DepEd Gentri</option>
                                    <option {{old('project-category')=='SECURE-PUSO' ? 'selected': ''}}>SECURE-PUSO
                                    </option>
                                    <option {{old('project-category')=='DRRM-SAFE' ? 'selected': ''}}>DRRM-SAFE</option>
                                    <option {{old('project-category')=='HUMANE' ? 'selected': ''}}>HUMANE</option>
                                    <option {{old('project-category')=='QMS/EOMS' ? 'selected': ''}}>QMS/EOMS</option>
                                </select>
                                @if($errors->has('project-category'))
                                <span class="text-danger">{{ $errors->first('project-category') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="budget-source-create">Budget Source</label>
                                <select name="budget-source-create" required>
                                    <option value="">Select Budget Source</option>
                                    <option>MOOE-GAS</option>
                                    <option>MOOE-HRTD</option>
                                    <option>CO</option>
                                    <option>PSF</option>
                                    <option>SEF</option>
                                    <option>SMN</option>
                                    <option>Others</option>
                                </select>
                                @if($errors->has('budget-source-create'))
                                <span class="text-danger">{{ $errors->first('budget-source-create') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="proponent-firstname">Proponent First Name</label>
                                <input type="text" name="proponent-firstname" value="{{ old('proponent-firstname') }}"
                                    placeholder="Enter first name" required />
                                @if($errors->has('proponent-firstname'))
                                <span class="text-danger">{{ $errors->first('proponent-firstname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="proponent-surname">Proponent Surname</label>
                                <input type="text" name="proponent-surname" value="{{ old('proponent-surname') }}"
                                    placeholder="Enter surname" required />
                                @if($errors->has('proponent-surname'))
                                <span class="text-danger">{{ $errors->first('proponent-surname') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="budget-allocated-create">Budget Allocated (₱)</label>
                                <input type="number" name="budget-allocated-create"
                                    value="{{ old('budget-allocated-create') }}" placeholder="Enter amount" required />
                                @if($errors->has('budget-allocated-create'))
                                <span class="text-danger">{{ $errors->first('budget-allocated-create') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="target-date-create">Target Date of Implementation</label>
                                <input type="date" name="target-date-create" value="{{ old('target-date-create') }}"
                                    required />
                                @if($errors->has('target-date-create'))
                                <span class="text-danger">{{ $errors->first('target-date-create') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity-description">Activity Description</label>
                        <textarea name="activity-description" rows="4"
                            placeholder="Describe the activity">{{old('activity-description')}}</textarea>
                        @if($errors->has('activity-description'))
                        <span class="text-danger">{{ $errors->first('activity-description') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Create Activity
                    </button>
                </form>

            </div>

        </div>



        <div class="instructions">

            <h2><i class="fas fa-info-circle"></i> How to Use This System</h2>

            <ul>

                <li><strong>Program Hierarchy:</strong> LABONG Program → 12 Projects → Activities</li>

                <li><strong>Navigation:</strong> Switch between tabs to access different features</li>

                <li><strong>Projects Dashboard:</strong> View all 12 LABONG projects with their activities</li>

                <li><strong>Activity Details:</strong> Track progress of specific activities with sequential
                    deliverables</li>

                <li><strong>Consolidated Report:</strong> View program-wide progress and performance metrics</li>

                <li><strong>Create Project:</strong> Add new activities to the system</li>

                <li><strong>Export Data:</strong> Download project data in CSV format</li>

                <li><strong>Offline Capability:</strong> Works without internet connection</li>

            </ul>

        </div>

    </div>


    <!-- JavaScript for interactivity -->
    <script src="assets/js/script.js"></script>
    <script>
    // Initialize the app
    setTimeout(function() {
        const alerts = document.getElementsByClassName('alert');
        for (let i = 0; i < alerts.length; i++) {
            alerts[i].style.display = 'none';
        }
    }, 3000);
    </script>

</body>

</html>
