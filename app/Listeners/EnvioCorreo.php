<?php

namespace App\Listeners;

use App\Events\UsuarioRegistrado;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

class EnvioCorreo
{
    /**
     * Evento para enviar correo al registrarse
     * @param UsuarioRegistrado $event
     * @return void
    */
    public function handle(UsuarioRegistrado $event) {
        // $data = array('name' => $event->usuario->nombres, 'email' => $event->usuario->email, 'body' => 'Se ha registrado exitosamente al sistema');
        // Mail::send('emails.mail', $data, function($message) use ($data) {
        //     $message->to($data['email'])
        //             ->subject('Bienvenido al Sistema');
        //     $message->from('dannywilches23@gmail.com');
        // });

        // DB::table('registro_eventos')->insert(['descripcion' => 'Usuario Registrado Existosamente', 'fecha_registro' => '2022-02-02 20:00:00']);
        DB::insert("INSERT INTO registro_eventos (descripcion, fecha_registro) VALUES ('Usuario Registrado Existosamente', '2022-02-02 20:00:00')");


    }

}

?>
