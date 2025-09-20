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
                <a href="javascript:history.back();" class="btn btn-success" style="text-decoration: none;">
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
            <div class="activity-details">
                <div class="form-container">
                    <form id="activity-form" method="POST" action="{{ route('edit-project') }}">
                        @csrf
                        <input type="hidden" name="project_id" value="<?=$project['project_id']?>" />
                        <div class="form-group">
                            Activity # : <?=$project['project_id']?>
                        </div>
                        <div class="form-group">
                            <label for="activity-title">Activity Title</label>
                            <input type="text" name="activity-title" value="{{ $project->name }}"
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
                                        <option {{$project->category=='I-CARE' ? 'selected': ''}}>I-CARE
                                        </option>
                                        <option {{$project->category=='SINULID' ? 'selected': ''}}>SINULID</option>
                                        <option {{$project->category=='SAGIP' ? 'selected': ''}}>SAGIP</option>
                                        <option {{$project->category=='LINGAP' ? 'selected': ''}}>LINGAP</option>
                                        <option {{$project->category=='ISSHED' ? 'selected': ''}}>ISSHED</option>
                                        <option {{$project->category=='UX' ? 'selected': ''}}>UX</option>
                                        <option {{$project->category=='Gentri Saliksik' ? 'selected': ''}}>Gentri
                                            Saliksik</option>
                                        <option {{$project->category=='OK sa DepEd Gentri' ? 'selected': ''}}>OK sa
                                            DepEd Gentri</option>
                                        <option {{$project->category=='SECURE-PUSO' ? 'selected': ''}}>SECURE-PUSO
                                        </option>
                                        <option {{$project->category=='DRRM-SAFE' ? 'selected': ''}}>DRRM-SAFE
                                        </option>
                                        <option {{$project->category=='HUMANE' ? 'selected': ''}}>HUMANE</option>
                                        <option {{$project->category=='QMS/EOMS' ? 'selected': ''}}>QMS/EOMS
                                        </option>
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
                                        <option {{$project->budget_source=='MOOE-GAS' ? 'selected': ''}}>MOOE-GAS
                                        </option>
                                        <option {{$project->budget_source=='MOOE-HRTD' ? 'selected': ''}}>MOOE-HRTD
                                        </option>
                                        <option {{$project->budget_source=='CO' ? 'selected': ''}}>CO</option>
                                        <option {{$project->budget_source=='PSF' ? 'selected': ''}}>PSF</option>
                                        <option {{$project->budget_source=='SEF' ? 'selected': ''}}>SEF</option>
                                        <option {{$project->budget_source=='SMN' ? 'selected': ''}}>SMN</option>
                                        <option {{$project->budget_source=='Others' ? 'selected': ''}}>Others
                                        </option>
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
                                    <input type="text" name="proponent-firstname" value="{{ $project->first_name }}"
                                        placeholder="Enter first name" required />
                                    @if($errors->has('proponent-firstname'))
                                    <span class="text-danger">{{ $errors->first('proponent-firstname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="proponent-surname">Proponent Surname</label>
                                    <input type="text" name="proponent-surname" value="{{ $project->last_name }}"
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
                                        value="{{ $project->budget_amount }}" placeholder="Enter amount" required />
                                    @if($errors->has('budget-allocated-create'))
                                    <span class="text-danger">{{ $errors->first('budget-allocated-create') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="amount_spent">Amount Utilized (₱)</label>
                                    <input type="number" name="amount_spent" value="{{ $project->amount_spent }}"
                                        placeholder="Enter amount" required />
                                    @if($errors->has('amount_spent'))
                                    <span class="text-danger">{{ $errors->first('amount_spent') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="target-date-create">Target Date of Implementation</label>
                                    <input type="date" name="target-date-create"
                                        value="{{ $project->implementation_date }}" required />
                                    @if($errors->has('target-date-create'))
                                    <span class="text-danger">{{ $errors->first('target-date-create') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="activity-description">Activity Description</label>
                            <textarea name="activity-description" rows="4"
                                placeholder="Describe the activity">{{ $project->description }}</textarea>
                            @if($errors->has('activity-description'))
                            <span class="text-danger">{{ $errors->first('activity-description') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
