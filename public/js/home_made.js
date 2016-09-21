



$(document).ready(function() {

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