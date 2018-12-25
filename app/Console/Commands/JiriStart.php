<?php

namespace Jiri\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Jiri\Jiri;
use Jiri\Mail\JiriStarted;

class JiriStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jiri:start {jiri}';
    protected $jiri;


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Démarrer le jiri';

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
        $this->generateToken();
        $this->sendEmails();
    }

    private function generateToken(){
        foreach($this->jiri->judges as $judge){
            $judge->token = time(). '$'. $judge->id. '$'. $this->jiri->id;
            $judge->save();
        }

    }

    private function sendEmails(){
        foreach($this->jiri->judges as $judge){
            Mail::to($judge->email)->send(new JiriStarted($judge,$this->jiri));
        }

}
}
