<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Models\Appointment;
use App\DataTables\AppointmentsDataTable;
use Illuminate\Support\Facades\DB;
use Auth;

class ReportController extends Controller
{

    public function index()
    {
        //$appointments = Appointment::all();
        //dd($appointments);
        //return view('Reports.labowner_appointment', compact('appointments'));
    }

    public function generateReport(AppointmentsDataTable $dataTable, Request $request){
        $current_user = Auth::user()->id;
            $labs = Lab::get();

        foreach( $labs as $lab){
            if( $lab->user_id == $current_user ){
                  $currentLab = $lab->name;
             }
        }

//dd($currentLab);
        $appointments = DB::table('appointments')
                            ->select('location')
                            ->where('lab', '=', $currentLab)
                            ->groupBy('location')
                            ->get();

    return $request->isMethod(method:'post')
                    ? $this->create($request)
                    :$dataTable->render('Reports.labowner_appointment', compact('appointments'));
    }






}
