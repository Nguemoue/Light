<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use Illuminate\Console\Command;

class SetupCommand extends Command
{
    protected $signature = 'setup';

    protected $description = 'Command description';

    public function handle()
    {
        $this->setupAdministrator();
    }
    private function setupAdministrator(){
        //verifier que l'administrateur existe en base de donnnes
        if (!Administrator::exists() or !Administrator::whereLogin(config('setup.admin_login'))->exists()){
            Administrator::create([
                'login'=> $login = config("setup.admin_login"),
                "password"=>bcrypt($password = config('setup.admin_password')),
                "photo_url"=>config("setup.default_image")
            ]);
            $this->warn("Administrateur is successfully set up");
            $this->table(["Login","Password"],[[$login,$password]]);
        }else{
            $admin = Administrator::whereLogin(config("setup.admin_login"))->first();
            $this->info(sprintf("Administrator is already setup with \n login: %s , password :%s",$admin->login,'*****'),2);
        }
    }
}
