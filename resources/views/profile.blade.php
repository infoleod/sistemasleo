@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="panel panel-default" id="panels">
                  <div class="panel-heading">Mi cuenta</div>
                  <div class="panel-body">

                    @php
                      $imagePath = App\Image::where('id', Auth::user()->image_id)->first();
                      $imagePath = $imagePath->source;
                    @endphp
                    @if (Session::has('status'))
                    <hr />
                    <div class='text-success'>
                        {{Session::get('status')}}
                    </div>
                    <hr />
                    @endif
                    <div class="col-xxs-12 col-xs-3 col-md-3 col-md-offset-1">
                      <img id="imgView" src="{{$imagePath}}" class="img-thumbnail">
                    </div>

                    <div class="col-xxs-12 col-xs-9 col-md-8">
                      {{-- Nombre --}}
                      <div class="col-xxs-12 col-xs-3 col-md-4 col-md-offset-1 well-sm">
                        Nombre:
                      </div>
                      <div class="col-xxs-12 col-xs-9 col-md-7 well-sm">
                        {{ Auth::user()->name }}
                      </div>

                      {{-- Apellido --}}
                      <div class="col-xxs-12 col-xs-3 col-md-4 col-md-offset-1 well-sm">
                        Apellido:
                      </div>
                      <div class="col-xxs-12 col-xs-9 col-md-7 well-sm">
                        {{ Auth::user()->surname }}
                      </div>

                      {{-- email --}}
                      <div class="col-xxs-12 col-xs-3 col-md-4 col-md-offset-1 well-sm">
                        E-Mail:
                      </div>
                      <div class="col-xxs-12 col-xs-9 col-md-7 well-sm">
                        {{ Auth::user()->email }}
                      </div>

                      {{-- Telefono --}}
                      <div class="col-xxs-12 col-xs-3 col-md-4 col-md-offset-1 well-sm">
                        Telefono:
                      </div>
                      <div class="col-xxs-12 col-xs-9 col-md-7 well-sm">
                        {{ Auth::user()->phone }}
                      </div>
                    </div>
                  </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">Panel de Edición</div>
                <div style="padding: 15px 5px 5px 15px;">
                  <div class="row">
                    <a href="{{ route('profile-edit') }}" class="btn btn-warning" role="button">Editar Datos Personales</a>
                    <a href="{{ route('change-pass-show') }}" class="btn btn-primary" role="button">Cambiar Contraseña</a>
                    <a href="{{ url('product-list') }}" class="btn btn-success" role="button">Mis Productos</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

  <script>
    function deleteAlert(productId, idUser) {
        $.confirm({
            title: '¿Esta seguro que desea borrar el producto?',
            content: '',
            type: 'red',
            buttons: {
                accept: {
                    text: 'Si, quiero borrarlo!',
                    btnClass: 'btn-danger',
                    isHidden: false, // initially not hidden
                    isDisabled: false, // initially not disabled
                    action: function(){
                      window.location.href = 'product-destroy/' + productId + ',' + idUser ;
                    }
                },
                cancel: {
                    text: 'Cerrar',
                    btnClass: 'btn-default',
                    keys: ['enter'],
                    isHidden: false, // initially not hidden
                    isDisabled: false, // initially not disabled
                    action: function(){}
                }
            }
        });
    };

    function editAlert(productId) {
        $.confirm({
            title: '¿Esta seguro que desea editar el producto?',
            content: '',
            type: 'orange',
            buttons: {
                accept: {
                    text: 'Si, quiero editarlo',
                    btnClass: 'btn-warning',
                    isHidden: false, // initially not hidden
                    isDisabled: false, // initially not disabled
                    action: function(){
                      window.location.href = 'product-edit/' + productId;
                    }
                },
                cancel: {
                    text: 'Cerrar',
                    btnClass: 'btn-default',
                    keys: ['enter'],
                    isHidden: false, // initially not hidden
                    isDisabled: false, // initially not disabled
                    action: function(){}
                }
            }
        });
    };


    //Funcion Cambiar source imagen img
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e)
        {
          if (e.target.result) {
            $('#imgView').attr('src', e.target.result);
          }
        }
        reader.readAsDataURL(input.files[0]);
      } else {
        $('#imgView').attr('src', 'images/profile/default.jpg');
      }
    }
  </script>

@endsection
