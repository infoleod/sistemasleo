@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-xs-12">

              {{-- Cargamos la lista con los productos de ese usuario --}}
              @php
                $productUser = App\Product::where('user_id', Auth::user()->id)->paginate(15);
              @endphp

              @if ($productUser)
                <div class="panel panel-default"  id="panels">
                  <div class="panel-heading">Crear nuevo producto</div>
                  <div style="padding: 15px 5px 5px 15px;">
                    <a href="product-create/"><button class="btn btn-md btn-primary">Nuevo producto</button></a>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">Mis Productos</div>
                  <div class="panel-body">
                    <div class="responsive-table">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th></th>
                          </tr>
                        </thead>


                          <tbody>
                            @foreach ($productUser as $product)
                              <tr>
                                <td><img class="img-responsive" width="30px" height="30px"src="{{ $product->image->source }}"></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->priceText() }}</td>
                                <td>{{ $product->quant_sold }}</td>
                                <td>
                                  <a ><button onclick="editAlert({{$product->id}})" class="btn btn-sm btn-warning">Editar</button></a>
                                  <a ><button onclick="deleteAlert({{$product->id}} , {{Auth::user()->id}})" class="btn btn-sm btn-danger">Borrar</button></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>

                      </table>

                      {{-- Mostramos los enlaces --}}
                      {{ $productUser->links() }}
                    </div>
                  </div>

                </div>
              @endif
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

  </script>

@endsection
