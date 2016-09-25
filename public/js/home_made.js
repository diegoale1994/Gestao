

$(document).ready(function() {

if ( $("#msg") ) {
   $("#msg").delay(2000).fadeOut("slow");
    
}


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