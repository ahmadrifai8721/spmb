<?php

namespace App\Mail;

use App\Models\daftarCalonSiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public daftarCalonSiswa $dataSiswa
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'SPMB SMK ISLAM 1 DURENAN | Pendaftaran Berhasil',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {


        $url = URL::temporarySignedRoute(
            'spmb.login',          // 1. The name of the route
            now()->addMinutes(30),        // 2. The expiration time (DateTime instance)
            ['username' => '0003781833', 'password' => '0003781833'] // 3. Route parameters (optional array)
        );


        return new Content(
            html: 'portal-pendaftran.mailSend',
            with: [
                'dataSiswa' => $this->dataSiswa,
                'loginUrl' => $url,
                'supportEmail' => "rifai@smkislam1durenan.sch.id"
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
