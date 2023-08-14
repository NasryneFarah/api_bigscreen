<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = new Types();
        $type->type = "A";
        $type->save();

        $type = new Types();
        $type->type = "B";
        $type->save();

        $type = new Types();
        $type->type = "C";
        $type->save();
    }
}
