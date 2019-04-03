<?php

use Illuminate\Database\Seeder;
use Uatfinfra\ModelSolicitudes\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Revisión - Compra - Cambio
        $tag = new Tag;
        $tag->name = "Revisión";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Reparación";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Compra";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio";
        $tag->save(); 

        //Revisión/Reparación 
        /*$tag = new Tag;
        $tag->name = "Revisión/Reparación general del sistema de freno.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación general del sistema eléctrico.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del freno de motor.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del sistema eléctrico del motor.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del sistema de aire del freno.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del alineado de las llantas.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del sistema de suspención de ruedas.";
        $tag->save();
        
        
        $tag = new Tag;
        $tag->name = "Revisión/Reparación del sistema del aire acondicionado.";
        $tag->save();             

        $tag = new Tag;
        $tag->name = "Revisión/Reparación del sistema del sistema de GNV.";
        $tag->save(); 

        //Compra
        $tag = new Tag;
        $tag->name = "Compra de eléctrolito.";
        $tag->save();
 

        $tag = new Tag;
        $tag->name = "Compra de abrasadera trasera del estabilizador.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Compra de aros para llantas.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Compra de pernos.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Compra de halogenos.";
        $tag->save();

        
        //Cambio de 
		$tag = new Tag;
        $tag->name = "Cambio de llantas.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de Baterias.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de pastillas.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de aceite mas filtros.";
        $tag->save();
        
        $tag = new Tag;
        $tag->name = "Cambio de cepillos limpia parabrisas.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de amortiguadores.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de liquido de dirección.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de manguera.";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Cambio de diferentes accesorios.";
        $tag->save();*/
 
    }
}
