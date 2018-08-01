<?php

namespace Uatfinfra\Http\Controllers;

use Auth;
use Uatfinfra\User;
use Socialite;
use Uatfinfra\SocialProfile;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    public function redirectToSocialNetwork($socialNetwork)
    { 
    	return Socialite::driver($socialNetwork)->redirect();
    }
    public function handleSocialNetworkCallback($socialNetwork)
    {
    	/*if(! request('code'))
    	{
    		return redirect()->route('login')->with('warning','Hubo un error en el LOGIN...!');
    	}*/

    	try 
    	{
    		$socialUser = Socialite::driver($socialNetwork)->user();
    	}
    	catch(\Exception $e)
    	{
    		return redirect()->route('login')->with('warning','Hubo un error en el LOGIN...!');
    	}


    	//$socialUser = Socialite::driver($socialNetwork)->user();
    	
    	$socialProfile = SocialProfile::firstOrNew([
    		'social_network' => $socialNetwork,
    		'social_network_user_id' => $socialUser->getId()
    	]); 
    	
    	if(! $socialProfile->exists)
    	{
    		$user = User::firstOrNew(['email' => $socialUser->getEmail()]);

    		if(! $user->exists)
    		{
    			$user->name = $socialUser->getName(); 
    			$user->save();
    		}

    		$socialProfile->avatar = $socialUser->getAvatar();
    		$user->profiles()->save($socialProfile);
    		
    		
    	}

    	Auth::login($socialProfile->user);
    	
    	return redirect()->route('home')->with('success','Bienvenido ' . $socialProfile->user->name); 


    	/*try {
    		$socialUser = Socialite::driver($socialNetwork)->user();
    	}catch(\Exception $e)
    	{
    		return redirect()->route('login')->with('warning','Hubo un error en el LOGIN...!');
    	}

    	$socialProfile = SocialProfile::firstOrNew([
    		'social_network' => $socialNetwork,
    		'social_network_user_id' => $socialUser->getId()
    	]); 
     
    	if( ! $socialProfile->exists )
    	{
    		//Verificamos si existe un usuario con el email de la red social 
    		$user = User::firstOrNew(['email', $socialUser->getEmail()]);
    		//dd($user);
    		if(!$user->exists)
    		{
    			$user->name = $socialUser->getName(); 
    			$user->save();
    		}

    		$socialProfile->avatar = $socialUser->getAvatar();
    		$user->profiles()->save($socialProfile);
    		 
    	}    	

    	Auth::login($socialProfile->user); 

    	return redirect()->route('home')->with('success','Bienvenido ' . $socialProfile->user->name);




    	if(! request('code'))
    	{
    		return redirect()->route('login')->with('warning','Hubo un error en el LOGIN...!');
    	}

    	$facebookUser = Socialite::driver($socialNetwork)->user();
    	
    	$user = User::firstOrNew(['facebook_id' => $facebookUser->getId()]);

    	if(! $user->exists)
    	{
    		$user = User::firstOrNew(['email' => $facebookUser->getEmail()]);

    		if(! $user->exists)
    		{
    			$user->name = $facebookUser->getName(); 
    		}

    		$user->facebook_id = $facebookUser->getId();
    		$user->avatar = $facebookUser->getAvatar();
    		$user->save();
    		
    	}

    	Auth::login($user);
    	
    	return redirect()->route('home')->with('success','Bienvenido ' . $user->name); 
*/

    }

}
