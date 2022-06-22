@extends('layouts.app2')
@section('pageTitle','Admin Login')
@section('content')
    <div class="container animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-md-5 center-screen">
                <img class="login-logo animated fadeInDown" src="{{asset("img/logo.svg")}}">
                <div class="content-card  mt-3 w-100">
                        <div class="p-3 animated fadeIn">
                            <h4 class="mb-4">ADMIN LOGIN</h4>
                            <input required="" placeholder="User Name" type="text" class="form-control form-round my-3" id="username" >
                            <input placeholder="Password" required=""  class="form-control form-round my-3" type="password" id="password" >
                            <button  id="login-btn" type="submit" class="btn w-100 btn-round  my-2 btn-sm btn-success" >Login</button>
                        </div>
                </div>
            </div>

        </div>
    </div>

    <script>
       $(document).ready(function (){
           $('#login-btn').on('click',function(){
               debugger;
               let username=$("#username");
               let password=$("#password")
               debugger;
               if(username.val()===""){
                  ErrorToast("User Name Required");
               }else if(password.val()===""){
                   ErrorToast("Password Required");
               }else{
                   $('#login-btn').prop("disabled",true).html(`<div class="spinner-border spinner-border-sm text-light" role="status"><span></span></div>  Processing.. `);
                   debugger;
                   axios.post('/admin/CheckAdmin',{
                       username: username.val(),
                       password: password.val()
                   }).then(function (response){
                       debugger;
                       $('#login-btn').prop("disabled",false).html(`Login`);
                       if(response.status === 200){
                           SuccessToast('Login Successfully.');
                           debugger;
                           window.location.href = "/";
                       }else{
                           debugger;
                           ErrorToast("Username or password don\'t match.");
                       }
                   }).catch(function(err){
                       debugger;
                       $('#login-btn').prop("disabled",false).html(`Login`);
                       ErrorToast("Username or password don\'t match.");
                   })
               }
           })
       })
    </script>
@endsection
