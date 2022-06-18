
@extends('backend.main')
@section('content')
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
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
        
                    <div class="card border-primary mb-3">
                        <div class="card-header">
                            <h4><i class="fa fa-home"></i> Add Company
                            <a href="{{route('companies.index')}}" class="btn btn-info pull-right">View Company</a>
        
                            </h4>
                            <hr> 
                        </div>
                        <div class="card-body text-primary">
                            <form action="{{route('companies.store')}}"  method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name">
                                        <a style="color:red">
                                            @error('name')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="location">Location <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" multiple class="form-control" id="location" name="location">
                                        <a style="color:red" >
                                        @error('location')
                                            {{$message}}
                                            
                                        @enderror
                                        </a>
        
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="contact">Contact <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" multiple class="form-control" id="contact" name="contact">
                                        <a style="color:red">
                                            @error('contact')
                                            {{$message}}
                                                
                                            @enderror
                                        </a>
        
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button class="btn btn-info" name="submit" value="submit">Add</button>
        
                                    </div>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
