$(document).ready(
    function(){
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();   
    });

    $(function(){
        $('#agregarEspecialidadForm').on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("agregarEspecialidadForm"));
            var validated =0;
            if($('#nomesp').val().length == 0 ){
                $("#nomesp").css('background-color', '#fbc7c7');
                validated = validated +1;
            }
            if($('#carrera').val().length == 0 ){
                $("#carrera").css('background-color', '#fbc7c7');
                validated = validated +2;
            }
            if(validated>=1){
                switch(validated){
                    case 1: alert("Favor de ingresar un nombre valido"); break;
                    default: ;break;
                } 
                return false;
            } else {
                
            $.ajax({
                url: "agregarEspecialidad.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    if(data.status == 'success'){
                        alert("Profesor agregado correctamente");
                        document.getElementById("agregarEspecialidadForm").reset();
                    }else if(data.status == 'error'){
                        alert("Error al agregar especialidad");
                    }           
                }
                });
                //return true;
            }
        });
        
        $('#eliminarEspecialidadForm').on("submit", function(e){
            e.preventDefault();
            var formData = new FormData(document.getElementById("eliminarEspecialidadForm"));
            if(jQuery('#eliminarp').val() == "x" ){
                alert("Favor de elegir un profesor para eliminar");
                return false;
            }
            else{
                $.ajax({
                    url: "eliminarEspecialidad.php", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(data)   // A function to be called if request succeeds
                    {
                        if(data.status == 'success'){
                            alert("Especialidad eliminada correctamente");
                        }else if(data.status == 'error'){
                            alert("Error al eliminar la especialidad, vuelva a interntarlo");
                        }
                    }
                    });
                //return true;
            }
        });

        
    })