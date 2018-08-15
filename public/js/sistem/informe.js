function sumar()
{
    var kmpartida=verificar("kmpartida");
    var kmllegada=verificar("kmllegada");
    document.getElementById("kmtotal").value=(parseFloat(kmllegada)-parseFloat(kmpartida));


    var litro1=verificar("litro1");
    var litro2=verificar("litro2");
    var litro3=verificar("litro3");
    var compra1=verificar("compra1");
    var compra2=verificar("compra2");
    var compra3=verificar("compra3");
    document.getElementById("totallitro").value=(parseFloat(litro1)+parseFloat(litro2)+parseFloat(litro3)).toFixed(2);
    document.getElementById("totalbs").value=(parseFloat(compra1)+parseFloat(compra2)+parseFloat(compra3)).toFixed(2);


    var debocombu=verificar("debocombu");
    var debopeaje=verificar("debopeaje");
    var deboimprevi=verificar("deboimprevi");
    document.getElementById("debototal").value=(parseFloat(debocombu)+parseFloat(debopeaje)+parseFloat(deboimprevi)).toFixed(2);


}
function verificar(id)
{
    var obj=document.getElementById(id);
    if(obj.value=="")
        value="0";
    else
        value=obj.value;
    if(validate_importe(value,1))
    {
        obj.style.borderColor="#808080";
        return value;
    }else{
        obj.style.borderColor="#f00";
        return 0;
    }
}
function validate_importe(value,decimal)
{
        if(decimal==undefined)
            decimal=0;
        if(decimal==1)
        {
           var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
        }else{
            var patron=new RegExp("^([0-9])*$")
        }
        if(value && value.search(patron)==0)
        {
            return true;
        }
        return false;
}
 
/**
 * Funcion para validar el importe
 * Tiene que recibir:
 *  El valor del importe (Ej. document.formName.operator)
 *  Determina si permite o no decimales [1-si|0-no]
 * Devuelve:
 *  true-Todo correcto
 *  false-Incorrecto
 */
function validate_importe(value,decimal)
{
    if(decimal==undefined)
        decimal=0;

    if(decimal==1)
    {
        // Permite decimales tanto por . como por ,
        var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
    }else{
        // Numero entero normal
        var patron=new RegExp("^([0-9])*$")
    }

    if(value && value.search(patron)==0)
    {
        return true;
    }
    return false;
}