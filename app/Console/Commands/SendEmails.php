<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambiara el estado de los emails a enviadao';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mails = Mail::get();
        
        foreach( $mails as $mailItem)
        {
            $mailItem->update([
                'estado' => 'Enviado',
            ]);
        }

        $this->info('Se enviaron los emails con exito ');

       
    }
}
