//obtenemos los elementos de los cuadros de texto
var res_mGruesa = document.getElementById("res_mGruesa");
var res_mFina = document.getElementById("res_mFina");
var res_AudyLeng = document.getElementById("res_AudyLeng");
var res_PerySocial = document.getElementById("res_PerySocial");
var res_Total = document.getElementById("res_Total");

//agregamos un evento keyup a los cuadros de texto res_mGruesa y res_mFina
res_mGruesa.addEventListener("keyup", sumar);
res_mFina.addEventListener("keyup", sumar);
res_AudyLeng.addEventListener("keyup", sumar);
res_PerySocial.addEventListener("keyup", sumar);

//funcion para sumar los valores de los cuadros de texto
function sumar() {
  res_Total.value = parseFloat(res_mGruesa.value) + parseFloat(res_mFina.value)+parseFloat(res_AudyLeng.value) + parseFloat(res_PerySocial.value);
}

