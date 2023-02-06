
function calculateMonths() {
    var birthDate = new Date(document.getElementById("reg_FechaNac").value);
    var endDate = new Date(document.getElementById("res_FechaCon").value);
    var diff = Math.abs(endDate.getTime() - birthDate.getTime());
    var months = Math.floor(diff / (1000 * 3600 * 24 * 30));
    document.getElementById("res_canMeses").value = months;
  }