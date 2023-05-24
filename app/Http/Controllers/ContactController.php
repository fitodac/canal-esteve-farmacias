<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index() {
        return Inertia::render('Contact');
    }

    public function store(Request $request) {
        \Log::info($request);

        $this->validate($request, [
            'name'          => 'required|string',
            'lastname'      => 'required|string',
            'email'         => 'required|email',
            'phone'         => 'required',
            'pharm'         => 'required',
            'message'       => 'required',
            'acceptance'    => 'accepted|boolean'
        ], [], [
            'name'          => 'nombre',
            'lastname'      => 'apellido',
            'email'         => 'correo electrónico',
            'phone'         => 'teléfono',
            'pharm'         => 'farmacia',
            'message'       => 'mensaje',
            'acceptance'    => 'politicas de privacidad'
        ]);

        $from = config('mail.from.address');
        $to = env('MAIL_TO_ADDRESS');

        try {
            Mail::send('mail', array(
                'name' => $request->get('name'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'pharm' => $request->get('pharm'),
                'body' => $request->get('message'),
            ), function($message) use ($from, $to){
                $message->from($from);
                $message->to($to)->subject('Formulario de contacto');
            });

            $message = 'Hemos recibido su mensaje y nos gustaría darle las gracias por escribirnos.';
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info($th);
            $message = 'No hemos podido enviar el mensaje';
        }

        return redirect()->route('contact')->with('message', $message);
    }
}
