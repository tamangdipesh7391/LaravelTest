@extends('backend.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
            <h2><i class="fa fa-list"></i> List of Companies
                <a href="{{route('companies.create')}}" class="btn btn-info pull-right">Go Back</a>
            
            </h2>
            @if (count($companies) > 0)
             <table class="table table-hover table-bordered">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
          
                @foreach ($companies as $key => $company )
            
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->location}}</td>
                    <td>{{$company->contact}}</td>
                    <td>
                     
                        <a class="btn btn-warning" data-toggle="modal" data-target="#departments{{$key}}">Add Departments</a>
                        <a class="btn btn-primary" href="{{route('companydepartments.list',$company->id)}}">Manage Department</a>
                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline-block" action="{{route('companies.destroy',$company->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
     {{-- ==================Department========================== --}}

            <div class="modal fade" id="departments{{$key}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="departments{{$key}}" aria-hidden="true">
                <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="departments{{$key}}">Available Departments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('companydepartments.store')}}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->id}}">
                            <div class="form-group">
                                <label for="department">Choose Department</label><br>
                                <select name="department_id[]" id="department{{$key}}" style="width: 100% !important;" multiple class="form-control select-multiple">
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                    
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
    {{-- ==================end department===================== --}}
                @endforeach
            </table>
            @else
            <p>No companies found</p>
                
            @endif
           
        </div>
    

    </div>
</div>


@endsection