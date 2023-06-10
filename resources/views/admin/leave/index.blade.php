@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    <!-- start of table  -->
                    <table class="table mt-5">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date from</th>
                        <th scope="col">Date to</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">Approve/Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($leaves)>0)
                        @foreach ($leaves as $key=>$leave)
                        <tr>
                        <th scope="row">{{ $leave->user->name }}</th>
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
                          <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >
                              <i class="fa-regular fa-trash-can"></i>
                            </button>
                            <div class="form-group">
                            <label for="">Status</label>
                              <select name="status" class="form-control" id="">
                                <option value="0">pending</option>
                                <option value="1">Approve</option>
                              </select>
                            </div>


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
    </div>
</div>
@endsection
