<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Product;
//use App\Application;


class DeveloperMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product_id;
    public $descr;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product_id,$descr)
    {
        $this->product_id=$product_id;
        $this->descr=$descr;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        //'roman.prokop@mail.zp.ua'
        //return $this->from('prokopeenkoroman88@gmail.com')->view('order.mail',compact('order','orderItems','toAdmin'));

//        @if(Auth::user())
//    @if(Auth::user()->role=='admin')


        $send= \Auth::user();
        $dest= User::where('role','=','admin')->first();       
        $product = Product::find($this->product_id);
        $descr=$this->descr;

        //->to($dest->email)
        //$send->email
        $send_email='prokopeenkoroman88@gmail.com';
        return $this->from($send_email)->view('user.comments.mail',compact('send','dest','product','descr'));





    }
}
