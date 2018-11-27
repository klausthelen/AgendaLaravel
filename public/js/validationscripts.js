function comprobardatosUsuario(argument) {
	clave1 = document.getElementById("password").value;
    clave2 = document.getElementById("password-confirm").value;
    
    if (clave1 == clave2) {
        if (clave1.length<6) {
            alert("Contraseña demasido corta");
        }
        else{
            document.createuser.submit();
        }
        
    }
        
    else {
        alert("Las dos claves son distintas...");
    }
}

function comprobardatosContacto(argument) {
    numerotel = document.getElementById("c_cont_number").value;
    valor = parseInt(numerotel);
    if (isNaN(valor)) { 
        alert("El numero de contacto DEBEN SER SOLO NUMEROS");
    }

    else{
        document.createcontact.submit();
    }
    
}