@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Permission</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
            @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Update Permissions') }}</div>

                <div class="card-body">
                   <form action="{{route('permissions.update',[$permission->id])}}" method="post"> @csrf
                    {{ method_field('PATCH') }}
                    <h3>{{$permission->role->name}}</h3>

                    <!-- start of table  -->

                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Permissions</th>
                          <th scope="col">can-add</th>
                          <th scope="col">can-edit</th>
                          <th scope="col">can-view</th>
                          <th scope="col">can-delete</th>
                          <th scope="col">can-list</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Department</th>
                          <td><input type="checkbox" name="name[department] ['can-add']" @if(is_array($permission) && isset($permission['name']['department']['can-add']) && $permission['name']['department']['can-add']) 
                          checked
                          @endif id=""></td>
                          <td><input type="checkbox" name="name[department] ['can-edit']" @if(is_array($permission) && isset($permission['name']['department']['can-add']) && $permission['name']['department']['can-add']) 
                          checked
                          @endif  id=""></td>
                          <td><input type="checkbox" name="name[department] ['can-view']" {{is_array($permission) && isset($permission['name']['department']['can-add']) ? 'checked' : '' }} id=""></td>
                          <td><input type="checkbox" name="name[department] ['can-delete']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[department] ['can-list']" value="1" id=""></td>
                        </tr>
                        <tr>
                          <th scope="row">Role</th>
                          <td><input type="checkbox" name="name[role] ['can-add']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[role] ['can-edit']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[role] ['can-view']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[role] ['can-delete']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[role] ['can-list']" value="1" id=""></td>
                        </tr>
                        <tr>
                          <th scope="row">Permission</th>
                          <td><input type="checkbox" name="name[permission] ['can-add']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[permission] ['can-edit']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[permission] ['can-view']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[permission] ['can-delete']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[permission] ['can-list']" value="1" id=""></td>
                        </tr>
                        <tr>
                          <th scope="row">User</th>
                          <td><input type="checkbox" name="name[user] ['can-add']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[user] ['can-edit']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[user] ['can-view']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[user] ['can-delete']" value="1" id=""></td>
                          <td><input type="checkbox" name="name[user] ['can-list']" value="1" id=""></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    

                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
