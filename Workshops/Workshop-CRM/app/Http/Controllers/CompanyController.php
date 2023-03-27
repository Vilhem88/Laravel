<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::join('countries', 'countries.id', 'companies.country_id')
            ->select('companies.*', 'countries.name as country')
            ->orderBy('id')
            ->get();

        return view('/layouts/company.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::get();
        return view('layouts/company.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company =  new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->country_id = $request->country;

        if($company->save()) {

            return redirect('/company')->with('success', 'New company created successfully');
        }
        
        return redirect('/company')->with('error', 'The specified resource does not exist');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // dd($company);
        $countries = Country::all();
        return view('/layouts/company.edit', compact('company', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->country_id = $request->country;

        if($company->save()){
            return redirect('/company')->with('success', 'Edited successfully');
        }
        return redirect('/company')->with('error', 'The specified resource does not exist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
         $company = Company::find($company->id);

         if($company){
            if($company->delete()){
                return redirect('/company')->with('success', 'Company deleted successfully');
            }
         }
    }
}
