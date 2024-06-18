<template>
    <div>
        <div class="d-flex justify-content-center mt-3">
            <div @click="home()" class="btn bg-dark mr-5">Home</div>
            <div @click="loginPage()" class="btn bg-dark">Login</div>
          </div>
        <div class="container">
            <div class="col-6 offset-3 shadow p-5 my-5" style="border-radius:10px">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</template>

<script src="../js/LoginPage.js"></script>
