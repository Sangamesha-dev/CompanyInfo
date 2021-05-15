<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //  $companies = Company::where('active', 1)->paginate(10);
        $companies = Company::select(['id','name','email','logo','website'])
                ->where('active', 1)
                ->withCount('employees')
                ->paginate(10);
        return view('companies', ['companies' => $companies]);
    }

    public function showform()
    {
        return view('showcompany');
    }

    public function viewCompany($id)
    {
        $show_id = decrypt($id);
        $companies = Company::Where('id', $show_id)->first();
        return view('view_company', ['companies' => $companies]);
    }
    public function destroy($id)
    {
        $delete_id = decrypt($id);
        $empCount = Employee::where('company_id', $delete_id)->count();
        if ($empCount > 0) {
            return response([], 409);
        } else {
            Company::Where('id', $delete_id)->delete();
        }
        return redirect('/companies');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $path = '';
        if ($request->hasFile('logo'))
        {
            if ($request->file('logo')->isValid()) {
                $extension = $request->logo->extension();
                if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg') {
                    $path = $request->logo->store('public');
                }
            }
        }
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->Email;
        $company->logo = $path;
        $company->website = $request->website;
        $company->active = $request->active;
        $company->save();
        return redirect()->back()->with('success', 'New Company information has been added!');
    }

    public function editCompanyForm($id)
    {
        $edit_id = decrypt($id);
        $company = Company::Where('id', $edit_id)->first();
        return view('company_edit',['company' => $company]);
    }

    public function editCompany(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $path = '';
        if ($request->hasFile('logo'))
        {
            if ($request->file('logo')->isValid()) {
                $extension = $request->logo->extension();
                if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg') {
                    $path = $request->logo->store('public');
                }
            }
        }
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email = $request->Email;
        If($path != ''){
            $company->logo = $path;
        }
        $company->website = $request->website;
        $company->active = $request->active;
        $company->save();
        return redirect()->back()->with('success', 'Company information has been updated!');
    }
}
