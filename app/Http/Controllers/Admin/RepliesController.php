<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ContactReplied;
use App\Message;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

/**
 * Class RepliesController
 * @package App\Http\Controllers\Admin
 */
class RepliesController extends Controller
{

    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Message $message
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Message $message, Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);
        $message->replies()->create([
            'content' => $request->input('content')
        ]);
        Mail::to($message->email)->send(new ContactReplied($message->name, $request->input('content')));
        return redirect()->back()->with('message', 'Reply added successfully.');
    }

    /**
     * @param Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return redirect()->back()->with('message', 'Reply deleted successfully.');
    }

}
