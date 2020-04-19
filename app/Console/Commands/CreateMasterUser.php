<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateMasterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:master';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '관리자 만들가';

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
        //
        $email = $this->ask('메일 주소?');
        $nickname = $this->ask('닉넴?');
        $password = $this->secret('비번?');

        echo $password."\n";

        if ($this->confirm('만든다?')) {
            $model = new User();
            $model->master = 1;
            $model->email = $email;
            $model->nickname = $nickname;
            $model->pw = \Hash::make($password);
            $model->save();

            $this->info('생성 완료!');
        } else {
            $this->error('ㅅㄱ!');
        }
    }
}
