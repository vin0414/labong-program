<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function home(){
        $projectModel = new \App\Models\projectModel();
        $total = $projectModel->count() ?? 0;
        $totalBudget = $projectModel->sum('budget_amount') ?? 0;
        //get the total of project tag as 1
        $completeProject = $projectModel->where('status', 1)->count();
        //I-Care Projects
        $totalICare = $projectModel->where('category', 'I-Care')->count();
        $listICare = $projectModel->where('category', 'I-Care')->get();
        //SINULID
        $totalSinulid = $projectModel->where('category', 'SINULID')->count();
        $listSinulid = $projectModel->where('category', 'SINULID')->get();
        //SAGIP
        $totalSagip = $projectModel->where('category', 'SAGIP')->count();
        $listSagip = $projectModel->where('category', 'SAGIP')->get();
        //LINGAP
        $totalLingap = $projectModel->where('category', 'LINGAP')->count();
        $listLingap = $projectModel->where('category', 'LINGAP')->get();
        //ISSHED
        $totalIsshed = $projectModel->where('category', 'ISSHED')->count();
        $listIsshed = $projectModel->where('category', 'ISSHED')->get();
        //UX
        $totalUX = $projectModel->where('category', 'UX')->count();
        $listUX = $projectModel->where('category', 'UX')->get();
        //Gentri Saliksik
        $totalGentri = $projectModel->where('category', 'Gentri Saliksik')->count();
        $listGentri = $projectModel->where('category', 'Gentri Saliksik')->get();
        //OK sa DepEd Gentri
        $totalOkDepEd = $projectModel->where('category', 'OK sa DepEd Gentri')->count();
        $listOkDepEd = $projectModel->where('category', 'OK sa DepEd Gentri')->get();
        //SECURE-PUSO
        $totalSecurePuso = $projectModel->where('category', 'SECURE-PUSO')->count();
        $listSecurePuso = $projectModel->where('category', 'SECURE-PUSO')->get();
        //DRRM-SAFE
        $totalDRRM = $projectModel->where('category', 'DRRM-SAFE')->count();
        $listDRRM = $projectModel->where('category', 'DRRM-SAFE')->get();
        //HUMANE
        $totalHumane = $projectModel->where('category', 'HUMANE')->count();
        $listHumane = $projectModel->where('category', 'HUMANE')->get();
        //QMS/EOMS
        $totalQMS = $projectModel->where('category', 'QMS/EOMS')->count();
        $listQMS = $projectModel->where('category', 'QMS/EOMS')->get();

        $data = ['totalICare' => $totalICare, 'listICare' => $listICare,
                 'totalSinulid' => $totalSinulid, 'listSinulid' => $listSinulid,
                 'totalSagip' => $totalSagip, 'listSagip' => $listSagip,
                 'totalLingap' => $totalLingap, 'listLingap' => $listLingap,
                 'totalIsshed' => $totalIsshed, 'listIsshed' => $listIsshed,
                 'totalUX' => $totalUX, 'listUX' => $listUX,
                 'totalGentri' => $totalGentri, 'listGentri' => $listGentri,
                 'totalOkDepEd' => $totalOkDepEd, 'listOkDepEd' => $listOkDepEd,
                 'totalSecurePuso' => $totalSecurePuso, 'listSecurePuso' => $listSecurePuso,
                 'totalDRRM' => $totalDRRM, 'listDRRM' => $listDRRM,
                 'totalHumane' => $totalHumane, 'listHumane' => $listHumane,
                 'totalQMS' => $totalQMS, 'listQMS' => $listQMS,
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
        $numDays = $implementationDate->diffInDays($completedDate, false);
        $timeStar = 0;
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
            $model = new \App\Models\activityModel();
            $model->project_id = $request->input('project');
            $model->description = $request->input('task');
            $model->status = 0;
            $model->save();
            return response()->json(['success'=>'Successfully saved']);
        }
    }

    public function updateStatus(Request $request)
    {
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