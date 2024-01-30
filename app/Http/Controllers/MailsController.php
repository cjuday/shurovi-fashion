<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Mails;
use App\Mail\ContactMail;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mails::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $mail = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $secureMail = Mail::to('mailbot@genesis-bd.com')->send(new ContactMail($name, $mail, $subject, $message));
        
        if($secureMail){
            Mails::create([
                'name' => $name,
                'email' => $mail,
                'subject' => $subject,
                'message' => $message
            ]);

            return response()->json(['type'=> 'success', 'message' => 'Your query has been sent. Our team will contact with you shortly.']);
        }else{
            return response()->json(['type'=> 'error', 'message' => 'E-mail Was Not Sent!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
