@extends('admin.layouts.app')

@section('title','My Media App')

@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
        @if(session('updateSuccess'))
        <div class="row">
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
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form class="form-horizontal" action="{{ route('admin#updateAdminAccount')}}" method="POST">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="adminName" id="inputName" value="{{ old('adminName',$user->name)}}" placeholder="Name" value="{{ $user->name}}">
                    @error('adminName')
                        <div class="text-danger">{{ $message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="adminEmail" id="inputEmail" value="{{ old('adminEmail',$user->email)}}" placeholder="Email" value="{{ $user->email }}">
                    @error('adminEmail')
                        <div class="text-danger">{{ $message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="adminPhone" id="inputPhone" placeholder="Phone" value="{{ $user->phone }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea cols="10" rows="5" class="form-control" name="adminAddress" id="inputAddress" placeholder="Address">{{ $user->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select  class="form-control" id="inputGender" name="adminGender">
                        @if ($user->gender == 'male')
                        <option value="empty">Choose Gender ...</option>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        @elseif($user->gender == 'female')
                        <option value="empty">Choose Gender ...</option>
                        <option value="male">Male</option>
                        <option value="female" selected>Female</option>
                        @else
                        <option value="empty" selected>Choose Gender ...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        @endif

                      </select>
                    </div>
                  </div>


                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn bg-dark text-white">Update</button>
                  </div>
                </div>
              </form>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <a href="{{ route('admin#changePasswordPage')}}">Change Password</a>
                </div>
              </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
