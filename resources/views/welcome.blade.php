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
            @if(!empty(session()->get('user')))
            <div class="tab" data-target="activity-view">Activity Details</div>
            @endif
            <div class="tab" data-target="consolidated-view">Consolidated Report</div>
            @if(!empty(session()->get('user')))
            <div class="tab" data-target="create-view">Create Project</div>
            @endif
        </div>

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

                        <div class="project-description">Intensifying Curriculum, Assessment, Resources Resulting to
                            Excellence</div>

                    </div>

                    <div class="project-body">

                        <div class="project-meta">

                            <span>4 Activities</span>

                            <span>Overall Progress: 65%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="icare" data-activity="training">

                                Employee Training Program <span class="activity-progress">71%</span>

                            </li>

                            <li data-project="icare" data-activity="summit">

                                Stakeholders Summit <span class="activity-progress">45%</span>

                            </li>

                            <li data-project="icare" data-activity="workshop">

                                Leadership Workshop <span class="activity-progress">85%</span>

                            </li>

                            <li data-project="icare" data-activity="outreach">

                                Community Outreach <span class="activity-progress">30%</span>

                            </li>

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

                            <span>3 Activities</span>

                            <span>Overall Progress: 52%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="sinulid" data-activity="weaving">

                                Reading Enhancement Program <span class="activity-progress">65%</span>

                            </li>

                            <li data-project="sinulid" data-activity="exhibit">

                                Math Skills Development <span class="activity-progress">40%</span>

                            </li>

                            <li data-project="sinulid" data-activity="heritage">

                                Science Exploration Workshops <span class="activity-progress">50%</span>

                            </li>

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

                            <span>3 Activities</span>

                            <span>Overall Progress: 78%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="sagip" data-activity="disaster">

                                Dropout Prevention Program <span class="activity-progress">90%</span>

                            </li>

                            <li data-project="sagip" data-activity="rescue">

                                Student Retention Initiative <span class="activity-progress">75%</span>

                            </li>

                            <li data-project="sagip" data-activity="response">

                                Alternative Learning Pathways <span class="activity-progress">70%</span>

                            </li>

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

                            <span>5 Activities</span>

                            <span>Overall Progress: 60%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="lingap" data-activity="medical">

                                Special Needs Education <span class="activity-progress">55%</span>

                            </li>

                            <li data-project="lingap" data-activity="feeding">

                                Inclusive Curriculum Development <span class="activity-progress">80%</span>

                            </li>

                            <li data-project="lingap" data-activity="elderly">

                                Learning Support Programs <span class="activity-progress">45%</span>

                            </li>

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

                            <span>2 Activities</span>

                            <span>Overall Progress: 40%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="isshed" data-activity="housing">

                                Stakeholder Engagement Forum <span class="activity-progress">35%</span>

                            </li>

                            <li data-project="isshed" data-activity="shelter">

                                Partnership Development Workshop <span class="activity-progress">45%</span>

                            </li>

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

                            <span>3 Activities</span>

                            <span>Overall Progress: 70%</span>

                        </div>

                        <ul class="activity-list">

                            <li data-project="ux" data-activity="survey">

                                LMS Platform Enhancement <span class="activity-progress">85%</span>

                            </li>

                            <li data-project="ux" data-activity="feedback">

                                Student Portal Redesign <span class="activity-progress">60%</span>

                            </li>

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

                            <span>4 Activities</span>

                            <span>Overall Progress: 55%</span>

                        </div>

                        <ul class="activity-list">

                            <li>Education Research Symposium</li>

                            <li>Innovation Grants Program</li>

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

                            <span>5 Activities</span>

                            <span>Overall Progress: 80%</span>

                        </div>

                        <ul class="activity-list">

                            <li>School Health Program</li>

                            <li>Mental Health Initiative</li>

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

                            <span>3 Activities</span>

                            <span>Overall Progress: 75%</span>

                        </div>

                        <ul class="activity-list">

                            <li>Child Protection Workshops</li>

                            <li>Rights Education Program</li>

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

                            <span>4 Activities</span>

                            <span>Overall Progress: 65%</span>

                        </div>

                        <ul class="activity-list">

                            <li>School Safety Audit</li>

                            <li>Disaster Preparedness Training</li>

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

                            <span>3 Activities</span>

                            <span>Overall Progress: 50%</span>

                        </div>

                        <ul class="activity-list">

                            <li>Professional Development Program</li>

                            <li>Employee Wellness Initiative</li>

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

                            <span>4 Activities</span>

                            <span>Overall Progress: 45%</span>

                        </div>

                        <ul class="activity-list">

                            <li>Process Optimization Workshop</li>

                            <li>Governance Framework Development</li>

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

                        <p>42</p>

                    </div>

                    <div class="info-card">

                        <h3>Total Budget</h3>

                        <p>₱12,500,000</p>

                    </div>

                    <div class="info-card">

                        <h3>Overall Progress</h3>

                        <p>68%</p>

                    </div>

                </div>



                <div class="progress-container">

                    <div class="progress-header">

                        <h3>Program Progress</h3>

                        <span class="progress-percentage">68%</span>

                    </div>

                    <div class="progress-bar">

                        <div class="progress-fill" style="width: 68%"></div>

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

                <form id="activity-form">

                    <div class="form-group">

                        <label for="activity-title">Activity Title</label>

                        <input type="text" id="activity-title" placeholder="Enter activity title" required>

                    </div>



                    <div class="form-row">

                        <div class="form-col">

                            <div class="form-group">

                                <label for="project-category">Under Which Project</label>

                                <select id="project-category" required>

                                    <option value="">Select Project</option>

                                    <option>I-CARE</option>

                                    <option>SINULID</option>

                                    <option>SAGIP</option>

                                    <option>LINGAP</option>

                                    <option>ISSHED</option>

                                    <option>UX</option>

                                    <option>Gentri Saliksik</option>

                                    <option>OK sa DepEd Gentri</option>

                                    <option>SECURE-PUSO</option>

                                    <option>DRRM-SAFE</option>

                                    <option>HUMANE</option>

                                    <option>QMS/EOMS</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-col">

                            <div class="form-group">

                                <label for="budget-source-create">Budget Source</label>

                                <select id="budget-source-create" required>

                                    <option value="">Select Budget Source</option>

                                    <option>MOOE-GAS</option>

                                    <option>MOOE-HRTD</option>

                                    <option>CO</option>

                                    <option>PSF</option>

                                    <option>SEF</option>

                                    <option>SMN</option>

                                    <option>Others</option>

                                </select>

                            </div>

                        </div>

                    </div>



                    <div class="form-row">

                        <div class="form-col">

                            <div class="form-group">

                                <label for="proponent-firstname">Proponent First Name</label>

                                <input type="text" id="proponent-firstname" placeholder="Enter first name" required>

                            </div>

                        </div>

                        <div class="form-col">

                            <div class="form-group">

                                <label for="proponent-surname">Proponent Surname</label>

                                <input type="text" id="proponent-surname" placeholder="Enter surname" required>

                            </div>

                        </div>

                    </div>



                    <div class="form-row">

                        <div class="form-col">

                            <div class="form-group">

                                <label for="budget-allocated-create">Budget Allocated (₱)</label>

                                <input type="number" id="budget-allocated-create" placeholder="Enter amount" required>

                            </div>

                        </div>

                        <div class="form-col">

                            <div class="form-group">

                                <label for="target-date-create">Target Date of Implementation</label>

                                <input type="date" id="target-date-create" required>

                            </div>

                        </div>

                    </div>



                    <div class="form-group">

                        <label for="activity-description">Activity Description</label>

                        <textarea id="activity-description" rows="4" placeholder="Describe the activity"></textarea>

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



    <script>
    // Initialize the app

    document.addEventListener('DOMContentLoaded', function() {

        // Tab functionality

        document.querySelectorAll('.tab').forEach(tab => {

            tab.addEventListener('click', function() {

                // Remove active class from all tabs

                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));



                // Add active class to clicked tab

                this.classList.add('active');



                // Hide all tab content

                document.querySelectorAll('.tab-content').forEach(content => {

                    content.classList.remove('active');

                });



                // Show the target tab content

                const target = this.getAttribute('data-target');

                document.getElementById(target).classList.add('active');

            });

        });



        // Activity selection

        document.querySelectorAll('.activity-list li').forEach(activity => {

            activity.addEventListener('click', function() {

                const project = this.getAttribute('data-project');

                const activityName = this.getAttribute('data-activity');



                // Update hierarchy navigation

                document.getElementById('current-project').textContent =

                    document.querySelector(`.project-card [data-project="${project}"]`)

                    .closest('.project-card')

                    .querySelector('.project-header h3').textContent;



                document.getElementById('current-activity').textContent =

                    this.textContent.split('<')[0].trim();



                // Switch to activity view

                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

                document.querySelector('[data-target="activity-view"]').classList.add('active');



                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove(
                    'active'));

                document.getElementById('activity-view').classList.add('active');

            });

        });



        // Back to projects button

        document.getElementById('back-to-projects').addEventListener('click', function() {

            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

            document.querySelector('[data-target="projects-view"]').classList.add('active');



            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            document.getElementById('projects-view').classList.add('active');

        });



        // Sequential deliverables logic

        const checkboxes = document.querySelectorAll('.step-checkbox');

        checkboxes.forEach((checkbox, index) => {

            checkbox.addEventListener('change', function() {

                // If checked, enable the next checkbox

                if (this.checked && index < checkboxes.length - 1) {

                    checkboxes[index + 1].disabled = false;

                    checkboxes[index + 1].nextElementSibling.nextElementSibling.textContent =
                        "Pending";

                    checkboxes[index + 1].nextElementSibling.nextElementSibling.className =
                        "step-status status-pending";

                }



                // If unchecked, disable all subsequent checkboxes

                if (!this.checked) {

                    for (let i = index + 1; i < checkboxes.length; i++) {

                        checkboxes[i].checked = false;

                        checkboxes[i].disabled = true;

                        checkboxes[i].nextElementSibling.nextElementSibling.textContent =
                            "Pending";

                        checkboxes[i].nextElementSibling.nextElementSibling.className =
                            "step-status status-pending";

                    }

                }



                // Update progress

                updateActivityProgress();

            });

        });



        // Editable fields

        document.querySelectorAll('.editable-field').forEach(field => {

            if (field.tagName !== 'SELECT') {

                field.addEventListener('click', function() {

                    const currentValue = this.textContent;

                    const input = document.createElement('input');

                    input.type = 'text';

                    input.value = currentValue;

                    input.style.width = '100%';

                    input.style.fontSize = 'inherit';

                    input.style.fontWeight = 'inherit';

                    input.style.border = '1px solid #3498db';

                    input.style.borderRadius = '4px';

                    input.style.padding = '5px';



                    this.textContent = '';

                    this.appendChild(input);

                    input.focus();



                    input.addEventListener('blur', function() {

                        const newValue = this.value;

                        this.parentElement.textContent = newValue;

                        updateActivityProgress();

                    });



                    input.addEventListener('keyup', function(e) {

                        if (e.key === 'Enter') {

                            this.blur();

                        }

                    });

                });

            }

        });



        // Save button functionality

        document.getElementById('save-btn').addEventListener('click', function() {

            alert('Activity data saved successfully!');

        });



        // Export button functionality

        document.getElementById('export-btn').addEventListener('click', function() {

            // Create CSV content

            let csvContent = "Project,Activity,Progress,Budget Allocated,Budget Utilized,Proponent\n";



            // Add sample data for demonstration

            csvContent += "I-CARE,Employee Training Program,71%,₱250,000,₱165,000,Juan Dela Cruz\n";

            csvContent += "SINULID,Reading Enhancement Program,65%,₱180,000,₱120,000,Maria Santos\n";

            csvContent += "SAGIP,Dropout Prevention Program,90%,₱320,000,₱280,000,Carlos Reyes\n";



            // Create download link

            const blob = new Blob([csvContent], {
                type: 'text/csv;charset=utf-8;'
            });

            const link = document.createElement('a');

            const url = URL.createObjectURL(blob);



            link.setAttribute('href', url);

            link.setAttribute('download', 'labong_projects_export.csv');

            link.style.visibility = 'hidden';



            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);



            alert('Projects exported to CSV file!');

        });



        // Form submission

        document.getElementById('activity-form').addEventListener('submit', function(e) {

            e.preventDefault();



            // Get form values

            const title = document.getElementById('activity-title').value;

            const project = document.getElementById('project-category').value;

            const budgetSource = document.getElementById('budget-source-create').value;

            const firstName = document.getElementById('proponent-firstname').value;

            const surname = document.getElementById('proponent-surname').value;

            const budget = document.getElementById('budget-allocated-create').value;

            const targetDate = document.getElementById('target-date-create').value;



            // Show success message

            alert(`Activity "${title}" created successfully under ${project} project!`);



            // Reset form

            this.reset();

        });



        // Initialize activity progress

        updateActivityProgress();

    });



    // Update activity progress

    function updateActivityProgress() {

        // Calculate progress

        let completedSteps = 0;

        const checkboxes = document.querySelectorAll('.step-checkbox');

        checkboxes.forEach(checkbox => {

            if (checkbox.checked) completedSteps++;

        });



        const progressPercentage = Math.round((completedSteps / 15) * 100);

        document.getElementById('progress-percentage').textContent = `${progressPercentage}%`;

        document.getElementById('progress-bar').style.width = `${progressPercentage}%`;



        // Update deliverables status

        document.getElementById('deliverables-status').textContent =

            `Based on ${completedSteps}/15 deliverables`;



        // Calculate accomplishment rating

        const accomplishmentRating = Math.min(5, Math.round((completedSteps / 15) * 20) / 4);

        document.getElementById('accomplishment-rating').textContent = accomplishmentRating.toFixed(1);

        updateStars('.rating-card:first-child .rating-stars', accomplishmentRating);



        // Calculate budget values

        const allocated = parseFloat(document.getElementById('allocated-amount').textContent.replace(/,/g, '')) || 0;

        const utilized = parseFloat(document.getElementById('utilized-amount').textContent.replace(/,/g, '')) || 0;

        const remaining = allocated - utilized;

        const burPercentage = allocated > 0 ? Math.round((utilized / allocated) * 100) : 0;



        document.getElementById('budget-allocated').textContent = `₱${allocated.toLocaleString()}`;

        document.getElementById('budget-utilized').textContent = `₱${utilized.toLocaleString()}`;

        document.getElementById('budget-remaining').textContent = `₱${remaining.toLocaleString()}`;

        document.getElementById('bur-percentage').textContent = `${burPercentage}%`;



        // Update BUR rating

        const burRating = calculateRating(burPercentage);

        document.getElementById('bur-rating').textContent = burRating.toFixed(1);

        updateStars('.rating-card:nth-child(2) .rating-stars', burRating);

        document.getElementById('bur-status').textContent = `${burPercentage}% of budget utilized`;



        // Calculate overall rating

        const overallRating = (accomplishmentRating + burRating + 5) / 3;

        document.getElementById('overall-rating').textContent = overallRating.toFixed(1);

        updateStars('.rating-card:nth-child(4) .rating-stars', overallRating);



        // Set overall status

        let statusText = '';

        if (overallRating >= 4.5) statusText = 'Activity Health: Excellent';

        else if (overallRating >= 4) statusText = 'Activity Health: Very Good';

        else if (overallRating >= 3.5) statusText = 'Activity Health: Good';

        else if (overallRating >= 3) statusText = 'Activity Health: Fair';

        else statusText = 'Activity Health: Needs Attention';



        document.getElementById('overall-status').textContent = statusText;

    }



    // Calculate rating from 0-5

    function calculateRating(percentage) {

        if (percentage >= 90) return 5.0;

        if (percentage >= 80) return 4.5;

        if (percentage >= 70) return 4.0;

        if (percentage >= 60) return 3.5;

        if (percentage >= 50) return 3.0;

        if (percentage >= 40) return 2.5;

        if (percentage >= 30) return 2.0;

        if (percentage >= 20) return 1.5;

        if (percentage >= 10) return 1.0;

        return 0.5;

    }



    // Update star rating display

    function updateStars(selector, rating) {

        const starsContainer = document.querySelector(selector);

        starsContainer.innerHTML = '';



        const fullStars = Math.floor(rating);

        const hasHalfStar = rating % 1 >= 0.5;



        // Add full stars

        for (let i = 0; i < fullStars; i++) {

            starsContainer.innerHTML += '<i class="star fas fa-star filled"></i>';

        }

        // Add half star if needed

        if (hasHalfStar) {

            starsContainer.innerHTML += '<i class="star fas fa-star-half-alt filled"></i>';

        }

        // Add empty stars

        const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

        for (let i = 0; i < emptyStars; i++) {

            starsContainer.innerHTML += '<i class="star far fa-star"></i>';

        }

    }
    </script>

</body>

</html>
