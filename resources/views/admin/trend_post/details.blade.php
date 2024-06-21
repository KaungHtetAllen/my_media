@extends('admin.layouts.app')

@section('content')
<div class="col-6 offset-3 mt-5">
    <button class="btn btn-dark mb-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></button>
    <div class="card">
        <div class="card-header text-center">
            @if (!$post->image)
            <img width="500px" src="{{ asset('default_image.jpg')}}" class="img-thumbnail rounded shadow" alt="">
            @else
            <img width="500px" class="img-thumnail rounded shadow" src="{{ asset('postImage/'.$post->image)}}" alt="">
            @endif
        </div>
        <div class="card-body">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
        </div>
    </div>
    <!-- /.card -->
  </div>

@endsection
