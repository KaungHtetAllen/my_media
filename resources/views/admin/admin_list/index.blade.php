@extends('admin.layouts.app')

@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-6 offset-6">
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
        </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User Table</h3>

        <div class="card-tools">
          <form action="{{ route('admin#adminListSearch')}}" method="POST">
            @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="adminSearchKey" value="{{ old('adminSearchKey')}}" class="form-control float-right" placeholder="Search">

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
              <th>ID</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Gender</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td class=" text-capitalize">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                  {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                    @if ($user->id == '1')
                    <button disabled="disabled" class="btn btn-sm btn-success text-white">Owner</button>
                    @elseif ($user->id != Auth::user()->id)
                    <a href="{{ route('admin#delete',$user->id)}}">
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                    </a>
                    @endif
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
