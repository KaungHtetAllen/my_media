@extends('admin.layouts.app')

@section('title','My Media App')

@section('content')
<form action="">
    <div class="row">
        <div class="col-7 offset-1 py-3">
            <div class="form-group mt-3">
                <label class="mb-2">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name ...">
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email ...">
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Phone</label>
                <input type="number" class="form-control" placeholder="Enter Phone ...">
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Address</label>
                <textarea class="form-control" cols="30" rows="5" placeholder="Enter Address ..."></textarea>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-dark">Update</button>
            </div>

        </div>
    </div>
</form>
<div class="row">
    <div class="col-7 offset-1">
        <a href="">Change Password</a>
    </div>
</div>
@endsection
