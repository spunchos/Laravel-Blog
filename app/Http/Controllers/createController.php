<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class createController extends Controller {

    public function home() {

//        $posts = Post::query()->orderBy("created_at", "DESC")->limit(3)->get();

        $producer = Kafka::publishOn('gavno')
            ->withDebugEnabled()
            ->withMessage((new Message(
                headers: ['header-key' => 'header-value'],
                body: ['key' => 'sdfghj'],
                key: 'kafka key here'
            )));

        $producer->send();
        return view('welcome', [
            "posts" => $posts,
        ]);

    }

    public function showContactForm()
    {
        return view("contact_form");
    }

    public function  contactForm(ContactFormRequest $request)
    {
        Mail::to("spunchosss@mail.ru")->send(new ContactForm($request->validated()));

        return redirect("contacts");
    }

}
