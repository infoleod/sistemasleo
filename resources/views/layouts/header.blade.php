

  <div class="bs-example">
      <nav class="navbar navbar-default">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button id="headerMainMobileMenu" type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="{{ url('/') }}">
                <img id="headerMainLogo" src="/images/logos/logo-zoo.png">
              </a>
          </div>
          <!-- Collection of nav links, forms, and other content for toggling -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
              {{-- Menu principal --}}
              <ul id="headerMainMenu" class="nav navbar-nav">
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="barCatPrin">Menu <b class="caret"></b></a>
                      <ul class="dropdown-menu" id="barCat">

                        {{-- Llenamos el menu con la lista de las categorias --}}
                        @php
                          $categoryList = App\Category::orderBy('name', 'ASC')->pluck('name','slug');
                          foreach ($categoryList as $slug => $categoryName) {
                            @endphp
                              <li id="barCat"><a href="{{ route('category-product', [$slug]) }}">{{ $categoryName }}</a></li>
                            @php
                          }
                        @endphp
                      </ul>
                  </li>
              </ul>

              <form id="headerSearchBar" class="navbar-form navbar-left">
              	<div class="input-group">
                      {{-- Barra de busqueda --}}
                      <input id="input-search" type="search" autocomplete="off" class="form-control" placeholder="Buscar">
                      <div class="content-search">
                        <div id="content-table-header" class="content-table">
                          <table id="table">
                            <thead>
                              <tr>
                                <td></td>
                              </tr>
                            </thead>

                            <tbody id="tbody-Header">

                              {{-- Llenamos el buscador con los productos --}}
                              @php
                                $productList = App\Product::orderBy('title', 'ASC')->pluck('title','id');
                                foreach ($productList as $id => $productTitle) {
                                  @endphp
                                    <tr id="tr-Header"> <td><a href="{{ route('show-product', [$id]) }}">{{ $productTitle }}</a></td> </tr>
                                  @php
                                }
                              @endphp

                            </tbody>
                          </table>
                        </div>
                      </div>

                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                      </span>



                  </div>
              </form>

              <ul id="headerMainLogin" class="nav navbar-nav navbar-right">
                <div class="top-right links">
                  @if (Auth::guest())
                    @if (Auth::check())
                      <a href="{{ url('/profile') }}">Home</a>
                    @else
                      <a href="{{ url('/login') }}">Ingresa</a>
                      <a href="{{ url('/register') }}">Regístrate</a>
                    @endif
                  @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ url('profile') }}">
                            Mi Cuenta
                        </a>
                        <a href="{{ url('profile-edit') }}">
                            Editar Datos Personales
                        </a>
                        <a href="{{ url('product-list') }}">
                            Mis Productos
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                  @endif
                </div>
              </ul>

          </div>
      </nav>
  </div>

  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/search.js') }}"></script>

  <script>
    var buscador = $("#table").DataTable();
    $("#input-search").keyup(function(){
      buscador.search($(this).val()).draw();

      if ($("#input-search").val() == ""){
          $(".content-search").fadeOut(300);
      }else{
          $(".content-search").fadeIn(300);
      }
    })

    $("#input-search").keydown(function(event){

      if (event.key == 'Enter') {
        // console.log($("#input-search").val());
        var textSearch = $("#input-search").val();

        var url = '{{ route("product-search", ":textSearchReplace") }}';
        url = url.replace(':textSearchReplace', textSearch);

        document.location.href=url;
      }
    })
  </script>
