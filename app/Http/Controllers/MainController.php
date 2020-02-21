<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact-form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        Message::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'content' => $request->input('message')
        ]);
        $adminEmail = 'operations@theportlandcompany.com';
        Mail::to($adminEmail)->send(new ContactFormSubmitted($request));
        return redirect()->back()->with('message', 'Thanks for contacting us.');
    }
}
