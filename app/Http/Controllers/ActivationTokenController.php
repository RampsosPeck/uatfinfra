<?php

namespace Uatfinfra\Http\Controllers;

use Auth;
use Uatfinfra\ActivationToken;
use Illuminate\Http\Request;

class ActivationTokenController extends Controller
{

    public function activate(ActivationToken $token)
    {
    	// 

    	$token->user->activate();

    	//$token->delete();

    	return redirect('home')->withSuccess('Tu cuenta ha sido activada');
    }

}
