@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Register employee
                    
                </li>
              </ol>
            </nav>
  <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">@csrf
  @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" >
                        @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" >
                        @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Mobile number </label>
                        <input type="number" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror">
                        @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                         <select class="form-control  @error('department') is-invalid @enderror" name="department_id" >
                          <option value="">select department</option>
                           @foreach (App\Models\Department::all() as $department)
                             <option value="{{$department->id}}">{{$department->name}}</option>
                           @endforeach 
                        </select>
                        @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" >
                        @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Start date</label>
                        <input type="date" name="start_from" id="datepicker" class="form-control @error('start_from') is-invalid @enderror" placeholder="dd-mm-yyyy">
                        @error('start_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login Information</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" >
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" >
                          <option value="">select role</option>
                          @foreach (App\Models\Role::all() as $role)

                            <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                            
                        </select>
                        @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                </div>

            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Submit</button>
            </div>
        </div>
      
    </div>
</form>
</div>
    
@endsection
