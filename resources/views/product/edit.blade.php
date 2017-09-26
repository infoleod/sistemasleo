@extends('layouts.app')

@section('content')
  <div class="container">
    {{-- <form class="form-horizontal" id="myForm" method="POST" action="{{ route('register') }}"> --}}
    <form method="POST" action="/product-update/{{$product->id}}" enctype="multipart/form-data">
      <div class="panel panel-default"  id="panels">
    {{-- <form method="POST" action="product-update/{{$product->id}}"> --}}
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-sm-3 item-photo" style="margin-left:1%">
          <div>
            <div id="changeImageDiv">
              <img id="imgView" style="max-width:100%;" src="{{ $product->image->source }}"/>
            </div>
            <div>
              <input id="imgInp" class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
      <div id="productDetail" class="col-xs-8" style="border:0px solid gray">
          {{-- Titulo --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Titulo:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-8">
              <input class="form-control" type="text" name="title" value="{{ $product->title }}">
            </div>
          </div>

          {{-- Cambiar Imagen --}}
          {{-- <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
            Imagen:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-6">
              <input id="image" class="form-control" type="file" name="image">
            </div>
          </div> --}}

          {{-- Precio --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Precio:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-2">
              <input class="form-control" type="text" name="price" value="{{ $product->price }}">
            </div>
          </div>

          {{-- Cantidad--}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Cantidad:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-6">
              <div class="section">
                <div>
                  <div class="btn-minus" onclick="minus()"><span class="glyphicon glyphicon-minus"></span></div>
                  <input value="{{ $product->quant_sold }}" name="quant_sold"/>
                  <div class="btn-plus" onclick="plus()"><span class="glyphicon glyphicon-plus"></span></div>
                </div>
              </div>
            </div>
          </div>

          {{-- Categoria --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Categoria:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-4">
              <select class="form-control" name="category_id">
                @php
                  $categoryList = App\Category::orderBy('name', 'ASC')->pluck('name','id');
                  foreach ($categoryList as $id => $categoryName) {
                    @endphp
                        <option value="{{$id}}" name="">{{$categoryName}}</option>
                    @php
                  }
                @endphp
              </select>
            </div>
          </div>

          {{-- Descripcion --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Descripción:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-8">
              <textarea class="form-control" name="description" rows="9">{{ $product->description }}</textarea>
            </div>
          </div>

          {{-- Boton guardar --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-8" style="text-align: left; margin-top:1.5%; margin-bottom:1.5%">
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Guardar cambios</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  //Funcion MAS
  function plus() {
    var now = $(".section > div > input").val();
    if ($.isNumeric(now)){
        $(".section > div > input").val(parseInt(now)+1);
    }else{
        $(".section > div > input").val("1");
    }
  };
  //Funcion Menos
  function minus() {
    var now = $(".section > div > input").val();
    if ($.isNumeric(now)){
        if (parseInt(now) -1 > 0){ now--;}
        $(".section > div > input").val(now);
    }else{
        $(".section > div > input").val("1");
    }
  }

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
    }
  }

</script>

@endsection
