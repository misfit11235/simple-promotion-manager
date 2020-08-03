<?php

use Illuminate\Database\Seeder;
Use App\User;
use App\Promo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 2)->create();
        $promos = factory(Promo::class, 3)->create();
        
        foreach($promos as $promo) {
            foreach($users as $user) {
                if(rand() % 2)
                    $promo->users()->attach($user->id, ['status' => Promo::PROMO_STATUS_ELIGIBLE]);
                else
                    $promo->users()->attach($user->id, ['status' => Promo::PROMO_STATUS_NOT_ELIGIBLE]);   
            }
        }
        $promos->first()->users()->sync($users);
    }
}
