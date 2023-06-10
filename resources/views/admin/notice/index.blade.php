@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <nav aria-label="breadcrumb" class="custom-breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All notices</li>
              </ol>
              @if (Session::has('message'))
                    <div class="alert alert-info">{{Session::get('message')}}</div>
                    @endif
          </nav>
          @if (count($notices)>0)
          @foreach ($notices as $notice)
            <div class="card alert alert-info">
                  <div class="card-header alert alert-warning">{{$notice->title}}</div>

                  <div class="card-body">
                    <p>{{ $notice->description }}</p>
                    <p class="badge bg-success">Date: {{$notice->date}}</p>
                    <p class="float-end badge bg-warning  text-dark">Created By: {{$notice->name}}</p>
                    
                  </div>
                  <!-- start of footer  -->
                  <div class="card-footer">
                    <a href="{{route('notices.edit',[$notice->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form class="float-end" action="{{ route('notices.destroy', [$notice->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete()">
                              <i class="fa-regular fa-trash-can"></i>
                            </button>
                    </form>
                  </div>
              </div>
                          
          @endforeach
              @else
              <div class="card alert alert-info">
                <div class="card-body">
                  <p>No Notices Available yet</p>
                </div>
              </div>
          @endif

        </div>
    </div>
</div>
@endsection
