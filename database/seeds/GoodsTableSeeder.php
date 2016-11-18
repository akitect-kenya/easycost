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
                    'skus' => ['4g' => '95']
                ],
                [
                    'name' => 'Knorr beef tiny cubes',
                    'skus' => ['4g' => '95']
                ],
                [
                    'name' => 'Royco Satchet',
                    'skus' => ['70g' => '32', '200g' => '80']
                ],
                [
                    'name' => 'Royco beef tin',
                    'skus' => ['200g' => '99', '500gm' => '240']
                ],
                [
                    'name' => 'Royco chicken tin',
                    'skus' => ['200g' => '99', '500gm' => '240']
                ],
                [
                    'name' => 'Knorr chicken',
                    'skus' => ['15g' => '75']
                ],
                [
                    'name' => 'Knorr beef',
                    'skus' => ['15g' => '75']
                ],
                [
                    'name' => 'Knorr beef chilli',
                    'skus' => ['15g' => '75']
                ]
            ]
        ],
        'spreads' => [
            'name' => 'Spreads',
            'goods' => [
                [
                    'name' => 'Blueband low fat',
                    'skus' => ['100g' => '30', '250g' => '72']
                ],
                [
                    'name' => 'Blueband medium fat',
                    'skus' => ['100g' => '40', '250g' => '99', '500g' => '240', '1kg' => '315']
                ]
            ]
        ],
        'pcare' => [
            'name' => 'PCare',
            'goods' => [
                [
                    'name' => 'Vaseline petroleum jelly pure original',
                    'skus' => ['25ml' => '25', '50ml' => '50', '100ml' => '99', '250ml' => '185']
                ],
                [
                    'name' => 'Vaseline petroleum jelly baby gentle',
                    'skus' => ['25ml' => '25', '50ml' => '50', '100ml' => '99', '250ml' => '185']
                ],
                [
                    'name' => 'Vaseline petroleum cocoa butter rich conditioning jelly',
                    'skus' => ['100ml' => '110', '250ml' => '199']
                ],
                [
                    'name' => 'Vaseline petroleum jelly aloe fresh light hydrating',
                    'skus' => ['100ml' => '110', '250ml' => '199']
                ],
                [
                    'name' => 'Vaseline petroleum jelly cooling men',
                    'skus' => ['100ml' => '110', '250ml' => '199']
                ],
                [
                    'name' => 'Vaseline petroleum jelly fresh men',
                    'skus' => ['100ml' => '110', '250ml' => '199']
                ],
                [
                    'name' => 'Vaseline lotion menbody extra strength',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Vaseline lotion men repairing moisture cooling men rep fast absorbing',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Vaseline lotion dry skin repair yellow',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Vaseline lotion aloesoothe',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Vaseline lotion advanced repair',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Vaseline lotion cocoaglow',
                    'skus' => ['100ml' => '110', '200ml' => '185', '400ml' => '350']
                ],
                [
                    'name' => 'Geisha Gemiguard calming chamomile and Vit E',
                    'skus' => ['125g' => '60', '225g' => '90']
                ],
                [
                    'name' => 'Geisha revitalising mint and green tea',
                    'skus' => ['125g' => '60', '225g' => '90']
                ],
                [
                    'name' => 'Geisha refreshing lemon and sunflower',
                    'skus' => ['125g' => '60', '225g' => '90']
                ],
                [
                    'name' => 'Geisha soothing neem and basil',
                    'skus' => ['125g' => '60', '225g' => '90']
                ],
                [
                    'name' => 'Geisha rose and honey',
                    'skus' => ['125g' => '60', '225g' => '90']
                ],
                [
                    'name' => 'Geisha coconut milk and honey',
                    'skus' => ['100g' => '40', '125g' => '53', '225g' => '75']
                ],
                [
                    'name' => 'Geisha shea butter and verbena',
                    'skus' => ['100g' => '40', '125g' => '53', '225g' => '75']
                ],
                [
                    'name' => 'Geisha value pack 3 get 1 free',
                    'skus' => ['125g' => '140']
                ],
                [
                    'name' => 'Geisha value pack 2 get 1 free',
                    'skus' => ['250g' => '180']
                ]
            ]
        ],
        'pwash' => [
            'name' => 'PWash',
            'goods' => [
                [
                    'name' => 'Omo extra fresh for fabric conditioner',
                    'skus' => ['100g' => '30', '200g' => '65', '500g' => '165', '1kg' => '290', '3.5kg' => '950']
                ],
                [
                    'name' => 'Omo original',
                    'skus' => ['100g' => '30', '200g' => '65', '500g' => '165', '1kg' => '290', '3.5kg' => '950']
                ],
                [
                    'name' => 'Sunlight pink powder tropical sensations',
                    'skus' => ['100g' => '20', '200g' => '65', '500g' => '165', '1kg' => '290', '3.5kg' => '790', '3.5kg bucket' => '860']
                ],
                [
                    'name' => 'Sunlight yellow powder spring sensations',
                    'skus' => ['100g' => '20', '200g' => '65', '500g' => '165', '1kg' => '290', '3.5kg' => '790', '3.5kg bucket' => '860']
                ],
                [
                    'name' => 'Sunlight orange powder sunrise sensations',
                    'skus' => ['100g' => '20', '200g' => '65', '500g' => '165', '1kg' => '290', '3.5kg' => '790', '3.5kg bucket' => '860']
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
                foreach ($good['skus'] as $sku => $prize) {
                    $newgood->skus()->create([
                        'size' => $sku,
                        'prize' => $prize
                    ]);
                }
            }
        }
    }
}
