@extends('admin.layouts.app')

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Order Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>Post ID</th>
              <th>Post Title</th>
              <th>Post Image</th>
              <th>View Count</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->post_id}}</td>
                <td>{{ $post->title }}</td>
                <td>
                    @if (!$post->image)
                    <img width="100px" src="{{ asset('default_image.jpg')}}" class="img-thumbnail rounded shadow" alt="">
                    @else
                    <img width="100px" class="img-thumnail rounded shadow" src="{{ asset('postImage/'.$post->image)}}" alt="">
                    @endif
                </td>
                <td class="d-flex justify-content-center align-items-center"><i class="fa-solid fa-eye mr-2"></i> <span>{{ $post->post_count }}</span></td>
                <td>
                    <a href="{{ route('admin#trendPostDetails',$post->post_id)}}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-file"></i></button>
                    </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{-- <div class="px-5">
            {{ $posts->appends(request()->query())->links() }}
        </div> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

@endsection
