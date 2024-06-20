<template>
    <div>
        <div class="d-flex justify-content-center mt-3">
            <div @click="home()" class="btn bg-dark mr-5" v-if="tokenStatus">Home</div>
            <div @click="loginPage()" class="btn bg-dark">Login</div>
          </div>
        <div class="container">
            <div class="col-6 offset-3 shadow p-5 my-5" style="border-radius:10px">
              <div class="alert alert-danger" role="alert" v-if="userStatus">
                The Credentials Do not Match!
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" v-model="userData.email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" v-model="userData.password" v-on:keyup.enter="accountLogin()" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary" @click="accountLogin()">Login</button>
            </div>
        </div>
    </div>
</template>

<script src="../js/LoginPage.js"></script>
