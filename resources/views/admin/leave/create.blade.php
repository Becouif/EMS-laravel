@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">


            @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Leave</div>
                <div class="card-body">
                    <form action="{{ route('leaves.store') }}" method="post" enctype="multipart/form-data">@csrf
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
                            <textarea type="number" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end of card  -->


                    <!-- start of table  -->
                    <table class="table mt-5">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date from</th>
                        <th scope="col">Date to</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($leaves)>0)
                        @foreach ($leaves as $key=>$leave)
                        <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}}</td>
                        <td>{{$leave->description}}</td>
                        <td>{{$leave->type}}</td>
                        <td>{{$leave->message}}</td>

                        <td>
                            @if ($leave->status == 0)
                                <span class="alert alert-danger">pending</span>
                                @else
                                <span class="alert alert-success">Approved</span>
                            @endif
                        </td>

                        <td><a href="{{route('leaves.edit',[$leave->id])}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td>
                          <form action="{{ route('leaves.destroy', [$leave->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete()">
                              <i class="fa-regular fa-trash-can"></i>
                            </button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                        @else 
                        <p>No leave submitted yet</p>
                        @endif

                      
                    </tbody>
                    </table>

        </div>
      

    </div>


</div>
    
@endsection
