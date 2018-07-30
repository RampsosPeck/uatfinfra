<?php

namespace Uatfinfra\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Uatfinfra\Message;
use Auth;
class NotificationsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	//$unreadNotifications = auth()->user()->notifications;
    	//dd("estas aqui");
    	return view('notifications.index', [
    		'unreadNotifications' => auth()->user()->unreadNotifications,
    		'readNotifications' => auth()->user()->readNotifications
    	]);
    	
    }
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('notifications.show', compact('message'));
    }

    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return back()->with('success', 'Notificación marcada como leída.');
    }
    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();

        return back()->with('info','Mensaje eliminado....');
    }

}
