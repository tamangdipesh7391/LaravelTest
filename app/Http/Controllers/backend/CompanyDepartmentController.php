<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyDepartment;
use App\Models\Department;
use Illuminate\Http\Request;

class CompanyDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function list($id)
    {
        $company_id = $id;
        $company = Company::where('id',$company_id)->first();
        $departments  = Department::all();
        $companydepartments = CompanyDepartment::where('company_id',$company_id)->get();
        // dd($companydepartments);
        return view('backend.pages.companydepartment.list', [
            'companydepartments' => $companydepartments,
            'company_id' => $company_id,
            'departments' => $departments,
            'company' => $company

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_array($request->department_id) && count($request->department_id) > 0){
            foreach($request->department_id as $department_id){
                if(!CompanyDepartment::where('company_id',$request->company_id)->where('department_id',$department_id)->exists()){
                    CompanyDepartment::create([
                        'company_id' => $request->company_id,
                        'department_id' => $department_id
                    ]);
                }
            }
            return redirect()->route('companies.index')->with('success','Company Department created successfully');

        }
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CompanyDepartment::where('company_id',$id)->delete();
        if(is_array($request->department_id) && count($request->department_id) > 0){
            foreach($request->department_id as $department_id){
               
                CompanyDepartment::updateOrCreate([
                    'company_id' => $request->company_id,
                    'department_id' => $department_id
                ]);
            }
            return redirect()->route('companies.index')->with('success','Company Department created successfully');

        }
        return redirect()->route('companies.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
