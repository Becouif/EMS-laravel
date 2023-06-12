@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Mail</div>

                <div class="card-body">
                  <form enctype="multipart/form-data" action="{{route('mail.store')}}" method="post">@csrf

                    <div class="form-group">
                      <label for="mail">Select</label>
                      <!-- note id="" is important in this select -->
                      <select class="form-control" name="mail" id="mail">
                        <option value="0">mail to all staff</option>
                        <option value="1">Choose department</option>
                        <option value="2">Choose person</option>
                      </select>
                      <br>
                      <select class="form-control" name="department" id="departmentInput">
                        @foreach (App\Models\Department::all() as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach

                      </select>
                      <br>
                      <select class="form-control" name="user" id="userInput">
                        @foreach (App\Models\User::all() as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select>
                      <!-- textarea for body  -->
                      <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" class="form-control @error('body') is-invalid
                        @enderror" id="" cols="30" rows="10"></textarea>
                        @error('body')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                      </div>
                      <!-- input for file  -->
                      <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid
                        @enderror">
                        @error('file')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                      </div>
                      

                      <!-- button  -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>



                    </div>
                    

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
  #departmentInput{
    display: none;
  }
  #userInput{
    display:none;
  }
</style>



@endsection
