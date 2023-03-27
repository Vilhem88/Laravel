<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentFormRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            define('USER', 0);
            if (Auth::user()->user_type == USER) {
                return view('user.home');
            } else {

                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function titlePage()
    {
        return view('user.home');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::get();
        return view('appointment.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentFormRequest $request)
    {
        
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->status = 'In progress';
        $appointment->doctor_id = $request->doctor_id;
        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        if (!$appointment->save()) {
            return redirect(route('titlePage'))->with('error', 'An error has occurred!');
        }

        return redirect(route('titlePage'))->with('success', 'A new appointment has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        if (!Auth::id() == null) {

            $appointments = Appointment::where('user_id', Auth::user()->id)->get();
            return view('user.list', compact('appointments'));
        }

        return redirect(route('titlePage'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {   
        if(Auth::id() == null){
            return redirect(route('titlePage'));    
        }
        if(!$appointment->delete()){
            return redirect(route('home.show'))->with('error', 'An error has occurred!');
        }
        return redirect(route('home.show'))->with('success', 'An appointment has been deleted!');
    }
}
