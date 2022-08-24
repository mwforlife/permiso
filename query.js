var Fn = { //-------------
    // Valida el rut con su cadena completa "XXXXXXXX-X"---------------------------
    validaRut: function(rutCompleto) { //-------------
        rutCompleto = rutCompleto.replace(".", ""); //-------------
        rutCompleto = rutCompleto.replace(".", ""); //-------------
        rutCompleto = rutCompleto.replace("‐", "-"); //-------------
        //-------------
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto)) //-------------
            return false; //-------------
        var tmp = rutCompleto.split('-'); //-------------
        var digv = tmp[1]; //-------------
        var rut = tmp[0]; //-------------
        if (digv == 'K') digv = 'k'; //-------------
        //-------------
        return (Fn.dv(rut) == digv); //-------------
    }, //-------------
    dv: function(T) { //-------------
            var M = 0,
                S = 1; //-------------
            for (; T; T = Math.floor(T / 10)) //-------------
                S = (S + T % 10 * (9 - M++ % 6)) % 11; //-------------
            return S ? S - 1 : 'k'; //-------------
        } //-------------
}; //-------------
//---------------------------------------------------------------------------------

function validaRut(rut){
    if (Fn.validaRut(rut)) {
        return true;      
    } else {
        return false;
    }
}

$(document).ready(function() {
    $("#FormLog").on("submit", function(e) { 
    e.preventDefault();
    var rut = $("#rut").val();
    if (validaRut(rut)) {
        var formData = new FormData($("#FormLog")[0]);
        $.ajax({
            url: "validate.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data=="1" || data==1) {
                    window.location.href = "perfil.php";
                }else if (data==0 || data=="0") {
                    swal.fire({
                        title: "Error",
                        text: "No se encontró ningún estudiante, Compruébe los datos e intente nuevamente",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    });
                    $("#rut").val("");
                    $("#date").val("");
                    $("#rut").focus();
                }else{
                    swal.fire({
                        title: "¡Error!",
                        text: data,
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    });
                    $("#rut").val("");
                    $("#date").val("");
                    $("#rut").focus();
                }
            }
        });    
    } else {
        swal.fire({
            title: "Error",
            text: "Rut Invalido",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    }
    
    }
    );
}
);

$(document).ready(function() {
    $("#Form_Perimport").on("submit", function(e) { 
        e.preventDefault();
        var formData = new FormData($("#Form_Perimport")[0]);
        $.ajax({
            url: "importar.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data=="0"){
                    swal.fire({
                        title: "Error",
                        text: "Error al importar",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                        });
                    $(".preloader").hide();
                }else if(data=="2"){
                    swal.fire({
                        title: "Error",
                        text: "El archivo no es un archivo CSV",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                        });
                    $(".preloader").hide();
                }else{
                    swal.fire({
                        title: "Exito",
                        text: "Importación exitosa",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                    });
                    $(".preloader").hide();
                }
            }
            
        });
    }
    );
}
);