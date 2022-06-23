
function comprobarClave(){
    clave1 = document.frm1.password_usuario.value
    clave2 = document.frm1.password_usuario2.value

    if (clave1 == clave2)
        validacion()
    else
       alert("Las contraseñas no coinciden...\n")
}

function validacion(){
    if(document.frm1.edad.value.length==0){
        document.getElementById("edad").focus();
        return false;
    }
    if(document.frm1.sexo.value.length==0){
        document.getElementById("sexo").focus();
        return false;
    }
    if(document.frm1.estudios.value.length==0){
        document.getElementById("estudios").focus();
        return false;
    }
    if(document.frm1.estado_civil.value.length==0){
        document.getElementById("estado_civil").focus();
        return false;
    }
    if(document.frm1.ocupacion.value.length==0){
        document.getElementById("ocupacion").focus();
        return false;
    }
    if(document.frm1.id_centro_de_salud.value.length==0){
        document.getElementById("id_centro_de_salud").focus();
        return false;
    }
    if(document.frm1.id_psicofarmaco.value.length==0){
        document.getElementById("id_psicofarmaco").focus();
        return false;
    }
    if(document.frm1.diagnostico.value.length==0){
        document.getElementById("diagnostico").focus();
        return false;
    }
    if(document.frm1.uso_psicofarmaco.value.length==0){
        document.getElementById("uso_psicofarmaco").focus();
        return false;
    }
    if(document.frm1.cantidad_psicofarmaco.value.length==0){
        document.getElementById("cantidad_psicofarmaco").focus();
        return false;
    }
    if(document.frm1.frecuencia_psicorfarmaco.value.length==0){
        document.getElementById("frecuencia_psicorfarmaco").focus();
        return false;
    }
    if(document.frm1.referido.value.length==0){
        document.getElementById("referido").focus();
        return false;
    }
    if(document.frm1.anio_consulta.value.length==0){
        document.getElementById("anio_consulta").focus();
        return false;
    }
    if(document.frm1.password_usuario.value.length==0){
        document.getElementById("password_usuario").focus();
        return false;
    }
    if(document.frm1.password_usuario2.value.length==0){
        document.getElementById("password_usuario2").focus();
        return false;
    }
    alert("Se ha realizado el registro");
    frm1.submit();
    
}