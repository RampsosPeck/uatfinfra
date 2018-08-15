$(document).ready(function()
{
        $('#destino1').on('change',function(e){
            var cant_id = e.target.value;
            //ajax
            $.get('/distancia?cant_id=' + cant_id, function (data)
            {
                $('#kilo1').empty();
                $.each(data,function(index, subcatObj){
                    $("#kilo1").val(subcatObj.kilometraje);
                });
            });
        });


        $('#destino2').on('change',function(e){
            var dest_id = e.target.value;
            //ajax
            $.get('/kilometraje?dest_id=' + dest_id, function (data){
                $('#kilo2').empty();
                $.each(data,function(index, desti){
                    $("#kilo2").val(desti.kilometraje);
                    //$('#k1').append('<option value="'+ desti.id+'">'+desti.kilometraje+'</option>');
                });
            });
        });
 

        $('#destino3').on('change',function(e){

            var dest_id = e.target.value;
            //alert(dest_id);
            //ajax
            $.get('/kilometraje?dest_id=' + dest_id, function (data){
                $('#kilo3').empty();
                $.each(data,function(index, desti){
                    $("#kilo3").val(desti.kilometraje);
                    //$('#k2').append('<option value="'+ desti.id+'">'+desti.kilometraje+'</option>');
                });
            });
        });

    
        $('#destino4').on('change',function(e){

            var dest_id = e.target.value;

            //ajax
            $.get('/kilometraje?dest_id=' + dest_id, function (data){
                $('#kilo4').empty();
                $.each(data,function(index, desti){
                    $("#kilo4").val(desti.kilometraje);
                    //$('#k3').append('<option value="'+ desti.id+'">'+desti.kilometraje+'</option>');
                });
            });
        });


        $('#destino5').on('change',function(e){

            var dest_id = e.target.value;

            //ajax
            $.get('/kilometraje?dest_id=' + dest_id, function (data){
                $('#kilo5').empty();
                $.each(data,function(index, desti){
                    $("#kilo5").val(desti.kilometraje);
                    //$('#k4').append('<option value="'+ desti.id+'">'+desti.kilometraje+'</option>');
                });
            });
        });

    
        $('#destino6').on('change',function(e){

            var dest_id = e.target.value;

            //ajax
            $.get('/kilometraje?dest_id=' + dest_id, function (data)
            {
                console.log(data);
                $('#kilo6').empty();
                $.each(data,function(index, desti){
                    $("#kilo6").val(desti.kilometraje);
                    //$('#k5').append('<input value="'+ desti.id+'">'+desti.kilometraje+'</option>');
                });
            });
        });

});
/**
     * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
     * Suma los valores de los cuadros de texto
     */
     function sumar()
    {
        var kilo1=verificar("kilo1");
        var kilo2=verificar("kilo2");
        var kilo3=verificar("kilo3");
        var kilo4=verificar("kilo4");
        var kilo5=verificar("kilo5");
        var kilo6=verificar("kilo6");
        var adicional=verificar("adicional");
        // realizamos la suma de los valores y los ponemos en la casilla del
        // formulario que contiene el total
        var totalkilometraje = (parseFloat(kilo1)+parseFloat(kilo2)+parseFloat(kilo3)+parseFloat(kilo4)+parseFloat(kilo5)+parseFloat(kilo6)+parseFloat(adicional)).toFixed(2);
        var combustible = verificar("combustible");
        var precio = verificar("precio");
        var totalcombu = (parseFloat(totalkilometraje)/parseFloat(combustible)).toFixed(2);

        document.getElementById("totalkm").value=(parseFloat(kilo1)+parseFloat(kilo2)+parseFloat(kilo3)+parseFloat(kilo4)+parseFloat(kilo5)+parseFloat(kilo6)+parseFloat(adicional)).toFixed(2);      
        document.getElementById("totalcombu").value=(parseFloat(totalkilometraje)/parseFloat(combustible)).toFixed(2);        
        document.getElementById("totalprecio").value=(parseFloat(totalcombu)*parseFloat(precio)).toFixed(2);

        //Esto es de los gastos 
        var canpeaje = verificar("canpeaje");
        var prepeaje = verificar("prepeaje");
        document.getElementById("totpeaje").value=(parseFloat(canpeaje)*parseFloat(prepeaje)).toFixed(2);

        var cangaraje = verificar("cangaraje");
        var pregaraje = verificar("pregaraje");
        document.getElementById("totgaraje").value=(parseFloat(cangaraje)*parseFloat(pregaraje)).toFixed(2);

        var canmante = verificar("canmante");
        var premante = verificar("premante");
        document.getElementById("totmante").value=(parseFloat(canmante)*parseFloat(premante)).toFixed(2);

        var canviaciu = verificar("canviaciu");
        var previaciu = verificar("previaciu");
        document.getElementById("totviaciu").value=(parseFloat(canviaciu)*parseFloat(previaciu)).toFixed(2);

        var canviapro = verificar("canviapro");
        var previapro = verificar("previapro");
        document.getElementById("totviapro").value=(parseFloat(canviapro)*parseFloat(previapro)).toFixed(2);

        var canviafro = verificar("canviafro");
        var previafro = verificar("previafro");
        document.getElementById("totviafro").value=(parseFloat(canviafro)*parseFloat(previafro)).toFixed(2);
  
        //Para diferencia A
        var totcombubol=  (parseFloat(totalcombu)*parseFloat(precio)).toFixed(2);
        var totgastos =  (parseFloat(canpeaje)*parseFloat(prepeaje)).toFixed(2);     
        var totgaraje =  (parseFloat(cangaraje)*parseFloat(pregaraje)).toFixed(2); 
        var totmante  =  (parseFloat(canmante)*parseFloat(premante)).toFixed(2);    
        var totviaciu =  (parseFloat(canviaciu)*parseFloat(previaciu)).toFixed(2);     
        var totviapro =  (parseFloat(canviapro)*parseFloat(previapro)).toFixed(2);     
        var totviafro =  (parseFloat(canviafro)*parseFloat(previafro)).toFixed(2);     

        document.getElementById("totprebol").value=(parseFloat(totcombubol)+parseFloat(totgastos)+parseFloat(totgaraje)+parseFloat(totmante)+parseFloat(totviaciu)+parseFloat(totviapro)+parseFloat(totviafro)).toFixed(2);

        //Transporte Público
        var cantidad1  = verificar("cantidad1");
        var precio1    = verificar("precio1");
        document.getElementById("total1").value=(parseFloat(cantidad1)*parseFloat(precio1)).toFixed(2);

        var cantidad2  = verificar("cantidad2");
        var precio2    = verificar("precio2");
        document.getElementById("total2").value=(parseFloat(cantidad2)*parseFloat(precio2)).toFixed(2);

        var vueltas       = verificar("vueltas");
        var preciovuelta  = verificar("preciovuelta");
        document.getElementById("totalvuelta").value=(parseFloat(vueltas)*parseFloat(preciovuelta)).toFixed(2);
        
        //Para diferencia B
        var vuelta1  = (parseFloat(cantidad1)*parseFloat(precio1)).toFixed(2); 
        var vuelta2  = (parseFloat(cantidad2)*parseFloat(precio2)).toFixed(2); 
        var vuelta3  = (parseFloat(vueltas)*parseFloat(preciovuelta)).toFixed(2); 
        document.getElementById("totalpublico").value=(parseFloat(vuelta1)+parseFloat(vuelta2)+parseFloat(vuelta3)).toFixed(2);

        //Para la diferencia entre A y B
        var totalA = (parseFloat(totcombubol)+parseFloat(totgastos)+parseFloat(totgaraje)+parseFloat(totmante)+parseFloat(totviaciu)+parseFloat(totviapro)+parseFloat(totviafro)).toFixed(2);
        var totalB = (parseFloat(vuelta1)+parseFloat(vuelta2)+parseFloat(vuelta3)).toFixed(2);
        document.getElementById("totaldiferencia").value=(parseFloat(totalA)-parseFloat(totalB)).toFixed(2);
        
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