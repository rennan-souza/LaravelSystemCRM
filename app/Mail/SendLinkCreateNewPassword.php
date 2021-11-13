<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendLinkCreateNewPassword extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */

  public $variables;

  public function __construct($variables)
  {
    $this->variables = $variables;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->subject('Redefinir senha') //assunto do email
      ->view('emails.send_link_reset_password'); //local da view onde esta o html do email a ser enviado
  }
}
