
@extends('backend.main')
@section('content')
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                  
        
                    <div class="card border-primary mb-3">
                        <div class="card-header">
                            <h4><i class="fa fa-home"></i> Edit Employee
                            <a href="{{route('employees.index')}}" class="btn btn-info pull-right mr-2">Go back</a>
        
                            </h4>
                            <hr> 
                        </div>
                        <div class="card-body text-primary">
                            <form action="{{route('employees.update',$employee->id)}}"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
                                        <a style="color:red">
                                            @error('name')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="email">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
                                        <a style="color:red">
                                            @error('email')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="employee_number">Employee Number <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" id="employee_number" name="employee_number" value="{{$employee->employee_number}}">
                                        <a style="color:red">
                                            @error('employee_number')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="contact">Contact <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="number"  class="form-control" id="contact" name="contact" value="{{$employee->contact}}">
                                        <a style="color:red">
                                            @error('contact')
                                            {{$message}}
                                                
                                            @enderror
                                        </a>
        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="designation">Designation <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <select name="designation_id" id="designation" class="form-control" >
                                            <option selected disabled>Select Designation</option>
                                            @foreach ($designations as $designation)
                                            <option 
                                            @if ($employee->designation_id == $designation->id)
                                                {{"selected"}}
                                            @endif value="{{$designation->id}}">{{$designation->name}}</option>
                                                
                                            @endforeach
                                        </select>
                                        <a style="color:red" >
                                        @error('designation')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="department">Departments <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                       
                                        <select name="department_id[]" id="department"  class="form-control select-multiple" multiple >
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}" 
                                                @if (in_array($department->id, $employee->departments->pluck('id')->toArray()))
                                                    {{"selected"}}
                                                    
                                                @endif
                                                >{{$department->name}}</option>
                                                
                                            @endforeach
                                        </select>
                                        <a style="color:red" >
                                        @error('department')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                               
                               
                               
                                <div class="form-group row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button class="btn btn-info" name="submit" value="submit">Update</button>
        
                                    </div>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
