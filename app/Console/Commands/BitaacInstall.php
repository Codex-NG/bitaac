<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class BitaacInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitaac:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(Filesystem $filesystem)
    {
        $distro = $this->choice('Select a distro you want to use', ['tfs10', 'othire'], 0);

        $db_hostname = $this->ask('Mysql Hostname:', 'localhost');

        $db_username = $this->ask('Mysql Username:', 'root');

        $db_password = $this->secret('Mysql Password');

        $db_database = $this->ask('Mysql Database');

        $connection = @new \mysqli($db_hostname, $db_username, $db_password, $db_database);

        if($connection->connect_errno) {
            $this->error('Connection details are wrong');
        }

        $providers = [
            'tfs10'  => 'bitaac\Tfs10\Tfs10ServiceProvider',
            'othire' => 'bitaac\Othire\OthireServiceProvider',
        ];

        $this->info('Writing config to .env');

        if ($this->confirm('Do you wish to continue? [y|N]')) {
            $filesystem->append('.env.example',"
DB_HOST=${db_hostname}
DB_DATABASE=${db_database}
DB_USERNAME=${db_username}
DB_PASSWORD=${db_password}
DISTRO=".$providers[$distro]."
            "); 
        }   
    }
}
