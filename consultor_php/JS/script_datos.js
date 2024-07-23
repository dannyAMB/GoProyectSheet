 /*$(function() {
    setTimeout(function(){
      $('body').addClass('loaded');
    }, 1000);
});*/


let table = document.getElementById("text-dom")

const paramURL = window.location.search
console.log(paramURL);

//Creamos una instancia de URLSearchParams
const parametrosURL = new URLSearchParams(paramURL);
console.log(typeof(parametrosURL));

table.innerText = paramURL

/* Recorriendo todos los parametros de la URL */
for (let valoresURL of parametrosURL) {
  console.log(valoresURL);

  
}

  /*
    var dataString = 'id='+ id;
    url = "Delete.php";
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function(data)
            {
                $("#registro" + id).hide();
               // $("#registro" + id).remove();
                $('#resp').html(data);
            }
        }); 
        */