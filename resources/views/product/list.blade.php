@extends('layouts.app')

@section('content')

  {{-- Creamos la vista de los productos --}}
  <div class="container">
    <div class="responsive-table">
      <table class="table table-hover">
          {{-- Si la ruta trae una categoria, mostramos la ruta para que pueda navegar y volver a las catagorias --}}
          @if(isset($category_slug))
            <ul class="nav nav-tabs">
              <li><a href="{{ url('/') }}">ZooMarket</a></li>
              <li><a href="{{ url('/products') }}">Productos</a></li>
              <li><a href="{{ route('category-product', [$category_slug]) }}">{{ $category_slug }}</a></li>
            </ul>
          @endif

        <thead>
          <tr>
            <th>Imagen</th>
            <th>Título</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($products as $product)
            <tr>
              <td><img class="img-responsive" width="60px" height="60px"src="{{ $product->image->source }}"></td>
              <td>{{ $product->title }}</td>
              <td><a href="{{ route('category-product', [$product->category->slug]) }}">{{ $product->category->name }}</a></td>
              <td>{{ $product->priceText() }}</td>
              <td>
                <a href="{{ route('show-product', [$product->id]) }}"><button class="btn btn-md btn-success">Ver</button></a>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>

      {{-- Mostramos los enlaces --}}
      {{ $products->links() }}
    </div>
  </div>
@endsection
