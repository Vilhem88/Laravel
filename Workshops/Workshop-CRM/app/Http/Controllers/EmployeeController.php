<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $employees = Employee::where('company_id', $company->id)->get();
        return view('/layouts/employee.list', compact('employees' ,'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('layouts/employee.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Employee $employee, Company $company)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $company->id;

        if($employee->save()){

           return redirect()->route('company.employee.index', $company->id)->with('success', 'New employee added successfully');
        }
        
        return  redirect()->route('company.employee.index', $company->id)->with('error', 'The specified resource does not exist');
        


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, Company $company, Employee $employee)
    {
        
        return view('layouts/employee.edit', compact('employee', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Company $company, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if($employee->save()){

             return redirect()->route('company.employee.index', $company->id)->with('success', 'Employee edited successfully');
        }
        
        return  redirect()->route('company.employee.index', $company->id)->with('error', 'The specified resource does not exist');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company ,Employee $employee)
    {
        $employee = Employee::find($employee->id);
        if($employee){
            if($employee->delete()){
                return redirect()->route('company.employee.index', $company->id)->with('success', 'Employee deleted successfully');
            }
         }
    }
}
