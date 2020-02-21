<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class MessagesController
 * @package App\Http\Controllers\Admin
 */
class MessagesController extends Controller
{

    /**
     * MessagesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['active'] = 'messages';
        $data['messages'] = Message::latest()->paginate(10);
        return view('admin.messages.index', $data);
    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message)
    {
        $data['active'] = 'messages';
        $data['contactMessage'] = $message;
        return view('admin.messages.view', $data);
    }

    /**
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->replies()->delete();
        $message->delete();
        return redirect()->to(route('messages.index'))->with('message', 'Message deleted successfully.');
    }

}
