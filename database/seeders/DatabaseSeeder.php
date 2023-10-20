<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use App\Models\Role;
use App\Models\Configuration;
use Database\Factories\GameFactory;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create(['name'=> 'user_limited']);
        Role::factory()->create(['name'=> 'user_admin']);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => '2'
            ]);

        \App\Models\User::factory(4)->create();
        /*
        \App\Models\Game::factory(10)->create();
        \App\Models\User::factory(4)->create();
        \App\Models\GameUser::factory(5)->create();
        */
        \App\Models\Vendor::factory()->create(['name'=> 'Intel']);
        \App\Models\Vendor::factory()->create(['name'=> 'Nvidia']);
        \App\Models\Vendor::factory()->create(['name'=> 'AMD']);
        \App\Models\Vendor::factory()->create(['name'=> 'Ati']);
        \App\Models\Vendor::factory()->create(['name'=> 'SK Hynix']);
        \App\Models\Vendor::factory()->create(['name'=> 'Samsung Semiconductor']);
        \App\Models\Type::factory()->create(['name'=> 'CPU']);
        \App\Models\Type::factory()->create(['name'=> 'GPU']);
        \App\Models\Type::factory()->create(['name'=> 'iGPU']);
        \App\Models\Type::factory()->create(['name'=> 'RAM']);
        \App\Models\Type::factory()->create(['name'=> 'Storage']);
        \App\Models\Type::factory()->create(['name'=> 'PCI-Express Card']);
        \App\Models\Part::factory()->create(['name'=> 'Amd Ryzen 5 1600', 'type_id' => '1', 'vendor_id' => '3']);
        \App\Models\Part::factory()->create(['name'=> 'Amd Ryzen 5 2500U', 'type_id' => '1', 'vendor_id' => '3']);
        \App\Models\Part::factory()->create(['name'=> 'Amd Ryzen 5 3600', 'type_id' => '1', 'vendor_id' => '3']);
        \App\Models\Part::factory()->create(['name'=> 'Intel Core i5-10400F', 'type_id' => '1', 'vendor_id' => '1']);
        \App\Models\Part::factory()->create(['name'=> 'EVGA RTX 2070 8GB', 'type_id' => '2', 'vendor_id' => '2']);
        \App\Models\Part::factory()->create(['name'=> 'AsRock Challenger RX 6750XT', 'type_id' => '2', 'vendor_id' => '3']);
        \App\Models\Part::factory()->create(['name'=> 'AMD Vega 8 Graphics (Ryzen 5 2500U)', 'type_id' => '3', 'vendor_id' => '3']);
        \App\Models\Game::factory()->create(
            ['title'=>'Resident Evil 4(2023)',
            'publisher' => 'Capcom',
            'developer'=>'Capcom',
            'release_date' => '4/20/2023']
        );
        \App\Models\Game::factory()->create(
            ['title'=>'Sonic Generations(2011)',
                'publisher' => 'Sega',
                'developer'=>'Sonic Team',
                'release_date' => '10/11/2011']
        );
        \App\Models\Game::factory()->create(
            ['title'=>'The Elders Scrolls V : Skyrim (2011)',
                'publisher' => 'Microsoft',
                'developer'=>'Bethesda Games Studios',
                'release_date' => '11/11/2011']
        );
        Configuration::factory(5)->create();
        $configurations =  \App\Models\Configuration::all();
        $parts =  \App\Models\Part::all();
        foreach ($configurations as $configuration) {
            $configuration_part= $parts->random(rand(1, 3)); // Assign random roles to users
            foreach ($configuration_part as $part) {
               DB::table('configuration_part')->insert([
                    'configuration_id' => $configuration->id,
                    'part_id' => $part->id,
                ]);
            }
        }
        \App\Models\Submission::factory()->create(
            ['name'=>'Low End Skyrim',
                'user_id' => '1',
                'game_id' => '3',
                'configuration_id'=> Configuration::inRandomOrder()->first()->id,
                'description' => 'Test']
        );

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
