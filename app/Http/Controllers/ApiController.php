<?php

namespace App\Http\Controllers;
use \App\Models\projectModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ICare()
    {
        $ICareBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','I-CARE')->groupBy('category')->first();
        return response()->json([
            'ICare' => [
                'total' => $ICareBudget->total ?? 0,
                'spent' => $ICareBudget->spent ?? 0,
            ]
        ]);

    }

    public function Sinulid()
    {
        $SinulidBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','SINULID')->groupBy('category')->first();
        return response()->json([
            'Sinulid' => [
                'total' => $SinulidBudget->total ?? 0,
                'spent' => $SinulidBudget->spent ?? 0,
            ]
        ]);
    }

    public function Sagip()
    {
        $SagipBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','SAGIP')->groupBy('category')->first();
        return response()->json([
            'Sagip' => [
                'total' => $SagipBudget->total ?? 0,
                'spent' => $SagipBudget->spent ?? 0,
            ]
        ]);
    }

    public function Lingap()
    {
        $LingapBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','LINGAP')->groupBy('category')->first();
        return response()->json([
            'Lingap' => [
                'total' => $LingapBudget->total ?? 0,
                'spent' => $LingapBudget->spent ?? 0,
            ]
        ]);
    }

    public function Isshed()
    {
        $LingapBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','ISSHED')->groupBy('category')->first();
        return response()->json([
            'Isshed' => [
                'total' => $IsshedBudget->total ?? 0,
                'spent' => $IsshedBudget->spent ?? 0,
            ]
        ]);
    }

    public function Ux()
    {
        $UxBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','UX')->groupBy('category')->first();
        return response()->json([
            'UX' => [
                'total' => $UxBudget->total ?? 0,
                'spent' => $UxBudget->spent ?? 0,
            ]
        ]);
    }

    public function Gentri()
    {
        $GentriBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','Gentri Saliksik')->groupBy('category')->first();
        return response()->json([
            'Gentri' => [
                'total' => $GentriBudget->total ?? 0,
                'spent' => $GentriBudget->spent ?? 0,
            ]
        ]);
    }

    public function OkDepEd()
    {
        $OkDepEdBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','OK sa DepEd Gentri')->groupBy('category')->first();
        return response()->json([
            'OkDepEd' => [
                'total' => $OkDepEdBudget->total ?? 0,
                'spent' => $OkDepEdBudget->spent ?? 0,
            ]
        ]);
    }

    public function Secure()
    {
        $SecureBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','SECURE-PUSO')->groupBy('category')->first();
        return response()->json([
            'Secure' => [
                'total' => $SecureBudget->total ?? 0,
                'spent' => $SecureBudget->spent ?? 0,
            ]
        ]);
    }

    public function DRRM()
    {
        $DRRMBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','DRRM-SAFE')->groupBy('category')->first();
        return response()->json([
            'DRRM' => [
                'total' => $DRRMBudget->total ?? 0,
                'spent' => $DRRMBudget->spent ?? 0,
            ]
        ]);
    }

    public function Humane()
    {
        $HumaneBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','HUMANE')->groupBy('category')->first();
        return response()->json([
            'Humane' => [
                'total' => $HumaneBudget->total ?? 0,
                'spent' => $HumaneBudget->spent ?? 0,
            ]
        ]);
    }

    public function QMS()
    {
        $QMSBudget = projectModel::selectRaw('SUM(budget_amount)total,SUM(amount_spent)spent')->where('category','QMS/EOMS')->groupBy('category')->first();
        return response()->json([
            'QMS' => [
                'total' => $QMSBudget->total ?? 0,
                'spent' => $QMSBudget->spent ?? 0,
            ]
        ]);
    }
}