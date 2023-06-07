@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Create Leave
                    
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
                        <label>From Date</label>
                        <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" id="datepicker" >
                        @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>To date</label>
                        <input type="date" name="to" class="form-control @error('to') is-invalid @enderror" id="datepicker1" >
                        @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Type of Leave</label>
                        <select class="form-control" name="type" id="">
                          <option value="annualleave">Annual Leave</option>
                          <option value="sickleave">Sick Leave</option>
                          <option value="parental">Parental Leave</option>
                          <option value="other">Other Leave</option>
                        </select>
                        @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Description </label>
                        <textarea type="number" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
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
                    <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
        </div>
      

    </div>
</form>
</div>
    
@endsection
