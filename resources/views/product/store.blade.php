@extends('layouts.app')

@section('content')
  <div class="container">
    <form method="POST" action="/product-store" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-sm-4 item-photo">
          <div class="">
            <img id="imgView" style="max-width:100%;" src="/images/logos/no_image.png"/>
            <input id="imgInp" class="form-control" type="file" name="image" >
          </div>
        </div>

        <div id="productDetail" class="col-xs-8" style="border:0px solid gray">

          {{-- Titulo --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Titulo:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-8">
              <input class="form-control" type="text" name="title" value="">
            </div>
          </div>

          {{-- Precio --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Precio:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-2">
              <input class="form-control" type="text" name="price" value="">
            </div>
          </div>

          {{-- Cantidad a vender --}}
          <div class="row">
            <div class="col-xxs-12 col-xs-3 col-md-2">
              Cantidad:
            </div>
            <div class="col-xxs-12 col-xs-9 col-md-6">
              <div class="section">
                <div>
                  <div class="btn-minus" onclick="minus()"><span class="glyphicon glyphicon-minus"></span></div>
                  <input value="1" name="quant_sold"/>
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
                        <option value="{{$id}}" name="">{{ $categoryName }}</option>
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
              <textarea class="form-control" name="description" rows="9"></textarea>
            </div>
          </div>
        </div>

          {{-- Boton guardar --}}
          <div class="panel panel-default">
            <div style="padding: 15px 5px 5px 15px;">
              <div class="row">

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Guardar cambios</button>
                <a href="{{ url('product-list') }}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cancelar</button></a>
              </div>
            </div>
          </div>
      

      </div>
    </form>
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
    console.log(input.files);
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e)
      {
        $('#imgView').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      $('#imgView').attr('src', '/images/logos/no_image.png');
    }
  }


</script>
@endsection
