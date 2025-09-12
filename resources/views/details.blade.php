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
    <link href="/assets/images/deped-gentri-logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
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

        <!-- Activity Detail View -->
        <div id="activity-view" class="tab-content active">
            <div class="hierarchy-nav">
                <a href="{{ route('/') }}" style="text-decoration: none;"><span id="back-to-projects">LABONG
                        Program</span></a>
                <i class="fas fa-chevron-right"></i>
                <span id="current-project"><?=$project['category']?></span>
                <i class="fas fa-chevron-right"></i>
                <span id="current-activity"><?=$project['name']?></span>
            </div>
            <div class="activity-details">
                <div class="section-title">
                    <i class="fas fa-tasks"></i>
                    <h2>Activity: <span id="activity-name"><?=$project['name']?></span></h2>
                </div>
                <div class="activity-info-grid">
                    <div class="info-card">
                        <h3>Amount Allocated</h3>
                        <p>₱<span id="allocated-amount"><?=number_format($project['budget_amount'],2)?></span></p>
                    </div>
                    <div class="info-card">
                        <h3>Amount Utilized</h3>
                        <p>₱<span id="utilized-amount"><?=number_format($project['amount_spent'],2)?></span></p>
                    </div>
                    <div class="info-card">
                        <h3>Target Date</h3>
                        <p><span id="target-date"><?=date('F d, Y',strtotime($project['implementation_date']))?></span>
                        </p>
                    </div>
                    <div class="info-card">
                        <h3>Date Conducted</h3>
                        <p><span id="date-conducted"><?=date('F d, Y',strtotime($project['created_at']))?></span></p>
                    </div>
                    <div class="info-card">
                        <h3>Budget Source</h3>
                        <p><span id="allocated-amount"><?=$project['budget_source']?></span></p>
                    </div>
                    <div class="info-card">
                        <h3>Proponent</h3>
                        <p><span id="proponent-name"><?=$project['first_name']?>&nbsp;<?=$project['last_name']?></span>
                        </p>
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
    <script src="/assets/js/script.js"></script>
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
