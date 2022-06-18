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
            <h2><i class="fa fa-list"></i> List of Departments
                <a href="{{route('departments.create')}}" class="btn btn-info pull-right">Go Back</a>
            
            </h2>
            @if (count($departments) > 0)
             <table class="table table-hover table-bordered">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    
                    <th>Action</th>
                </tr>
          
                @foreach ($departments as $key => $department )
            
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$department->name}}</td>
                    
                    <td>
                        
                        <a href="{{route('departments.edit',$department->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline-block" action="{{route('departments.destroy',$department->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </table>
            @else
            <p>No departments found</p>
                
            @endif
           
        </div>
    </div>
</div>
@endsection