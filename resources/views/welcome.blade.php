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
                            <span>Overall Progress: <?=number_format($ICarePercentage,2) ?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listICare as $activity): ?>
                            <li data-project="icare">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($SinulidPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSinulid as $activity): ?>
                            <li data-project="sinulid">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($SagipPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSagip as $activity): ?>
                            <li data-project="sagip">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($LingapPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listLingap as $activity): ?>
                            <li data-project="lingap">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($IsshedPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listIsshed as $activity): ?>
                            <li data-project="isshed">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($UxPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listUX as $activity): ?>
                            <li data-project="ux">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($GentriPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listGentri as $activity): ?>
                            <li data-project="gentri">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($OkDepEdPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listOkDepEd as $activity): ?>
                            <li data-project="OkDepEd">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($SecurePercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listSecurePuso as $activity): ?>
                            <li data-project="secure-puso">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($DRRMPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listDRRM as $activity): ?>
                            <li data-project="drrm-safe">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($HumanePercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listHumane as $activity): ?>
                            <li data-project="humane">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
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
                            <span>Overall Progress: <?=number_format($QMSPercentage,2)?>%</span>
                        </div>
                        <ul class="activity-list">
                            <?php foreach($listQMS as $activity): ?>
                            <li data-project="qms-eoms">
                                <a href="{{ route('details',['id'=>$activity->project_id]) }}"
                                    class="no-line"><?=$activity->name?></a><span
                                    class="activity-progress"><?=$activity->percentage?>%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
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
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalICare?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($ICarePercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($ICarePercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="icare_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="icare_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="icare_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">SINULID</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalSinulid?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($SinulidPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($SinulidPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sinulid_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sinulid_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sinulid_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">SAGIP</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalSagip?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($SagipPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($SagipPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sagip_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sagip_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="sagip_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">LINGAP</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalLingap?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($LingapPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($LingapPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="lingap_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="lingap_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="lingap_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">ISSHED</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalIsshed?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($IsshedPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($IsshedPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="isshed_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="isshed_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="isshed_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">UX</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalUX?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($UxPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($UxPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ux_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ux_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ux_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">Gentri Saliksik</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalGentri?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($GentriPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($GentriPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="gentri_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="gentri_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="gentri_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">OK sa DepEd Gentri</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalOkDepEd?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($OkDepEdPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($OkDepEdPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ok_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ok_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="ok_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">SECURE-PUSO</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalSecurePuso?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($SecurePercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($SecurePercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="secure_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="secure_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="secure_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">DRRM-SAFE</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalDRRM?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($DRRMPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($DRRMPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="drrm_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="drrm_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="drrm_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">HUMANE</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalHumane?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($HumanePercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($HumanePercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="humane_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="humane_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="humane_status"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #eee;">QMS/EOMS</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=$totalQMS?></td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format($QMSPercentage,2)?>%</td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <?=number_format(($QMSPercentage/100)*5,2)?>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="qms_bur"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="qms_timeline"></span>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
                                <span id="qms_status"></span>
                            </td>
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
                                    <option {{old('budget-source-create')=='MOOE-GAS' ? 'selected': ''}}>MOOE-GAS
                                    </option>
                                    <option {{old('budget-source-create')=='MOOE-HRTD' ? 'selected': ''}}>MOOE-HRTD
                                    </option>
                                    <option {{old('budget-source-create')=='CO' ? 'selected': ''}}>CO</option>
                                    <option {{old('budget-source-create')=='PSF' ? 'selected': ''}}>PSF</option>
                                    <option {{old('budget-source-create')=='SEF' ? 'selected': ''}}>SEF</option>
                                    <option {{old('budget-source-create')=='SMN' ? 'selected': ''}}>SMN</option>
                                    <option {{old('budget-source-create')=='Others' ? 'selected': ''}}>Others</option>
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
    // Base URL of your Laravel API
    const baseUrl = "{{ url('/') }}";
    // Fetch ICare
    fetch(baseUrl + '/icare')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('ICare Budget:', data.ICare);
            // Example: display in UI
            let rawValue = (data.ICare.spent / data.ICare.total) * 5;
            let value = Number(rawValue);
            document.getElementById('icare_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Sinulid
    fetch(baseUrl + '/sinulid')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Sinulid Budget:', data.Sinulid);
            // Example: display in UI
            let rawValue = (data.Sinulid.spent / data.Sinulid.total) * 5;
            let value = Number(rawValue);
            document.getElementById('sinulid_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Sagip
    fetch(baseUrl + '/sagip')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Sagip Budget:', data.Sagip);
            // Example: display in UI
            let rawValue = (data.Sagip.spent / data.Sagip.total) * 5;
            let value = Number(rawValue);
            document.getElementById('sagip_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Lingap
    fetch(baseUrl + '/lingap')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Lingap Budget:', data.Lingap);
            // Example: display in UI
            let rawValue = (data.Lingap.spent / data.Lingap.total) * 5;
            let value = Number(rawValue);
            document.getElementById('lingap_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Isshed
    fetch(baseUrl + '/isshed')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Isshed Budget:', data.Isshed);
            // Example: display in UI
            let rawValue = (data.Isshed.spent / data.Isshed.total) * 5;
            let value = Number(rawValue);
            document.getElementById('isshed_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch UX
    fetch(baseUrl + '/ux')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('UX Budget:', data.UX);
            // Example: display in UI
            let rawValue = (data.UX.spent / data.UX.total) * 5;
            let value = Number(rawValue);
            document.getElementById('ux_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Gentri
    fetch(baseUrl + '/gentri')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Gentri Budget:', data.Gentri);
            // Example: display in UI
            let rawValue = (data.Gentri.spent / data.Gentri.total) * 5;
            let value = Number(rawValue);
            document.getElementById('gentri_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Ok DepEd
    fetch(baseUrl + '/okdeped')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Ok DepEd Budget:', data.OkDepEd);
            // Example: display in UI
            let rawValue = (data.OkDepEd.spent / data.OkDepEd.total) * 5;
            let value = Number(rawValue);
            document.getElementById('ok_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Secure
    fetch(baseUrl + '/secure')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Secure Budget:', data.Secure);
            // Example: display in UI
            let rawValue = (data.Secure.spent / data.Secure.total) * 5;
            let value = Number(rawValue);
            document.getElementById('secure_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch DRRM
    fetch(baseUrl + '/drrm')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('DRRM Budget:', data.DRRM);
            // Example: display in UI
            let rawValue = (data.DRRM.spent / data.DRRM.total) * 5;
            let value = Number(rawValue);
            document.getElementById('drrm_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Humane
    fetch(baseUrl + '/humane')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Humane Budget:', data.Humane);
            // Example: display in UI
            let rawValue = (data.Humane.spent / data.Humane.total) * 5;
            let value = Number(rawValue);
            document.getElementById('humane_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch QMS
    fetch(baseUrl + '/qms')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('QMS Budget:', data.QMS);
            // Example: display in UI
            let rawValue = (data.QMS.spent / data.QMS.total) * 5;
            let value = Number(rawValue);
            document.getElementById('qms_bur').innerHTML = (Number.isNaN(value) ? 0 : value).toFixed(2);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    </script>
    <script>
    // Fetch ICare
    fetch(baseUrl + '/timeliness-icare')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('ICare:', data.ICare.total);
            if (!data.ICare || data.ICare.total === null) {
                document.getElementById('icare_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.ICare.total <= 0) {
                    document.getElementById('icare_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.ICare.total > 0 && data.ICare.total <= 7) {
                    document.getElementById('icare_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.ICare.total > 7 && data.ICare.total <= 31) {
                    document.getElementById('icare_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.ICare.total <= 90) {
                    document.getElementById('icare_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('icare_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($ICarePercentage) ? (($ICarePercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('icare_bur').textContent);
            let time = parseFloat(document.getElementById('icare_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('icare_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('icare_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('icare_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('icare_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Sinulid
    fetch(baseUrl + '/timeliness-sinulid')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Sinulid:', data.Sinulid.total);
            if (!data.Sinulid || data.Sinulid.total === null) {
                document.getElementById('sinulid_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Sinulid.total <= 0) {
                    document.getElementById('sinulid_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Sinulid.total > 0 && data.Sinulid.total <= 7) {
                    document.getElementById('sinulid_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Sinulid.total > 7 && data.Sinulid.total <= 31) {
                    document.getElementById('sinulid_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Sinulid.total <= 90) {
                    document.getElementById('sinulid_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('sinulid_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($SinulidPercentage) ? (($SinulidPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('sinulid_bur').textContent);
            let time = parseFloat(document.getElementById('sinulid_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('sinulid_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('sinulid_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('sinulid_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('sinulid_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Sagip
    fetch(baseUrl + '/timeliness-sagip')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Sagip:', data.Sagip.total);
            if (!data.Sagip || data.Sagip.total === null) {
                document.getElementById('sagip_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Sagip.total <= 0) {
                    document.getElementById('sagip_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Sagip.total > 0 && data.Sagip.total <= 7) {
                    document.getElementById('sagip_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Sagip.total > 7 && data.Sagip.total <= 31) {
                    document.getElementById('sagip_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Sagip.total <= 90) {
                    document.getElementById('sagip_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('sagip_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($SagipPercentage) ? (($SagipPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('sagip_bur').textContent);
            let time = parseFloat(document.getElementById('sagip_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('sagip_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('sagip_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('sagip_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('sagip_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Lingap
    fetch(baseUrl + '/timeliness-lingap')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Lingap:', data.Lingap.total);
            if (!data.Lingap || data.Lingap.total === null) {
                document.getElementById('lingap_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Lingap.total <= 0) {
                    document.getElementById('lingap_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Lingap.total > 0 && data.Lingap.total <= 7) {
                    document.getElementById('lingap_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Lingap.total > 7 && data.Lingap.total <= 31) {
                    document.getElementById('lingap_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Lingap.total <= 90) {
                    document.getElementById('lingap_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('lingap_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($LingapPercentage) ? (($LingapPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('lingap_bur').textContent);
            let time = parseFloat(document.getElementById('lingap_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('lingap_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('lingap_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('lingap_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('lingap_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Isshed
    fetch(baseUrl + '/timeliness-isshed')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Isshed:', data.Isshed.total);
            if (!data.Isshed || data.Isshed.total === null) {
                document.getElementById('isshed_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Isshed.total <= 0) {
                    document.getElementById('isshed_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Isshed.total > 0 && data.Isshed.total <= 7) {
                    document.getElementById('isshed_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Isshed.total > 7 && data.Isshed.total <= 31) {
                    document.getElementById('isshed_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Isshed.total <= 90) {
                    document.getElementById('isshed_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('isshed_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($IsshedPercentage) ? (($IsshedPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('isshed_bur').textContent);
            let time = parseFloat(document.getElementById('isshed_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('isshed_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('isshed_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('isshed_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('isshed_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch UX
    fetch(baseUrl + '/timeliness-ux')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('UX:', data.UX.total);
            if (!data.UX || data.UX.total === null) {
                document.getElementById('ux_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.UX.total <= 0) {
                    document.getElementById('ux_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.UX.total > 0 && data.UX.total <= 7) {
                    document.getElementById('ux_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.UX.total > 7 && data.UX.total <= 31) {
                    document.getElementById('ux_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.UX.total <= 90) {
                    document.getElementById('ux_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('ux_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($UxPercentage) ? (($UxPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('ux_bur').textContent);
            let time = parseFloat(document.getElementById('ux_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('ux_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('ux_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('ux_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('ux_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Gentri
    fetch(baseUrl + '/timeliness-gentri')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Gentri:', data.Gentri.total);
            if (!data.Gentri || data.Gentri.total === null) {
                document.getElementById('gentri_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Gentri.total <= 0) {
                    document.getElementById('gentri_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Gentri.total > 0 && data.Gentri.total <= 7) {
                    document.getElementById('gentri_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Gentri.total > 7 && data.Gentri.total <= 31) {
                    document.getElementById('gentri_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Gentri.total <= 90) {
                    document.getElementById('gentri_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('gentri_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($GentriPercentage) ? (($GentriPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('gentri_bur').textContent);
            let time = parseFloat(document.getElementById('gentri_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('gentri_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('gentri_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('gentri_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('gentri_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch OkDepEd
    fetch(baseUrl + '/timeliness-okdeped')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('OK DepEd:', data.OkDepEd.total);
            if (!data.OkDepEd || data.OkDepEd.total === null) {
                document.getElementById('ok_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.OkDepEd.total <= 0) {
                    document.getElementById('ok_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.OkDepEd.total > 0 && data.OkDepEd.total <= 7) {
                    document.getElementById('ok_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.OkDepEd.total > 7 && data.OkDepEd.total <= 31) {
                    document.getElementById('ok_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.OkDepEd.total <= 90) {
                    document.getElementById('ok_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('ok_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($OkDepEdPercentage) ? (($OkDepEdPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('ok_bur').textContent);
            let time = parseFloat(document.getElementById('ok_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('ok_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('ok_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('ok_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('ok_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Secure
    fetch(baseUrl + '/timeliness-secure')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Secure:', data.Secure.total);
            if (!data.Secure || data.Secure.total === null) {
                document.getElementById('secure_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Secure.total <= 0) {
                    document.getElementById('secure_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Secure.total > 0 && data.Secure.total <= 7) {
                    document.getElementById('secure_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Secure.total > 7 && data.Secure.total <= 31) {
                    document.getElementById('secure_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Secure.total <= 90) {
                    document.getElementById('secure_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('secure_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($SecurePercentage) ? (($SecurePercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('secure_bur').textContent);
            let time = parseFloat(document.getElementById('secure_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('secure_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('secure_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('secure_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('secure_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch DRRM
    fetch(baseUrl + '/timeliness-drrm')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('DRRM:', data.DRRM.total);
            if (!data.DRRM || data.DRRM.total === null) {
                document.getElementById('drrm_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.DRRM.total <= 0) {
                    document.getElementById('drrm_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.DRRM.total > 0 && data.DRRM.total <= 7) {
                    document.getElementById('drrm_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.DRRM.total > 7 && data.DRRM.total <= 31) {
                    document.getElementById('drrm_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.DRRM.total <= 90) {
                    document.getElementById('drrm_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('drrm_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($DRRMPercentage) ? (($DRRMPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('drrm_bur').textContent);
            let time = parseFloat(document.getElementById('drrm_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('drrm_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('drrm_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('drrm_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('drrm_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch Humane
    fetch(baseUrl + '/timeliness-humane')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Humane:', data.Humane.total);
            if (!data.Humane || data.Humane.total === null) {
                document.getElementById('humane_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.Humane.total <= 0) {
                    document.getElementById('humane_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.Humane.total > 0 && data.Humane.total <= 7) {
                    document.getElementById('humane_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.Humane.total > 7 && data.Humane.total <= 31) {
                    document.getElementById('humane_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.Humane.total <= 90) {
                    document.getElementById('humane_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('humane_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($HumanePercentage) ? (($HumanePercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('humane_bur').textContent);
            let time = parseFloat(document.getElementById('humane_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('humane_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('humane_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('humane_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('humane_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    // Fetch QMS/EOMS
    fetch(baseUrl + '/timeliness-qms')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
            compute();
        })
        .then(data => {
            console.log('QMS/EOMS:', data.QMS.total);
            if (!data.QMS || data.QMS.total === null) {
                document.getElementById('qms_timeline').innerHTML = Math.round(0).toFixed(2);
            } else {
                if (data.QMS.total <= 0) {
                    document.getElementById('qms_timeline').innerHTML = Math.round(5).toFixed(2);
                } else if (data.QMS.total > 0 && data.QMS.total <= 7) {
                    document.getElementById('qms_timeline').innerHTML = Math.round(4).toFixed(2);
                } else if (data.QMS.total > 7 && data.QMS.total <= 31) {
                    document.getElementById('qms_timeline').innerHTML = Math.round(3).toFixed(2);
                } else if (data.QMS.total <= 90) {
                    document.getElementById('qms_timeline').innerHTML = Math.round(2).toFixed(2);
                } else {
                    document.getElementById('qms_timeline').innerHTML = Math.round(1).toFixed(2);
                }
            }
            let task = <?= isset($QMSPercentage) ? (($QMSPercentage / 100) * 5) : 0 ?>;
            let bur = parseFloat(document.getElementById('qms_bur').textContent);
            let time = parseFloat(document.getElementById('qms_timeline').textContent);
            let status = (task + bur + time) / 3;
            if (status > 0 && status <= 3) {
                document.getElementById('qms_status').innerHTML =
                    "<span style='background: #f8d7da; color: #721c24; padding: 4px 12px; border-radius: 20px;'>At Risk</span>";
            } else if (status > 3 && status <= 4.5) {
                document.getElementById('qms_status').innerHTML =
                    "<span style='background: #fff3cd; color: #856404; padding: 4px 12px; border-radius: 20px;'>Needs Attention</span>";
            } else if (status > 4.49) {
                document.getElementById('qms_status').innerHTML =
                    "<span style='background: #d4edda; color: #155724; padding: 4px 12px; border-radius: 20px;''>On Track</span>";
            } else {
                document.getElementById('qms_status').innerHTML = '-';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    </script>
</body>

</html>
