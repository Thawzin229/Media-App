<template>
  <div>
    <div class="container  vh-100 d-flex justify-content-center align-items-center ">
        <div class="col-7  bg-light shadow p-5">
          <legend><h2>LOGIN</h2></legend>
  <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="!tokenStatus">
  <strong>Opps!</strong> Check your email and password
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
          <div class="form-floating mb-5">
  <input  v-model="userData.email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input  v-model="userData.password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>
<div class="text-center mt-5">
  <button class="btn btn-success" @click="accLogin()">LOGIN</button>
  <button class="btn btn-success mx-4" @click="home()">Home</button>
</div>

        </div>
    </div>
  </div>
</template>
<script src="../js/login.js"></script>