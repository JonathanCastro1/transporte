
  $(document).ready(function() {

// Buena forma si no tuviera ya mi base_url configurada
 // var base_url = <?php echo base_url();?> 
 

// Ya tengo la base url en config, osea htpp:localhost/sistema_escuela

// Nota estar pendiente al obtener la url escribirla bien,
// chequear por consola al obtener GET

// cargo las sessiones
// $.ajax({
//   url: "cargar_controller/cargarsessiones", 
  
// })
// .done(function(resp) {

//   // console.log(resp);
//    $('#session').html(resp);  
// })
// .fail(function() {
//   console.log("error");
// });

// // cargo los turnos
// $.ajax({
//  url: "cargar_controller/cargarturnos", 
  
// })
// .done(function(resp) {
  
//   $('#turno').html(resp);  
// })
// .fail(function() {
//  console.log("error");
// });

// // cargo los turnos
// $.ajax({
//  url: "cargar_controller/cargarsedes", 
  
// })
// .done(function(resp) {
  
//   $('#sede').html(resp);  
// })
// .fail(function() {
//  console.log("error");
// });




// cargando select con getjson, cargo las sessiones
// session es parametro y "session" el valor   session:"session"

$.getJSON('cargar_controller/cargarsessiones',{session:"session"}, function(resp) {

	 // $('#prueba').html(resp); 
	 $.each(resp, function(index, val) {
	 	 $('#session').append('<option value="'+val.session+'">'+val.session+'</option>')
	 });
})


// cargando select con getjson, cargo los turnos
$.getJSON('cargar_controller/cargarturnos',{turno:"turno"}, function(resp) {

	 // $('#prueba').html(resp); 
	 $.each(resp, function(index, val) {
	 	 $('#turno').append('<option value="'+val.turno+'">'+val.turno+'</option>')
	 });
})


// cargando select con getjson, cargo las sedes
$.getJSON('cargar_controller/cargarsedes',{sede:"sede"}, function(resp) {

	 // $('#prueba').html(resp); 
	 $.each(resp, function(index, val) {
	 	 $('#sede').append('<option value="'+val.sede+'">'+val.sede+'</option>')
	 });
})


// ejemplo con index y valor

// $.getJSON('cargar_controller/cargarsedes',{sede:"sede"}, function(resp) {

// 	 // $('#prueba').html(resp); 
// 	 $.each(resp, function(index, val) {
// 	 	 $('#sede').append('<option value="'+index+'">'+val.sede+'</option>')
// 	 });
// })



// cargando select con getjson, cargo las sessiones
// $.getJSON('cargar_controller/cargarsessiones',{session:"session"}, function(resp) {

// 	 // $('#prueba').html(resp); 
// 	 $.each(resp, function(index, val) {
// 	 	 $('#sessiono').append('<option value="'+val.session+'">'+val.session+'</option>')
// 	 });
// })






});



