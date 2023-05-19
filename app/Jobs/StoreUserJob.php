<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;


class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //  скрываем пароль при помощи метода Hash, необходимая процедура и переназначаем скрытый пароль переменной $data
        //  $this->data - означает что ссылаемся на private $data, обьявленную выше
        $this->data['password'] = Hash::make($data['password']);
        //  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
        $user = User::firstOrCreate(['email' => $data['email']], $this->data);
    }
}
