@extends('admin.layouts.app')

@section('content')
<div class="col-4 offset-1">
    <div class="card mt-3">
        <div class="card-header">
            <div class="card-title">
                <div class="text-success" style="font-weight: 800;font-size:1.3rem">Create Post</div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin#createPost')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" value="{{ old('postTitle',$data->title)}}" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle" placeholder="Enter Post Title ...">
                    @error('postTitle')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea class="form-control @error('postDescription') is-invalid @enderror" name="postDescription" cols="30" rows="5" placeholder="Enter Post Description ...">{{ old('postDescription',$data->description)}}</textarea>
                    @error('postDescription')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Post Image</label>
                    {{-- <input type="file" class="form-control" name="postImage"> --}}
                    @if(!$data->image)
                    <image src="{{ asset('default_image.jpg')}}" class='img-thumbnail'>
                    @else
                    <image src="{{ asset('postImage/'.$data->image)}}" class='img-thumbnail'>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Post Category</label>
                    <select  name="postCategory" class="form-control  @error('postCategory') is-invalid @enderror">
                        <option value="">Choose Option ...</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id}}" @if($data->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('postCategory')
                    <span class="text-danger">
                        {{ $message }}
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
<div class="col-6">
        @if(session('deleteSuccess'))
        <div class="row mt-3">
            <div class="col offset-7">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <span>{{ session('deleteSuccess')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            </div>
        </div>
        @endif
        @if(session('updateSuccess'))
        <div class="row mt-3">
            <div class="col offset-7">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                   <span>{{ session('updateSuccess')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            </div>
        </div>
        @endif
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">
            <div class="text-dark" style="font-weight: 700; font-size:1.3rem">Post List</div>
        </h3>

        <div class="card-tools">
          <form action="{{ route('admin#categorySearch')}}" method="POST">
            @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="categorySearchKey" value="{{ old('categorySearchKey')}}" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th class="col-1">ID</th>
              <th class="col-2">Post Title</th>
              <th class="col-4">Post Image</th>
              <th class="col-2">Created Date</th>
              <th class="col-3"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    @if (!$post->image)
                    <img width="100px" src="{{ asset('default_image.jpg')}}" class="img-thumbnail" alt="">
                    @else
                    <img width="100px" class="img-thumnail" src="{{ asset('postImage/'.$post->image)}}" alt="">
                    @endif
                </td>
                <td>{{ $post->created_at->format('d-M-Y')}}</td>
                <td>
                    <a href="{{ route('admin#postEditPage',$post->id)}}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                    </a>
                    <a href="{{ route('admin#deletePost',$post->id)}}">
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                    </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
