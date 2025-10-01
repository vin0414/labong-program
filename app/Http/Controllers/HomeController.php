<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function home(){
        $projectModel = new \App\Models\projectModel();
        $model = new \App\Models\activityModel();
        //data
        $total = $projectModel->count() ?? 0;
        $totalBudget = $projectModel->sum('budget_amount') ?? 0;
        //get the total of project tag as 1
        $completeProject = $projectModel->where('status', 1)->count();
        //I-Care Projects
        $activityICareDone = $model->where('category','I-Care')
                                    ->where('status',1)
                                    ->count();
        $activityICaretotal = $model->where('category','I-Care')
                                    ->count();
        $totalPercentageICare = $activityICaretotal > 0 ? ($activityICareDone/$activityICaretotal)* 100 : 0;
        //total
        $totalICare = $projectModel->where('category', 'I-Care')->count();
        $listICare = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'I-CARE')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //SINULID
        $activitySinulidDone = $model->where('category','SINULID')
                                    ->where('status',1)
                                    ->count();
        $activitySinulidtotal = $model->where('category','SINULID')
                                    ->count();
        $totalPercentageSinulid = $activitySinulidtotal > 0 ? ($activitySinulidDone/$activitySinulidtotal)* 100 : 0;
        //total
        $totalSinulid = $projectModel->where('category', 'SINULID')->count();
        $listSinulid = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'SINULID')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //SAGIP
        $activitySagipDone = $model->where('category','SAGIP')
                                    ->where('status',1)
                                    ->count();
        $activitySagiptotal = $model->where('category','SAGIP')
                                    ->count();
        $totalPercentageSagip = $activitySagiptotal > 0 ? ($activitySagipDone/$activitySagiptotal)* 100 : 0;
        //total
        $totalSagip = $projectModel->where('category', 'SAGIP')->count();
        $listSagip = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'SAGIP')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //LINGAP
        $activityLingapDone = $model->where('category','LINGAP')
                                    ->where('status',1)
                                    ->count();
        $activityLingaptotal = $model->where('category','LINGAP')
                                    ->count();
        $totalPercentageLingap = $activityLingaptotal > 0 ? ($activityLingapDone/$activityLingaptotal)* 100 : 0;
        //total
        $totalLingap = $projectModel->where('category', 'LINGAP')->count();
        $listLingap = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'LINGAP')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //ISSHED
        $activityIsshedDone = $model->where('category','ISSHED')
                                    ->where('status',1)
                                    ->count();
        $activityIsshedtotal = $model->where('category','ISSHED')
                                    ->count();
        $totalPercentageIsshed = $activityIsshedtotal > 0 ? ($activityIsshedDone/$activityIsshedtotal)* 100 : 0;
        //total
        $totalIsshed = $projectModel->where('category', 'ISSHED')->count();
        $listIsshed = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'ISSHED')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //UX
        $activityUxDone = $model->where('category','UX')
                                    ->where('status',1)
                                    ->count();
        $activityUxtotal = $model->where('category','UX')
                                    ->count();
        $totalPercentageUx = $activityUxtotal > 0 ? ($activityUxDone/$activityUxtotal)* 100 : 0;
        //total
        $totalUX = $projectModel->where('category', 'UX')->count();
        $listUX = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'UX')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //Gentri Saliksik
        $activityGentriDone = $model->where('category','Gentri Saliksik')
                                    ->where('status',1)
                                    ->count();
        $activityGentritotal = $model->where('category','Gentri Saliksik')
                                    ->count();
        $totalPercentageGentri = $activityGentritotal > 0 ? ($activityGentriDone/$activityGentritotal)* 100 : 0;
        //total
        $totalGentri = $projectModel->where('category', 'Gentri Saliksik')->count();
        $listGentri = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'Gentri Saliksik')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //OK sa DepEd Gentri
        $activityOkDepEdDone = $model->where('category','OK sa DepEd Gentri')
                                    ->where('status',1)
                                    ->count();
        $activityOkDepEdtotal = $model->where('category','Ok sa DepEd Gentri')
                                    ->count();
        $totalPercentageOkDepEd = $activityOkDepEdtotal > 0 ? ($activityOkDepEdDone/$activityOkDepEdtotal)* 100 : 0;
        //total
        $totalOkDepEd = $projectModel->where('category', 'OK sa DepEd Gentri')->count();
        $listOkDepEd = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'OK sa DepEd Gentri')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //SECURE-PUSO
        $activitySecureDone = $model->where('category','SECURE-PUSO')
                                    ->where('status',1)
                                    ->count();
        $activitySecuretotal = $model->where('category','SECURE-PUSO')
                                    ->count();
        $totalPercentageSecure = $activitySecuretotal > 0 ? ($activitySecureDone/$activitySecuretotal)* 100 : 0;
        //total
        $totalSecurePuso = $projectModel->where('category', 'SECURE-PUSO')->count();
        $listSecurePuso = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'SECURE-PUSO')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //DRRM-SAFE
        $activityDRRMDone = $model->where('category','DRRM-SAFE')
                                    ->where('status',1)
                                    ->count();
        $activityDRRMtotal = $model->where('category','DRRM-SAFE')
                                    ->count();
        $totalPercentageDRRM = $activityDRRMtotal > 0 ? ($activityDRRMDone/$activityDRRMtotal)* 100 : 0;
        //total
        $totalDRRM = $projectModel->where('category', 'DRRM-SAFE')->count();
        $listDRRM = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'DRRM-SAFE')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //HUMANE
        $activityHumaneDone = $model->where('category','HUMANE')
                                    ->where('status',1)
                                    ->count();
        $activityHumanetotal = $model->where('category','HUMANE')
                                    ->count();
        $totalPercentageHumane = $activityHumanetotal > 0 ? ($activityHumaneDone/$activityHumanetotal)* 100 : 0;
        //total
        $totalHumane = $projectModel->where('category', 'HUMANE')->count();
        $listHumane = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'HUMANE')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        //QMS/EOMS
        $activityQMSDone = $model->where('category','QMS/EOMS')
                                    ->where('status',1)
                                    ->count();
        $activityQMStotal = $model->where('category','QMS/EOMS')
                                    ->count();
        $totalPercentageQMS = $activityQMStotal > 0 ? ($activityQMSDone/$activityQMStotal)* 100 : 0;
        //total
        $totalQMS = $projectModel->where('category', 'QMS/EOMS')->count();
        $listQMS = $projectModel::selectRaw('projects.name, projects.project_id, FORMAT(((activity_summary.done / activity_summary.total) * 100),2) as percentage')
                    ->leftJoin(DB::raw('(
                        SELECT
                            project_id,
                            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS done,
                            COUNT(activity_id) AS total
                        FROM activities
                        GROUP BY project_id
                    ) as activity_summary'), 'projects.project_id', '=', 'activity_summary.project_id')
                    ->where('projects.category', 'QMS/EOMS')
                    ->groupBy('projects.project_id', 'projects.name','activity_summary.done', 'activity_summary.total')
                    ->get();

        $data = ['totalICare' => $totalICare,'ICarePercentage'=>$totalPercentageICare, 'listICare' => $listICare,
                 'totalSinulid' => $totalSinulid,'SinulidPercentage'=>$totalPercentageSinulid, 'listSinulid' => $listSinulid,
                 'totalSagip' => $totalSagip,'SagipPercentage'=>$totalPercentageSagip, 'listSagip' => $listSagip,
                 'totalLingap' => $totalLingap,'LingapPercentage'=>$totalPercentageLingap, 'listLingap' => $listLingap,
                 'totalIsshed' => $totalIsshed,'IsshedPercentage'=>$totalPercentageIsshed, 'listIsshed' => $listIsshed,
                 'totalUX' => $totalUX,'UxPercentage'=>$totalPercentageUx, 'listUX' => $listUX,
                 'totalGentri' => $totalGentri,'GentriPercentage'=>$totalPercentageGentri, 'listGentri' => $listGentri,
                 'totalOkDepEd' => $totalOkDepEd,'OkDepEdPercentage'=>$totalPercentageOkDepEd, 'listOkDepEd' => $listOkDepEd,
                 'totalSecurePuso' => $totalSecurePuso,'SecurePercentage'=>$totalPercentageSecure, 'listSecurePuso' => $listSecurePuso,
                 'totalDRRM' => $totalDRRM,'DRRMPercentage'=>$totalPercentageDRRM, 'listDRRM' => $listDRRM,
                 'totalHumane' => $totalHumane,'HumanePercentage'=>$totalPercentageHumane, 'listHumane' => $listHumane,
                 'totalQMS' => $totalQMS,'QMSPercentage'=>$totalPercentageQMS, 'listQMS' => $listQMS,
                 'total' => $total, 'totalBudget' => $totalBudget,
                 'percent' => $total > 0 ? round(($completeProject / $total) * 100, 2) : 0];
        return view('welcome',$data);
    }

    public function login(){
        if(!empty(session()->get('user')))
        {
            return redirect('/')->with('error', 'You are already logged in');
        }
        return view('login');
    }

    public function auth(Request $request){
        $UserModel = new \App\Models\User();
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required|min:8|max:255|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = $UserModel->where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Authentication passed
            $request->session()->put('user', $user);
            return redirect('/')->with('success', 'Login successful');
        } else {
            // Authentication failed
            return redirect('/login')->with('error', 'Invalid email or password');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/login')->with('success', 'Logout successful');
    }

    public function edit($id)
    {
        $projectModel = new \App\Models\projectModel();
        $project = $projectModel->find($id);
        if(!$project){
            return redirect('/')->with('error', 'Project not found');
        }
        $data = ['project'=>$project];
        return view('edit-project',$data);
    }

    public function editProject(Request $request)
    {
        $projectModel = new \App\Models\projectModel();
        $validatedData = $request->validate([
            'project_id'=>'required|numeric|min:0',
            'activity-title' => 'required|string|max:255',
            'project-category' => 'required|string',
            'budget-source-create' => 'required|string|max:255',
            'proponent-firstname' => 'required|string|max:100',
            'proponent-surname' => 'required|string|max:100',
            'budget-allocated-create' => 'required|numeric|min:0',
            'amount_spent' => 'required|numeric|min:0',
            'target-date-create' => 'required|date',
            'activity-description' => 'required|string',
        ]);
        // Find the existing record
        $project = $projectModel::find($validatedData['project_id']);

        if ($project) {
            // Update the record with validated data
            $project->update([
                'activity_title' => $validatedData['activity-title'],
                'project_category' => $validatedData['project-category'],
                'budget_source' => $validatedData['budget-source-create'],
                'proponent_firstname' => $validatedData['proponent-firstname'],
                'proponent_surname' => $validatedData['proponent-surname'],
                'budget_allocated' => $validatedData['budget-allocated-create'],
                'amount_spent' => $validatedData['amount_spent'],
                'target_date' => $validatedData['target-date-create'],
                'activity_description' => $validatedData['activity-description'],
            ]);

            return redirect('/activity-details/'.$validatedData['project_id'])->with('success','Great! Successfully applied changes');
        }
        else
        {
            return redirect('/activity-details/'.$validatedData['project_id'])->with('error','Invalid! Project not found');
        }
    }

    public function closeProject(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'value'=>'required|numeric'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->Errors()]);
        }
        else
        {
            $projectModel = new \App\Models\projectModel();
            $project = $projectModel::find($request->value);
            if($project)
            {
                $project->completed_date = date('Y-m-d');
                $project->status=1;
                $project->save();
                return response()->json(['success'=>'Successfully tag as completed']);
            }
            return response()->json(['errors'=>'Something went wrong']);
        }
    }

    //activity details
    public function activityDetails($id){
        $projectModel = new \App\Models\projectModel();
        $project = $projectModel->find($id);
        if(!$project){
            return redirect('/')->with('error', 'Project not found');
        }
        //get the total of activities tag as done
        $activityModel = new \App\Models\activityModel();
        $totalDone = $activityModel->where('project_id', $id)
                                ->where('status', 1)
                                ->count() ?? 0;
        $totalPending = $activityModel->where('project_id', $id)
                                ->where('status', 0)
                                ->count() ?? 0;
        $total = $activityModel->where('project_id', $id)->count() ?? 0;
        $percentage = $total > 0 ? round(($totalDone / $total) * 100, 2) : 0;
        //total star
        $totalStar = ($percentage/100)*5 ?? 0;
        //get all the activities
        $activities = clone $activityModel->where('project_id',$id)->get();
        //bur
        $bur = ($project['amount_spent']/$project['budget_amount'])*100 ?? 0;
        $burStar = ($bur/100)*5 ?? 0;
        //timeliness
        $implementationDate = Carbon::parse($project['implementation_date']);
        $completedDate = Carbon::parse($project['completed_date']);
        $numDays = $implementationDate->diffInDays($completedDate);
        $timeStar=0;
        if(empty($project['completed_date']))
        {
            $timeStar=0;
        }
        else
        {
            if($numDays<=0):
                $timeStar=5;
            elseif($numDays>0 && $numDays <=7):
                $timeStar=4;
            elseif($numDays > 7 &&  $numDays<=31):
                $timeStar=3;
            elseif($numDays<=90):
                $timeStar=2;
            else: $timeStar=1;
            endif;
        }
        //const overallRating = (accomplishmentRating + burRating + 5) / 3;
        $overAll = ($totalStar + $burStar + $timeStar)/3 ?? 0;

        $data = ['project' => $project,
                'percentage' => $percentage,
                'activities'=>$activities,
                'total'=>$total,
                'totalStar'=>$totalStar,
                'pending'=>$totalPending,
                'complete'=>$totalDone,
                'bur'=>$bur,
                'burStar'=>$burStar,
                'timeStar'=>$timeStar,
                'numDays'=>$numDays,
                'completeDays'=>$project['completed_date'],
                'overAll'=>$overAll,
                'id'=>$id];
        return view('details', $data);
    }

    //save project
    public function saveProject(Request $request){
        if(empty(session()->get('user')))
        {
            return redirect('/login')->with('error', 'You must be logged in to submit a project');
        }
        $projectModel = new \App\Models\projectModel();
        // Validate the incoming request data
        $validatedData = $request->validate([
            'activity-title' => 'required|string|max:255|unique:projects,name',
            'project-category' => 'required|string',
            'budget-source-create' => 'required|string|max:255',
            'proponent-firstname' => 'required|string|max:100',
            'proponent-surname' => 'required|string|max:100',
            'budget-allocated-create' => 'required|numeric|min:0',
            'target-date-create' => 'required|date',
            'activity-description' => 'required|string',
        ]);

        DB::beginTransaction();
        try
        {
            // Assign validated data to the model
            $projectModel->name = $validatedData['activity-title'];
            $projectModel->category = $validatedData['project-category'];
            $projectModel->budget_source = $validatedData['budget-source-create'];
            $projectModel->first_name = $validatedData['proponent-firstname'];
            $projectModel->last_name = $validatedData['proponent-surname'];
            $projectModel->budget_amount = $validatedData['budget-allocated-create'];
            $projectModel->amount_spent = 0; // Default amount spent
            $projectModel->implementation_date = $validatedData['target-date-create'];
            $projectModel->completed_date = '';
            $projectModel->description = $validatedData['activity-description'];
            $projectModel->status = 0; // Default status
            $projectModel->created_by = $request->session()->get('user')->id;
            $projectModel->save();
            //save deliverables automatically
            $model = new \App\Models\activityModel();
            $data = [
                    ["task" => "Submission of WFP (Encoding in PMIS)","stats" => 0,],
                    ["task" => "Submission of Activity/Training Proposal","stats" => 0,],
                    ["task" => "Approved proposal or request","stats" => 0,],
                    ["task" => "Activity Request (AR)","stats" => 0,],
                    ["task" => "Purchase Request (PR)","stats" => 0,],
                    ["task" => "Procurement Process","stats" => 0,],
                    ["task" => "Purchase Order (PO)","stats" => 0,],
                    ["task" => "Delivery, Inspection and Acceptance","stats" => 0,],
                    ["task" => "Release of Memorandum or Notice","stats" => 0,],
                    ["task" => "Pre-Conference","stats" => 0,],
                    ["task" => "Implementation","stats" => 0,],
                    ["task" => "Post-Conference","stats" => 0,],
                    ["task" => "Activity Completion Report","stats" => 0,],
                    ["task" => "Liquidation Report","stats" => 0,],
                    ["task" => "Payment/Disbursement","stats" => 0,],
                ];
            $project = $projectModel->where('name',$validatedData['activity-title'])
                                    ->first();
            foreach ($data as $item) {
                $model::create([
                    'project_id' => $project['project_id'],
                    'category'=>$validatedData['project-category'],
                    'description' => $item['task'],
                    'stats' => $item['stats'],
                ]);
            }
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error',$e);
        }
        return redirect('/')->with('success','Great! Successfully submitted');
    }

    //save deliverables
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required',
        ]);

        if ($validator->fails()) {
            // Handle failure manually
            return response()->json(['errors' => $validator->errors()]);
        }
        else
        {
            $projectModel = new \App\Models\projectModel();
            $project = $projectModel->where('project_id',$request->input('project'))
                                    ->first();
            //save
            $model = new \App\Models\activityModel();
            $model->project_id = $request->input('project');
            $model->category = $project->category;
            $model->description = $request->input('task');
            $model->status = 0;
            $model->save();
            return response()->json(['success'=>'Successfully saved']);
        }
    }

    public function updateStatus(Request $request)
    {
        if(empty(session()->get('user')))
        {
            return redirect('/login')->with('error', 'You must be logged in');
        }
        $activityModel = new \App\Models\activityModel();
        $activity = $activityModel::find($request->activity_id);
        if ($activity) {
            $activity->status = $request->status;
            $activity->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
}