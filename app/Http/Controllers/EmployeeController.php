<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::where('active', 1)->paginate(10);
        return view('employees', ['employees' => $employees]);
    }

    public function viewEmployee($id)
    {
        $show_id = decrypt($id);
        $employee = Employee::Where('id', $show_id)->first();
        return view('view_employee', ['employee' => $employee]);
    }

    public function destroy($id, Request $request)
    {
        $delete_id = decrypt($id);
        $employee = Employee::Where('id', $delete_id)->delete();
        return response([], 200);
    }
    public function employeeCreateForm()
    {
        $companies = Company::select('id', 'name')->get();
        $arrays = array();
        foreach ($companies as $company) {
            $arrays[$company['id']] = $company['name'];
        }
        return view('showemployee', ['companies' => $arrays]);
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->designation = $request->designation;
        $employee->active = $request->active;
        $employee->save();
        return redirect()->back()->with('success', 'New Employee information has been added!');
    }

    public function editEmployeeForm($id)
    {
        $edit_id = decrypt($id);
        $employee = Employee::Where('id', $edit_id)->first();
        $companies = Company::select('id', 'name')->get();
        $arrays = array();
        foreach ($companies as $company) {
            $arrays[$company['id']] = $company['name'];
        }
        return view('employee_edit',['employee' => $employee, 'companies' => $arrays]);
    }
    public function editEmployee(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->designation = $request->designation;
        $employee->active = $request->active;
        $employee->save();
        return redirect()->back()->with('success', 'Employee information has been updated!');
    }

    public function downloadCsv(Request $request){
        $name = $request->name;
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        $filename = $name.'.csv';
        $filepath = public_path()."/csv/".$filename;
        return Response::download($filepath, $filename, $headers);
    }
}
