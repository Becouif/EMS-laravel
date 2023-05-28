@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Department</li>
            </ol>
        </nav>
            @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('View Department') }}</div>

                <div class="card-body">
                   <table class="table table-bordered" id="myTable" cellspacing="0">
                    <thead>



                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>

                    </thead>
                    
                    <tbody>
                    @if (count($departments)>0)
                    @foreach ($departments as $key=>$department)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->description}}</td>
                        <td><a href="{{route('departments.edit',[$department->id])}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td>
                          <form action="{{ route('departments.destroy', [$department->id]) }}" method="post">
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
                      <td><p>No department available</p></td>
                      
                      @endif
                    </tbody>

                   </table>
                  
                   
                </div>
               
            </div>
            {{ $departments->links() }}
        </div>
    </div>
</div>


@endsection