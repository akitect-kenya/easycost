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
                ],
                [
                    'name' => 'Royco Satchet',
                    'skus' => ['70g', '200g']
                ],
                [
                    'name' => 'Royco beef tin',
                    'skus' => ['200gm', '500gm']
                ],
                [
                    'name' => 'Royco chicken tin',
                    'skus' => ['200g', '500g']
                ],
                [
                    'name' => 'Knorr chicken',
                    'skus' => ['15g']
                ],
                [
                    'name' => 'Knorr beef',
                    'skus' => ['15g']
                ],
                [
                    'name' => 'Knorr beef chilli',
                    'skus' => ['15g']
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
                ],
                [
                    'name' => 'Vaseline petroleum cocoa butter rich conditioning jelly',
                    'skus' => ['100g', '250g']
                ],
                [
                    'name' => 'Vaseline petroleum jelly aloe fresh light hydrating',
                    'skus' => ['100g', '250g']
                ],
                [
                    'name' => 'Vaseline petroleum jelly cooling men',
                    'skus' => ['100g', '250g']
                ],
                [
                    'name' => 'Vaseline petroleum jelly fresh men',
                    'skus' => ['100g', '250g']
                ],
                [
                    'name' => 'Vaseline lotion menbody extra strength',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Vaseline lotion men repairing moisture cooling men rep fast absorbing',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Vaseline lotion dry skin repair yellow',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Vaseline lotion aloesoothe',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Vaseline lotion advanced repair',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Vaseline lotion cocoaglow',
                    'skus' => ['100ml', '200ml', '400ml']
                ],
                [
                    'name' => 'Geisha Gemiguard calming chamomile and Vit E',
                    'skus' => ['125g', '225g']
                ],
                [
                    'name' => 'Geisha revitalising mint and green tea',
                    'skus' => ['125g', '225g']
                ],
                [
                    'name' => 'Geisha refreshing lemon and sunflower',
                    'skus' => ['125g', '225g']
                ],
                [
                    'name' => 'Geisha soothing neem and basil',
                    'skus' => ['125g', '225g']
                ],
                [
                    'name' => 'Geisha rose and honey',
                    'skus' => ['125g', '225g']
                ],
                [
                    'name' => 'Geisha coconut milk and honey',
                    'skus' => ['100g', '125g', '225g']
                ],
                [
                    'name' => 'Geisha shea butter and verbena',
                    'skus' => ['100g', '125g', '225g']
                ],
                [
                    'name' => 'Geisha value pack 3 get 1 free',
                    'skus' => ['125g']
                ],
                [
                    'name' => 'Geisha value pack 2 get 1 free',
                    'skus' => ['250g']
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
                ],
                [
                    'name' => 'Sunlight pink powder tropical sensations',
                    'skus' => ['100g', '200g', '500g', '1kg', '3.5kg', '3.5kg bucket']
                ],
                [
                    'name' => 'Sunlight yellow powder spring sensations',
                    'skus' => ['100g', '200g', '500g', '1kg', '3.5kg', '3.5kg bucket']
                ],
                [
                    'name' => 'Sunlight orange powder sunrise sensations',
                    'skus' => ['100g', '200g', '500g', '1kg', '3.5kg', '3.5kg bucket']
                ],
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
