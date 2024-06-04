@extends('admin.layouts.app')

@section('title','My Media App')

@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ $user->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputPhone" placeholder="Phone" value="{{ $user->phone }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea cols="10" rows="5" class="form-control" id="inputAddress" placeholder="Address">{{ $user->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select  class="form-control" id="inputGender">
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
                  <a href="">Change Password</a>
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
