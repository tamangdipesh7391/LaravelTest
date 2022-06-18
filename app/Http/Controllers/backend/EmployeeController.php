<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeDepartment;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.pages.employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('backend.pages.employee.create',[
            'designations' => $designations,
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $empID = Employee::create($request->validated())->id;
        if(is_array($request->department_id) && count($request->department_id) > 0){
           
            foreach($request->department_id as $department_id){
                EmployeeDepartment::create([
                    'employee_id' => $empID,
                    'department_id' => $department_id
                ]);

            }
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');

        }
        
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
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
        $associatedDepartment = EmployeeDepartment::where('employee_id', $id)->pluck('department_id')->toArray();
        $departments = Department::all();
        $designations = Designation::all();
        $employee = Employee::findOrFail($id);
        return view('backend.pages.employee.edit', [
            'employee' => $employee,
            'designations' => $designations,
            'departments' => $departments,
            'associatedDepartment' => $associatedDepartment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        if(is_array($request->department_id) && count($request->department_id) > 0){
            EmployeeDepartment::where('employee_id', $id)->delete();
            foreach($request->department_id as $department_id){
                EmployeeDepartment::create([
                    'employee_id' => $id,
                    'department_id' => $department_id
                ]);
            }
        }else{
            EmployeeDepartment::where('employee_id', $id)->delete();
        }
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $associatedDepartment = EmployeeDepartment::where('employee_id', $id)->count();
        if($associatedDepartment > 0){
            return redirect()->route('employees.index')->with('error', 'Employee has associated department. Please delete the associated department first');
        }
        Employee::findOrFail($id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
