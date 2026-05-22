<?php

namespace Database\Seeders;

use App\Models\AiPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AiPlansTableSeeder extends Seeder
{
    public function run(): void
    {
        AiPlan::insert([
            [
                'title' => 'Starter',
                'description' => 'Basic plan for small companies',
                'price_range' => '$1k - $5k',
                'company_size' => 'small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Growth',
                'description' => 'Plan for medium companies',
                'price_range' => '$5k - $15k',
                'company_size' => 'medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Enterprise',
                'description' => 'Plan for large companies',
                'price_range' => '$15k+',
                'company_size' => 'large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
