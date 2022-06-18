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
            <h2><i class="fa fa-list"></i> List of Designations
                <a href="{{route('designations.create')}}" class="btn btn-info pull-right mr-2">Go back</a>

            </h2>
            @if (count($designations) > 0)
             <table class="table table-hover table-bordered">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    
                    <th>Action</th>
                </tr>
          
                @foreach ($designations as $key => $designation )
            
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$designation->name}}</td>
                    
                    <td>
                        
                        <a href="{{route('designations.edit',$designation->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline-block" action="{{route('designations.destroy',$designation->id)}}" method="POST">
                           @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </table>
            @else
            <p>No designations found</p>
                
            @endif
           
        </div>
    </div>
</div>
@endsection