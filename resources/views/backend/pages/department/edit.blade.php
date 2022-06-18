
@extends('backend.main')
@section('content')
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                  
        
                    <div class="card border-primary mb-3">
                        <div class="card-header">
                            <h4><i class="fa fa-home"></i> Edit Department
                            <a href="{{route('departments.index')}}" class="btn btn-info pull-right mr-2">Go back</a>
        
                            </h4>
                            <hr> 
                        </div>
                        <div class="card-body text-primary">
                            <form action="{{route('departments.update',$department->id)}}"  method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$department->name}}">
                                        <a style="color:red">
                                            @error('name')
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
