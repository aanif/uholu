<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLxgLPmIPXXFsFJoBPZjYG',
                'catagory' => 'keys yearly',
                'cost' => '6900.00',
                'plan_class' => 'Basic',
                'quantity' => '2',
                'upto' => '2',
            ]);

            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLxgLPmIPXXFsFJoBPZjYG',
                'catagory' => 'keys yearly',
                'cost' => '8900.00',
                'plan_class' => 'Standard',
                'quantity' => '4',
                'upto' => '4',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLxgLPmIPXXFsFJoBPZjYG',
                'catagory' => 'keys yearly',
                'cost' => '12900.00',
                'plan_class' => 'Professional',
                'quantity' => '6',
                'upto' => null,
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLwRLPmIPXXFsFU6j5wzBP',
                'catagory' => 'docs yearly',
                'cost' => '5900.00',
                'plan_class' => 'Basic',
                'quantity' => '1',
                'upto' => '1',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLwRLPmIPXXFsFU6j5wzBP',
                'catagory' => 'docs yearly',
                'cost' => '7900.00',
                'plan_class' => 'Standard',
                'quantity' => '3',
                'upto' => '3',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1GzLwRLPmIPXXFsFU6j5wzBP',
                'catagory' => 'docs yearly',
                'cost' => '9900.00',
                'plan_class' => 'Professional',
                'quantity' => '5',
                'upto' => null,
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr8pLPmIPXXFsFPqNqFJeT',
                'catagory' => 'keys business',
                'cost' => '3900.00',
                'plan_class' => 'Basic',
                'quantity' => '5',
                'upto' => '5',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr8pLPmIPXXFsFPqNqFJeT',
                'catagory' => 'keys business',
                'cost' => '6900.00',
                'plan_class' => 'Standard',
                'quantity' => '10',
                'upto' => '10',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr8pLPmIPXXFsFPqNqFJeT',
                'catagory' => 'keys business',
                'cost' => '10900.00',
                'plan_class' => 'Plus',
                'quantity' => '20',
                'upto' => '20',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr8pLPmIPXXFsFPqNqFJeT',
                'catagory' => 'keys business',
                'cost' => '23900.00',
                'plan_class' => 'Premium',
                'quantity' => '50',
                'upto' => '50',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr8pLPmIPXXFsFPqNqFJeT',
                'catagory' => 'keys business',
                'cost' => '45900.00',
                'plan_class' => 'Gold',
                'quantity' => '100',
                'upto' => null,
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr54LPmIPXXFsFJ8NQn60U',
                'catagory' => 'docs business',
                'cost' => '3900.00',
                'plan_class' => 'Basic',
                'quantity' => '5',
                'upto' => '5',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr54LPmIPXXFsFJ8NQn60U',
                'catagory' => 'docs business',
                'cost' => '7900.00',
                'plan_class' => 'Standard',
                'quantity' => '10',
                'upto' => '10',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr54LPmIPXXFsFJ8NQn60U',
                'catagory' => 'docs business',
                'cost' => '14900.00',
                'plan_class' => 'Plus',
                'quantity' => '20',
                'upto' => '20',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr54LPmIPXXFsFJ8NQn60U',
                'catagory' => 'docs business',
                'cost' => '29900.00',
                'plan_class' => 'Premium',
                'quantity' => '50',
                'upto' => '50',
            ]);


            DB::table('plans')->insert([
                'name' => 'plan',
                'stripe_plan' => 'price_1Gwr54LPmIPXXFsFJ8NQn60U',
                'catagory' => 'docs business',
                'cost' => '49900.00',
                'plan_class' => 'Gold',
                'quantity' => '100',
                'upto' => null,
            ]);

    }
}
