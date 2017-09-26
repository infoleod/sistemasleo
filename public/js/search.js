// window.onload = function() {

  var buscador = $("#table").DataTable();
  $("#input-search").keyup(function(){

    // console.log($("#input-search").val());

    buscador.search($(this).val()).draw();

    if ($("#input-search").val() == ""){
        $(".content-search").fadeOut(300);
    }else{
        $(".content-search").fadeIn(300);
    }
  })

  // $("#input-search").keydown(function(event){
  //
  //   if (event.key == 'Enter') {
  //     // console.log($("#input-search").val());
  //     var textSearch = $("#input-search").val();
  //
  //     var url = '{{ route("product-search", ":textSearchReplace") }}';
  //     url = url.replace(':textSearchReplace', textSearch);
  //
  //     document.location.href=url;
  //   }
  // })
// }
