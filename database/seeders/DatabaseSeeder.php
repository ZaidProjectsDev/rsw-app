<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use Database\Factories\GameFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Game::factory(10)->create();
        \App\Models\User::factory(4)->create();
        \App\Models\GameUser::factory(5)->create();
        \App\Models\Vendor::factory()->create(['name'=> 'Intel']);
        \App\Models\Vendor::factory()->create(['name'=> 'Nvidia']);
        \App\Models\Vendor::factory()->create(['name'=> 'AMD']);
        \App\Models\Vendor::factory()->create(['name'=> 'Ati']);
        \App\Models\Vendor::factory()->create(['name'=> 'SK Hynix']);
        \App\Models\Vendor::factory()->create(['name'=> 'Samsung Semiconductor']);
        \App\Models\HardwareType::factory()->create(['name'=> 'CPU']);
        \App\Models\HardwareType::factory()->create(['name'=> 'GPU']);
        \App\Models\HardwareType::factory()->create(['name'=> 'iGPU']);
        \App\Models\HardwareType::factory()->create(['name'=> 'RAM']);
        \App\Models\HardwareType::factory()->create(['name'=> 'Storage']);
        \App\Models\HardwareType::factory()->create(['name'=> 'PCI-Express Card']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'Amd Ryzen 5 1600', 'hardware_type_id' => '1', 'vendor_id' => '3']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'Amd Ryzen 5 2500U', 'hardware_type_id' => '1', 'vendor_id' => '3']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'Amd Ryzen 5 3600', 'hardware_type_id' => '1', 'vendor_id' => '3']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'Intel Core i5-10400F', 'hardware_type_id' => '1', 'vendor_id' => '1']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'EVGA RTX 2070 8GB', 'hardware_type_id' => '2', 'vendor_id' => '2']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'AsRock Challenger RX 6750XT', 'hardware_type_id' => '2', 'vendor_id' => '3']);
        \App\Models\HardwarePart::factory()->create(['name'=> 'AMD Vega 8 Graphics (Ryzen 5 2500U)', 'hardware_type_id' => '3', 'vendor_id' => '3']);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
