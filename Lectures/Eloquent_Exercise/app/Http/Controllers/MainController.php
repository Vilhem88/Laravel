<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Client;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class MainController extends Controller
{
    public function employees()
    {
        $employees = Employee::whereHas('role', function (Builder $query) {
            $query->where('name', 'developer')
                ->orWhere('name', 'sales');
        })->get();

        return view('employees', compact('employees'));
    }

    public function sales()
    {

        $avg_bonus = Bonus::avg('bonus');

        $employees = Employee::whereHas('role', function (Builder $query) {

            $query->where('name', 'sales');
        })->whereHas('bonus', function (Builder $query) use ($avg_bonus) {
            $query->where('bonus', '>=', $avg_bonus);
        })->orderBy('first_name', 'asc')
            ->get();
    
        return $employees;

    }


    public function projects(){
        $projects = Project::all();
    }

    public function employeeProject(){

        $employees = Employee::all();

    }

    
    public function overdue(){
        $projects = Project::where('due_date', '<=', date('Y-m-d H:i:s'))
        ->where('finished', 0)
        ->get();
    
        return  $projects;    
        
    }

    public function clients(){
        $clients = Client::all();
    }

    public function clientProjects(Client $client){

        return view('projects', ['projects' => $client->projects]);

    }

}
