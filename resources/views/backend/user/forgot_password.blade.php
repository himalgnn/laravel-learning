@extends('backend.layout.auth_master')

@section('title', 'Forgot Password Page')

@section('main-content')
<div class="card-body login-card-body">
          <p class="login-box-msg">Forgot Password</p>
          <form action="../index3.html" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" />
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            
            <!--begin::Row-->
            <div class="row">
             
             
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Forgot Password</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
         
        </div>
@endsection