function checkRut(rut) {
  rut = String(rut);
  var valor = rut.replace(".", "").replace(".", "");
  valor = valor.replace("-", "");
  cuerpo = valor.slice(0, -1);
  dv = valor.slice(-1).toUpperCase();
  rut = cuerpo + "-" + dv;
  
  if (cuerpo.length < 7) {
    return false;
  }
  
  suma = 0;
  multiplo = 2;
  for (i = 1; i <= cuerpo.length; i++) {
    index = multiplo * valor.charAt(cuerpo.length - i);
    suma = suma + index;
    if (multiplo < 7) {
      multiplo = multiplo + 1;
    } else {
      multiplo = 2;
    }
  }
  
  dvEsperado = 11 - suma % 11;
  dv = dv == "K" ? 10 : dv;
  dv = dv == 0 ? 11 : dv;
  
  if (dvEsperado != dv) {
    return false;
  }
  return true;
}

$.validator.addMethod("validRut", function(value, element) {
      return checkRut(value);
    }, "Debes ingresar un rut válido");

$('#data-form').validate({
  rules: {
    rut: {
      required: true,
      validRut: true
    }
  }
});