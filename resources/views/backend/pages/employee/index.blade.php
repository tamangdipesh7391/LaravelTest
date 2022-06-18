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
            <h2><i class="fa fa-list"></i> List of Employees
                <a href="{{route('employees.create')}}" class="btn btn-info pull-right mr-2">Go back</a>

            </h2>
            @if (count($employees) > 0)
             <table class="table table-hover table-bordered">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Emp Number</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>
          
                @foreach ($employees as $key => $employee )
            
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->employee_number}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->getDesignation->name}}</td>
                    <td>
                     
                       
                        <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline-block" action="{{route('employees.destroy',$employee->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
 
                @endforeach
            </table>
            @else
            <p>No companies found</p>
                
            @endif
           
        </div>
    

    </div>
</div>


@endsection