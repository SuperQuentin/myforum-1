<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class adminuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminuser {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grants the admin role to a user ';

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
        $userId = $this->argument('user');

        $user = User::find($userId); //Return null if the user doesn't exist

        if($user == null) {
            $this->info('L’utilisateur ' . $userId . ' n’existe pas');
        }
        else if ($user->role_id == 3){
            $this->info($user->pseudo . ' est déjà admin');
        }
        else {
            try{
                $user->role_id = 3;
                $user->save();
            }
            catch(Exception $e){
                $this->error(e);
            }
            finally{
                $this->info($user->pseudo . ' est admin');
            }

        }
        return 0;
    }
}
