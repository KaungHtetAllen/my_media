@extends('admin.layouts.app')

@section('title','Change Password Page')

@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
        @if(session('changeSuccess'))
        <div class="row">
            <div class="col offset-7">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                   <span>{{ session('changeSuccess')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            </div>
        </div>
        @endif
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Change Password Page</legend>
          @if(session('notMatch'))
          <div class="row mt-2">
              <div class="col-8 offset-2">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="fa-solid fa-triangle-exclamation mr-2"></i><span>{{ session('notMatch')}}</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
              </div>
          </div>
          @endif
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form class="form-horizontal" action="{{ route('admin#changePassword')}}" method="POST">
                @csrf
                <div class="form-group row my-4">
                  <label for="inputOldPassword" class="col-sm-3 offset-1 col-form-label">Old Password</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" name="adminOldPassword" id="inputOldPassword" placeholder="Old Password" >
                    @error('adminOldPassword')
                        <div class="text-danger">{{ $message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row my-4">
                  <label for="inputNewPassword" class="col-sm-3 offset-1 col-form-label">New Password</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" name="adminNewPassword" id="inputNewPassword" placeholder="New Password">
                    @error('adminNewPassword')
                        <div class="text-danger">{{ $message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row my-4">
                    <label for="inputConfirmPassword" class="col-sm-3 offset-1 col-form-label">Confirm Password</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" name="adminConfirmPassword" id="inputConfirmPassword" placeholder="Confirm Password">
                      @error('adminConfirmPassword')
                        <div class="text-danger">{{ $message}}</div>
                      @enderror
                    </div>
                  </div>


                <div class="form-group row my-4">
                  <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn bg-dark text-white">Change</button>
                  </div>
                </div>
              </form>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
