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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- jQuery Modal Plugin CDN and CSS (e.g., from cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <style>
    .col-lg-12 {
        margin-bottom: 10px;
    }

    textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid gray;
        border-radius: 5px 5px;
        font-family: 'Courier New', Courier, monospace;
        field-sizing: content;
        /* This enables auto-resizing */
        min-height: 5rem;
        /* Optional: Sets a minimum height for the textarea */
        resize: vertical;
        /* Optional: Allows manual vertical resizing by the user */
        overflow: hidden;
        /* Optional: Hides scrollbars when not needed */
    }
    </style>
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
                <a href="{{ route('/') }}" class="btn btn-success" style="text-decoration: none;">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
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
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="activity-details">
                <div class="section-title">
                    <i class="fas fa-tasks"></i>
                    <h2>Activity: <span id="activity-name"><?=$project['name']?></span></h2>
                </div>
                @if(!empty(session()->get('user')))
                <div style="display:flex;gap:5px;margin-bottom:10px;">
                    @if($project['status']==0)
                    <button type="button" class="btn btn-primary complete" value="{{ $project->project_id }}">
                        <i class="fas fa-check"></i>&nbsp;Tag as Completed
                    </button>
                    <a href="{{ route('edit',['id'=>$project['project_id']]) }}" style="text-decoration:none;"
                        class="btn btn-warning">
                        <i class="fas fa-edit"></i>&nbsp;Edit
                    </a>
                    @else
                    <button type="button" class="btn btn-primary" disabled>
                        <i class="fas fa-check"></i>&nbsp;Completed
                    </button>
                    @endif
                </div>
                @endif
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
                        <span class="progress-percentage" id="progress-percentage"><?=$percentage?>%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress-bar" style="width: <?=$percentage?>%"></div>
                    </div>
                </div>

                <div class="steps-container">
                    <div class="section-title">
                        <i class="fas fa-list-ol"></i>
                        <h2>
                            Activity Deliverables
                        </h2>
                    </div>
                    @if(!empty(session()->get('user')))
                    @if($project['status']==0)
                    <button type="button" class="btn btn-primary" id="btnModal">
                        <i class="fas fa-plus"></i>&nbsp;Add
                    </button>
                    @endif
                    @endif

                    <div class="step-list">
                        @if($activities->isEmpty())
                        <div class="step-item">No Deliverables</div>
                        @else
                        @php $canActivate = true; @endphp
                        @foreach($activities as $i => $row)
                        <div class="step-item">
                            <input type="checkbox" class="step-checkbox" data-id="{{ $row['activity_id'] }}"
                                value="{{ $row['activity_id'] }}" @if($row['status']==1) checked disabled @php
                                $canActivate=true; @endphp @elseif($canActivate) {{-- Allow activation --}} @php
                                $canActivate=false; @endphp @else disabled @endif>
                            <div class="step-label">{{ $i + 1 }}. {{ $row['description'] }}</div>
                            @if($row['status'] == 1)
                            <div class="step-status status-completed">Completed</div>
                            @elseif($row['status'] == 0)
                            <div class="step-status status-pending">Pending</div>
                            @endif
                        </div>
                        @endforeach

                        @endif
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
                        <div class="rating-value" id="accomplishment-rating"><?=number_format($totalStar,2)?></div>
                        <div class="rating-stars">
                            <?php
                            $fullStars = floor($totalStar);               // Number of full stars
                            $halfStar = ($totalStar - $fullStars) >= 0.5; // Whether to show a half star
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars
                            // Full stars
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="star fas fa-star filled"></i>';
                            }
                            // Half star
                            if ($halfStar) {
                                echo '<i class="star fas fa-star-half-alt filled"></i>';
                            }
                            // Empty stars
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="star far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <p id="deliverables-status">Based on <?=$complete?>/<?=$total?> deliverables</p>
                    </div>

                    <div class="rating-card">
                        <h3>BUR (Budget Utilization)</h3>
                        <div class="rating-value" id="bur-rating"><?=number_format($burStar,2)?></div>
                        <div class="rating-stars">
                            <?php
                            $fullStars = floor($burStar);               // Number of full stars
                            $halfStar = ($totalStar - $fullStars) >= 0.5; // Whether to show a half star
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars
                            // Full stars
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="star fas fa-star filled"></i>';
                            }
                            // Half star
                            if ($halfStar) {
                                echo '<i class="star fas fa-star-half-alt filled"></i>';
                            }
                            // Empty stars
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="star far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <p id="bur-status"><?=$bur?>% of budget utilized</p>
                    </div>

                    <div class="rating-card">
                        <h3>Timeliness</h3>
                        <div class="rating-value" id="timeliness-rating"><?=number_format($timeStar,2)?></div>
                        <div class="rating-stars">
                            <?php
                        $fullStars = floor($timeStar);               // Number of full stars
                        $halfStar = 0; // Whether to show a half star
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars
                        // Full stars
                        for ($i = 0; $i < $fullStars; $i++) {
                            echo '<i class="star fas fa-star filled"></i>';
                        }
                        // // Empty stars
                        for ($i = 0; $i < $emptyStars; $i++) {
                            echo '<i class="star far fa-star"></i>';
                        }
                        ?>
                        </div>
                        <p id="timeliness-status">
                            @php
                            if(empty($completeDays)){ echo 'None';}
                            else
                            {
                            if($numDays<0){echo abs($numDays).' days ahead of schedule';} else
                                if($numDays==0){echo 'On time schedule' ;} else if($numDays>0){echo 'Late by
                                '.$numDays.' days';}
                                }
                                @endphp
                    </div>

                    <div class="rating-card">
                        <h3>Overall Rating</h3>
                        <div class="rating-value" id="overall-rating"><?=number_format($overAll,2)?></div>
                        <div class="rating-stars">
                            <?php
                            $fullStars = floor($overAll);               // Number of full stars
                            $halfStar = ($totalStar - $fullStars) >= 0.5; // Whether to show a half star
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars
                            // Full stars
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="star fas fa-star filled"></i>';
                            }
                            // Half star
                            if ($halfStar) {
                                echo '<i class="star fas fa-star-half-alt filled"></i>';
                            }
                            // Empty stars
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="star far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <p>
                            <?php
                            if ($overAll >= 4.5) echo 'Activity Health: Excellent';
                            else if ($overAll >= 4) echo 'Activity Health: Very Good';
                            else if ($overAll >= 3.5) echo'Activity Health: Good';
                            else if ($overAll >= 3) echo 'Activity Health: Fair';
                            else if($overAll >=1) echo 'Activity Health: Needs Attention';
                            else if($overAll==0) echo 'Activity Health: None';
                            ?>
                        </p>
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
                            <p id="budget-allocated">₱<?=number_format($project['budget_amount'],2)?></p>
                        </div>
                        <div class="budget-card">
                            <h3>Utilized</h3>
                            <p class="utilization" id="budget-utilized">₱<?=number_format($project['amount_spent'],2)?>
                            </p>
                        </div>
                        <div class="budget-card">
                            <h3>Remaining</h3>
                            <p class="remaining" id="budget-remaining">
                                ₱<?=number_format($project['budget_amount']-$project['amount_spent'],2)?></p>
                        </div>
                    </div>
                    <div class="budget-card" style="margin-top: 20px;">
                        <h3>BUR (Budget Utilization Rate)</h3>
                        <p class="bur" id="bur-percentage">
                            <?=$bur?>%
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Project Deliverables</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" id="form">
                        @csrf
                        <input type="hidden" name="project" value="<?=$id?>">
                        <div class="col-lg-12">
                            <textarea name="task" placeholder="Enter here"></textarea>
                            <div id="task-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-floppy-disk"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Initialize the app
    setTimeout(function() {
        const alerts = document.getElementsByClassName('alert');
        for (let i = 0; i < alerts.length; i++) {
            alerts[i].style.display = 'none';
        }
    }, 3000);
    $(document).on('click', '.complete', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to tag this as completed?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            // Action based on user's choice
            if (result.isConfirmed) {
                let val = $(this).val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('close-project') }}",
                    method: "POST",
                    data: {
                        value: val
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Great!',
                                text: "Successfully tag as completed",
                                icon: 'success',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                // Action based on user's choice
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            var errors = response.error;
                            swal.fire({
                                title: 'Warning',
                                text: errors.message,
                                icon: 'warning'
                            });
                        }
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $("#btnModal").click(function() {
            $("#addModal").modal('show');
        });
    });
    $('#form').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "{{ route('save') }}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#form')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.reload();
                        }
                    });
                } else {
                    var errors = response.errors;
                    //Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });

    document.querySelectorAll('.step-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const activityId = this.getAttribute('data-id');
            const newStatus = this.checked ? 1 : 0;

            fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        activity_id: activityId,
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Status updated:', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error updating status:', error);
                });
        });
    });
    </script>

</body>

</html>
