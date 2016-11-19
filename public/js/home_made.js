var personas1;
var equipos1;
var estudiantes1;

var piso;

$(".form-control.jestudiantes").on('keydown keyup', function(e){

    if ($(this).val() > 45 || $(this).val() <= 0
        
       ) {
       e.preventDefault();
       $(this).val(estudiantes1);

    }
});
$(".form-control.clase_hora_final1").change(function() {

  var hora_inicio = Number($(".form-control.clase_hora_inicio1").val());
var hora_final = Number($(".form-control.clase_hora_final1").val());
  if (hora_final>hora_inicio) {
  $(".btn.btn-success.btnocu").prop('disabled', false);
   if ((hora_final-hora_inicio) >=5) {
$("label[for='errors_ocu']").html("No puede haber clases de mas de 5 horas!");
  $("#ocu_error_div").show(2000);
   $('#ocu_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btnocu").prop('disabled', true);
   }}else if (hora_final<hora_inicio){
$("label[for='errors_clase']").html("La hora final debe ser mayor a la inicial !");
 $("#clase_error_div").show(2000);
  $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btnocu").prop('disabled', true);
   }
});

$(".form-control.clase_hora_final").change(function() {

  var hora_inicio = Number($(".form-control.clase_hora_inicio").val());
var hora_final = Number($(".form-control.clase_hora_final").val());
  if (hora_final>hora_inicio) {
  $(".btn.btn-success.btn_create_class").prop('disabled', false);
   if ((hora_final-hora_inicio) >=5) {
$("label[for='errors_clase']").html("No puede haber clases de mas de 5 horas!");
  $("#clase_error_div").show(2000);
   $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btn_create_class").prop('disabled', true);
   }}else if (hora_final<hora_inicio){
$("label[for='errors_clase']").html("La hora final debe ser mayor a la inicial !");
 $("#clase_error_div").show(2000);
  $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btn_create_class").prop('disabled', true);
   }
});
$(".form-control.rese_hora_final").change(function() {

  var hora_inicio = Number($(".form-control.rese_hora_inicio").val());
var hora_final = Number($(".form-control.rese_hora_final").val());
  if (hora_final>hora_inicio) {
  $(".btn.btn-primary.btn_rese").prop('disabled', false);
   if ((hora_final-hora_inicio) >=5) {
$("label[for='errors_clase']").html("No puede haber clases de mas de 5 horas!");
  $("#clase_error_div").show(2000);
   $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-primary.btn_rese").prop('disabled', true);
   }}else if (hora_final<hora_inicio){
$("label[for='errors_clase']").html("La hora final debe ser mayor a la inicial !");
 $("#clase_error_div").show(2000);
  $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-primary.btn_rese").prop('disabled', true);
   }
});
$(".form-control.clase_hora_inicio1").change(function() {
  
  var hora_inicio = Number($(".form-control.clase_hora_inicio1").val());
var hora_final = Number($(".form-control.clase_hora_final1").val());
if (hora_final>hora_inicio) {
  $(".btn.btn-success.btnocu").prop('disabled', false);
   if ((hora_final-hora_inicio) >=5) {
$("label[for='errors_ocu']").html("No puede haber clases de mas de 5 horas!");
  $("#ocu_error_div").show(2000);
   $('#ocu_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btnocu").prop('disabled', true);
   }}else if (hora_final<hora_inicio){
$("label[for='errors_ocu']").html("La hora final debe ser mayor a la inicial !");
 $("#ocu_error_div").show(2000);
  $('#ocu_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btnocu").prop('disabled', true);
   }
});

$(".form-control.clase_hora_inicio").change(function() {
  
  var hora_inicio = Number($(".form-control.clase_hora_inicio").val());
var hora_final = Number($(".form-control.clase_hora_final").val());
if (hora_final>hora_inicio) {
  $(".btn.btn-success.btn_create_class").prop('disabled', false);
   if ((hora_final-hora_inicio) >=5) {
$("label[for='errors_clase']").html("No puede haber clases de mas de 5 horas!");
  $("#clase_error_div").show(2000);
   $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btn_create_class").prop('disabled', true);
   }}else if (hora_final<hora_inicio){
$("label[for='errors_clase']").html("La hora final debe ser mayor a la inicial !");
 $("#clase_error_div").show(2000);
  $('#clase_error_div').delay(1000).hide(2000);
$(".btn.btn-success.btn_create_class").prop('disabled', true);
   }
});
$(".form-control.aula_piso").on('keydown keyup', function(e){

    if ($(this).val() > 2 || $(this).val() <= 0
        
       ) {
       e.preventDefault();
       $(this).val(piso);
 $("label[for='errors_aula']").html("No puedes ingresar mas de 2 pisos !");
  $("#aula_error_div").show(2000);
   $('#aula_error_div').delay(1000).hide(2000);
    }
});
$('#cant_personas').on('keydown keyup', function(e){

    if ($(this).val() > 50 || $(this).val() <= 0
        
       ) {
       e.preventDefault();
       $(this).val(personas1);
       $("label[for='errors_aula']").html("No puedes ingresar mas de 45 personas !");
  $("#aula_error_div").show(2000);
   $('#aula_error_div').delay(1000).hide(2000);
    }
});
$('#cant_equipos').on('keydown keyup', function(e){

    if ($(this).val() > 40 || $(this).val() <= 0
        
       ) {
       e.preventDefault();
       $(this).val(equipos1);
        $("label[for='errors_aula']").html("No puedes ingresar mas de 40 equipos !");
  $("#aula_error_div").show(2000);
   $('#aula_error_div').delay(1000).hide(2000);

    }
});
$( "#cant_personas" ).change(function() {
var equipos = Number($("#cant_equipos").val());
var personas = Number($("#cant_personas").val());

if (equipos>personas){ 
$(".btn.btn-warning.btn_actu").prop('disabled', true);
$("label[for='errors_aula']").html("La cantidad de equipos no puede ser mayor a la cantidad de personas !");
  $("#aula_error_div").show(2000);
   $('#aula_error_div').delay(1000).hide(2000);
    
}else{
  

$(".btn.btn-warning.btn_actu").prop('disabled', false);
}

});
$( "#cant_equipos" ).change(function() {
var equipos = Number($("#cant_equipos").val());
var personas = Number($("#cant_personas").val());

if (equipos>personas){ 
$(".btn.btn-warning.btn_actu").prop('disabled', true);
$("label[for='errors_aula']").html("La cantidad de equipos no puede ser mayor a la cantidad de personas !");
  $("#aula_error_div").show(2000);
   $('#aula_error_div').delay(1000).hide(2000);
}else{
$(".btn.btn-warning.btn_actu").prop('disabled', false);
}

});

$(document).ready(function() {
personas1 = Number($("#cant_personas").val());
equipos1 = Number($("#cant_equipos").val());
estudiantes1 = Number($(".form-control.jestudiantes").val());

piso = Number($(".form-control.aula_piso").val());
if ( $("#msg") ) {
   $("#msg").delay(2000).fadeOut("slow");
    
}
$("#aula_error_div").hide();
$("#clase_error_div").hide();
$("#ocu_error_div").hide();
$("#form_2").submit(function() {
   
var duracion = $('input[name=horaFinal]').val() - $('input[name=horaInicio]').val();
var answer = confirm("Esta Seguro que desea registrar la siguiente informacion ? Fecha: "+$('input:hidden[name=fecha]').val() + " Codigo Asignatura: " + $('input:text[name=id]').val()+ " Nombre: " + $('input:text[name=nombre]').val()+ " aula: " + $('input:hidden[name=aula]').val()+ " Hora inicio: " + $('input[name=horaInicio]').val()+ " Hora final: " + $('input[name=horaFinal]').val()+ " Duracion : " + duracion + "Hras")
  if (answer){
    alert("Saliendo")
    $('input[name=horaInicio]').attr('disable',true);

   return true;
  }
  else{
    alert("Cancelado!")
     return false;
  }
    });


if ($('select[name=tipo_mostrar]').val()=="0") {
  $('#opcionsemana').hide(500);
  $('#opciondia').show(500);
  }
   if ($('select[name=tipo_mostrar]').val()=="1") {
  $('#opciondia').hide(500);  
  $('#opcionsemana').show(500);
  }

$('select[name=tipo_mostrar]').click(function() {
  if ($('select[name=tipo_mostrar]').val()=="0") {
  $('#opcionsemana').hide(500);
  $('#opciondia').show(500);
  }
   if ($('select[name=tipo_mostrar]').val()=="1") {
  $('#opciondia').hide(500);  
  $('#opcionsemana').show(500);
  }

});
});