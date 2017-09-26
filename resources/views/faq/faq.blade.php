@extends('layouts.app')

@section('content')

<div class="container">
  <h2 id="faqPrinc">Preguntas frecuentes</h2>
  <p id="faqPrinc">Aqui podrá encontrar las inquietudes mas comunes de nuestros usuarios.</p>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">¿Tiene algún cargo registrarme?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">No, registrarse es totalmente GRATIS!! Para más información, hacé click <a href="{{url('/login')}}">AQUI</a></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">¿Qué hago si me olvidé mi usuario o mi clave?</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Si no recordás tu clave debés ingresar a Registrarse y luego a Recuperar Usuario y Clave y escribiendo la dirección del mail que pusiste en el momento de la inscripción se te enviará a ese mail tu usuario y clave.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">¿Cuánto me cobran por vender un producto? </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Estos son los cargos que se te generan en tu Estado de Cuenta en el caso que tu producto haya recibido ofertas.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">¿Cómo cargo una foto? </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">  Colocá una foto a tu artículo e incrementá la cantidad de ofertas sobre tu producto!!!. La misma tendrá que ser menor a 50Kb y deberá estar en formato *.JPG Cuando ingresás los datos del producto que vas a publicar, seleccioná la opción de insertar foto haciendo click en el recuadro. Carga de Imagen Si el producto va a incluir imagen, hace click acá. Un vez que completás todos estos datos ponés Grabar y pasás a una pantalla en donde tenés que hacer click en BROWSE, luego elegís el archivo de la foto y clickeás en MODIFICAR. Pasás a una pantalla que te confirmará que tu producto ya tiene foto. Otra forma de ingresar una foto es enviar el archivo con el código del producto a info@mercadolibre.com y allí ingresaremos la imagen.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">¿Cómo encuentro el producto que busco? </a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">  ZooMarket te propone diferentes maneras de buscar un producto. Para conocerlas, hacé click <a href="{{ url('/products')}}">AQUI</a>.</div>
      </div>
    </div>
  </div>
</div>

@endsection
