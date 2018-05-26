$(function(){
    $('#logInForm').submit(function() {
        var validated =0;
        if($('#password').val().length == 0 || $('#usuarioLogIn').val().length == 0 ){
            alert("Favor de llenar todos los campos");
            return false;
        }
        else{
            return true;
        }
    });
});
