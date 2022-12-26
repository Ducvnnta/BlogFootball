<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Hospital;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::get()->isEmpty()) {
            $user = [];

            $userRecord = [
                'name' => 'user',
                'email' => 'user123@gmail.com',
                'password' => Hash::make('user123'),
                'phone' => '012345678',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($user, $userRecord);


            DB::beginTransaction();
            try {
                User::insert($user);
                DB::commit();
            } catch (\Exception $e) {
                logger($e->getMessage());
                DB::rollBack();
            }
        }

    }
}
