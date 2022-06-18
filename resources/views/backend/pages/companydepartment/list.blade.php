@extends('backend.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="cart" >
                    <div class="cart-header">
                      <h5 class="cart-title" id="departments">List of Departments in {{$company->name}} <a class="btn btn-info pull-right" href="{{route('companies.index')}}">Go Back</a></h5>
                     <hr>
                    </div>
                    @if (count($companydepartments) > 0)
                    <?php foreach ($companydepartments as $companydepartment) {
                        $departmentIDs[] = $companydepartment->department_id;

                        }
                        
                        ?>
                     <form action="{{route('companydepartments.update',$company_id)}}" method="POST">
                    <div class="cart-body">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="company_id" value="{{$company_id}}">
                            <div class="form-group">
                                <select name="department_id[]" id="department" style="width: 100% !important;" multiple class="form-control select-multiple">
                                  
                                       @foreach ($departments as $key => $department)
                                        <option value="{{$department->id}}" 
                                            @if (in_array($department->id, $departmentIDs))
                                             
                                            {{"selected"}}
                                            
                                            
                                        @endif >{{$department->name}}</option>
                                    @endforeach
                                  
                                    
                                </select>
                            </div>
                           
                       
                    </div>
                    <div class="cart-footer">
                       
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                @else
            <strong>No Departments Found</strong>
            
        @endif
                 
              </div>
        </div>
    </div>
</div>



@endsection