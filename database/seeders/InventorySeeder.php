<?php

namespace Database\Seeders;

use App\Models\ProductInventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $max = (int)getSetting('max_inventory_value')->content;
        $max = $max ? $max : 1000;

        for($i=0;$i<=$max;$i++){

            $exist = ProductInventory::where("quantity",$i)->first();

            if(!$exist)
            ProductInventory::query()->create([
                    'quantity' =>   $i
            ]);

        }
    }
}
