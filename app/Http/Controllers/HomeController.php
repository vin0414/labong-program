<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $total = $activityModel->where('project_id', $id)->count() ?? 0;
        $percentage = $total > 0 ? round(($totalDone / $total) * 100, 2) : 0;
        //get all the activities
        $activities = clone $activityModel->where('project_id',$id)->get();
        $data = ['project' => $project,'percentage' => $percentage,'activities'=>$activities];
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
        $projectModel->description = $validatedData['activity-description'];
        $projectModel->status = 0; // Default status
        $projectModel->created_by = $request->session()->get('user')->id;
        $projectModel->save();

        return redirect('/')->with('success','Great! Successfully submitted');
    }
}