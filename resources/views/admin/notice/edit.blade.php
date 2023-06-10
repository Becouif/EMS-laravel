@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Notice</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
            @if (Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Notice') }}</div>

                <div class="card-body">
                   <form action="{{route('notices.update',[$notice->id])}}" method="post"> @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label for="name">Title</label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$notice->title}}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" >{{$notice->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                      <label for="name">Date</label>
                      <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$notice->date}}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Created By</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$notice->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
