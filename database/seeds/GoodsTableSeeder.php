<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Defined departments
     *
     * @var array
     */
    private $department = [
        'savoury' => [
            'name' => 'Savoury',
            'goods' => [
                [
                    'name' => 'Royco beef tiny cubes',
                    'skus' => ['4g']
                ],
                [
                    'name' => 'Knorr beef tiny cubes',
                    'skus' => ['4g']
                ]
            ]
        ],
        'spreads' => [
            'name' => 'Spreads',
            'goods' => [
                [
                    'name' => 'Blueband low fat',
                    'skus' => ['100g', '250g']
                ],
                [
                    'name' => 'Blueband medium fat',
                    'skus' => ['100g', '250g', '500g', '1kg']
                ]
            ]
        ],
        'pcare' => [
            'name' => 'PCare',
            'goods' => [
                [
                    'name' => 'Vaseline petroleum jelly pure original',
                    'skus' => ['25g', '50g', '100g', '250g']
                ],
                [
                    'name' => 'Vaseline petroleum jelly baby gentle',
                    'skus' => ['25g', '50g', '100g', '250g']
                ]
            ]
        ],
        'pwash' => [
            'name' => 'PWash',
            'goods' => [
                [
                    'name' => 'Omo extra fresh for fabric conditioner',
                    'skus' => ['100g', '200g', '500g', '1kg', '3.5kg']
                ],
                [
                    'name' => 'Omo original',
                    'skus' => ['100g', '200g', '500g', '1kg', '3.5kg']
                ]
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->department as $slug => $value) {
            // Create the department
            $dep = \App\Models\Department::create([
                'name' => $value['name'],
                'slug' => $slug
            ]);

            // Create the goods
            foreach ($value['goods'] as $good) {
                $newgood = $dep->goods()->create([
                    'name' => $good['name']
                ]);

                // Create the skus
                foreach ($good['skus'] as $sku) {
                    $newgood->skus()->create([
                        'size' => $sku
                    ]);
                }
            }
        }
    }
}
