<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;  
use Uatfinfra\User;  	
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\InfoSaveRequest;
use Uatfinfra\ModelAutomotores\Photo;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
class PhotoController extends Controller
{
    public function store(Request $request)
    {
    	//return 'procesando imagen...';
    	$this->validate(request(), [
    		'photo' => 'image'
    	]);

    	/*$photo = $request->file('photo');

    	$photoUrl = $photo->store('public');

    	return Storage::url($photoUrl);*/ 

    	$photo = $request->file('photo')->store('public');

    	Photo::create([
    		'url'=> Storage::url($photo),
    		'vehiculo_id' => 10000
    	]);
					

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate(request(), [
            'photo' => 'image|max:2048'
        ]);

        $photo = $request->file('photo')->store('public');

        if(Photo::where('vehiculo_id',$id)->count() < 2)
        {
            Photo::create([
                'url'=> Storage::url($photo),
                'vehiculo_id' => $id
            ]);
        } 
    }

    public function destroy(Photo $foto)
    {
        $foto->delete();

        $photoPath = str_replace('storage', 'public', $foto->url);

        Storage::delete($photoPath);

        return back()->with('flash','Foto Eliminada');
    }

}





