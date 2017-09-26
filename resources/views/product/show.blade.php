@extends('layouts.app')

@section('content')
{{-- Variable con el producto --}}
  {{-- $product --}}
{{-- Variable con el tipo de operacion, show, edit o delete --}}
  {{-- $typeOfOperation --}}
<div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-4 item-photo">
      <img id="jsZoom" style="max-width:100%;"
        src="{{ $product->image->source }}"
        data-zoom-image="{{ $product->image->source }}"
      />
    </div>
      <div id="productDetail" class="col-xs-8" style="border:0px solid gray">
      <!-- Datos del vendedor y titulo del producto -->
      <h3>{{ $product->title }}</h3>






      <h5 style="color:#337ab7">vendido por <a href="#">{{ $userName }}</a> · <small style="color:#337ab7">({{$product->quant_sold}} ventas)</small></h5>

      <!-- Precios -->
      <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
      <h3 style="margin-top:0px;"> {{ $product->priceText() }}</h3>

      <div class="section" style="padding-bottom:20px;">
        <h6 class="title-attr"><small>CANTIDAD</small></h6>
        <div>
          <div class="btn-minus" onclick="minus()"><span class="glyphicon glyphicon-minus"></span></div>
          <input value="1" />
          <div class="btn-plus" onclick="plus()"><span class="glyphicon glyphicon-plus"></span></div>
        </div>
      </div>

      <!-- Botones de compra -->
      <div class="section" style="padding-bottom:20px;">
        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Agregar al carrito</button>
      </div>
    </div>
      <div class="col-xs-12">
        <div style="width:100%;border-top:1px solid silver">
          <p style="padding:15px;">
            <small>
              {{ $product->description }}
            </small>
          </p>
        </div>
      </div>
    </div>
</div>

<script>
  function plus() {
    var now = $(".section > div > input").val();
    if ($.isNumeric(now)){
        $(".section > div > input").val(parseInt(now)+1);
    }else{
        $(".section > div > input").val("1");
    }
  };


  function minus() {
    var now = $(".section > div > input").val();
    if ($.isNumeric(now)){
        if (parseInt(now) -1 > 0){ now--;}
        $(".section > div > input").val(now);
    }else{
        $(".section > div > input").val("1");
    }
  }
</script>
@endsection
