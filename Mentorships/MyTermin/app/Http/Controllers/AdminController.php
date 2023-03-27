<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

use App\Http\Requests\AdminFormRequest;
use App\Models\Appointment;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $doctors = Doctor::get();
        return view('admin.list', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminFormRequest $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialisation = $request->specialisation;
        if (!$doctor->save()) {

            return redirect()->back()->with('error', 'An error happened!');
        }
        return redirect()->back()->with('success', 'An new Doctor created');
    }


    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        
        $appointments = Appointment::get();
        return view('admin.appointments', compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $appointment = Appointment::find($appointment->id);
        $appointment->status = 'approved';
        if (!$appointment->save()) {

            return redirect()->back()->with('error', 'An error happened!');
        }

        return redirect()->back()->with('success', 'Approved successfully!');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment = Appointment::find($appointment->id);
        $appointment->status = 'canceled';
        if (!$appointment->save()) {

            return redirect()->back()->with('error', 'An error happened!');
        }

        return redirect()->back()->with('success', 'Canceled successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // if (!$appointment->delete()) {
        //     return redirect()->back()->with('error', 'An error happened!');
        // }
        // return redirect()->back()->with('success', 'Canceled successfully!');
    }
}
