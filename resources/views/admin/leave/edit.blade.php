@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">


            @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Leave</div>
                <div class="card-body">
                    <form action="{{ route('leaves.update',[$leave->id]) }}" method="post" enctype="multipart/form-data">@csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" value="{{$leave->from}}" id="datepicker" >
                            @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" name="to" class="form-control @error('to') is-invalid @enderror" value="{{$leave->to}}" id="datepicker1" >
                            @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of Leave</label>
                            <select class="form-control" name="type" id="">
                            <option  value="annualleave">Annual Leave</option>
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
                            <textarea type="number" name="description" class="form-control @error('description') is-invalid @enderror">{{$leave->description}}</textarea>
                            @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end of card  -->

        </div>
      

    </div>


</div>
    
@endsection
