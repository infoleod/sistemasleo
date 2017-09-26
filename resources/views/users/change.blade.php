@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 registerForm">
            <div class="panel panel-default" id="panels">
                    <div class="panel-heading"><strong>{{ Auth::user()->name }}</strong> cambia tu Password</div>
                <div class="panel-body">
                          @if (Session::has('message'))
                           <div class="text-danger">
                           {{Session::get('message')}}
                           </div>
                          @endif
                          <hr />
                          <form method="post" class="form-horizontal" id="myForm"  action="/change-pass-change">
                                 {{csrf_field()}}

                                    <div class="form-group">
                                          <label for="mypassword" class="col-md-4 control-label" >Introduce tu actual password:</label>
                                              <div class="col-md-6">
                                                <input type="password" name="mypassword" class="form-control">
                                                <span class="help-block"><strong>{{$errors->first('mypassword')}}</strong></span>
                                              </div>

                                    </div>
                                    <div class="form-group">
                                          <label for="password" class="col-md-4 control-label">Introduce tu nuevo password:</label>
                                          <div class="col-md-6">
                                                <input type="password" name="npassword" class="form-control">
                                                <span class="help-block"><strong>{{$errors->first('npassword')}}</strong></span>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label class="col-md-4 control-label" for="mypassword">Confirma tu nuevo password:</label>
                                          <div class="col-md-6">
                                                <input type="password" name="npassword_confirmation" class="form-control">
                                          </div>
                                    </div>
                                   <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Cambiar mi password</button>
                                            </div>
                                  </div>
                        </form>
                                        <div class="col-md-12">
                                              <a href="{{ route('profile') }}"><button type="submit" class="btn btn-danger">Volver al Perfil</button></a>
                                        </div>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
