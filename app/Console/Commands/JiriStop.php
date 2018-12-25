<?php

namespace Jiri\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Jiri\Jiri;
use Jiri\Mail\JiriStoped;

class JiriStop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jiri:stop {jiri}';
    protected $jiri;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Arrêter le jiri';

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
     * @return mixed
     */
    public function handle()
    {
        $jiri_id = $this->argument('jiri');
        $this->jiri = Jiri::findOrfail($jiri_id)->load('judges');
        $this->destroyToken();
        $this->sendEmails();
    }

    private function destroyToken(){
        foreach($this->jiri->judges as $judge){
            $judge->token = null;
            $judge->save();
        }

    }

    private function sendEmails(){
        foreach($this->jiri->judges as $judge){
            Mail::to($judge->email)->send(new JiriStoped($judge,$this->jiri));
        }

    }
}
