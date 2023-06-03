@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">All employee</li>
              </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
           
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Start Date</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
           
            <tbody>
              @if (count($users)>0)
                
              @foreach ($users as $key=>$user)
                

             
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset('profile')}}/{{$user->image}}" alt="{{$user->name}}" width="60"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->department->name ?? 'default'}}</td>
                    <td>{{$user->designation}}</td>
                    <td>{{$user->mobile_number}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->start_from}}</td>
                    <td>{{$user->role->name ?? 'null'}}</td>
                    <td>
                      <a href="{{route('users.edit',[$user->id])}}"><i class="fas fa-edit"></i></a>

                    </td>

                    <td>
                          <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
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
                <td>No users to display</td>
              
                @endif
               
              
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
