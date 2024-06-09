@extends('admin.layouts.app')

@section('content')
<div class="col-4 offset-1">
    <div class="card mt-3">
        <div class="card-header">
            <div class="card-title">
                <div class="text-success" style="font-weight: 800;font-size:1.3rem">Create Category</div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin#createCategory')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control @error('categoryName') is-invalid @enderror" name="categoryName" placeholder="Enter Category Name ...">
                    @error('categoryName')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Category Description</label>
                    <textarea class="form-control @error('categoryDescription') is-invalid @enderror" name="categoryDescription" cols="30" rows="5" placeholder="Enter Category Description ..."></textarea>
                    @error('categoryDescription')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">
            <div class="text-dark" style="font-weight: 700; font-size:1.3rem">Category List</div>
        </h3>

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
              <th class="col-1">ID</th>
              <th class="col-2">Category Name</th>
              <th class="col-4">Category Description</th>
              <th class="col-2">Created Date</th>
              <th class="col-3"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at->format('d-M-Y')}}</td>
                <td>
                  <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
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
