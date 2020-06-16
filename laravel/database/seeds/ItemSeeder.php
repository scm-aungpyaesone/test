<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roots = [
            new Item(
                [
                    'id' => 1,
                    'title' => 'PC',
                    'need_children_count' => 1,
                    'error_message' => 'There is no selected item for PC.',
                ]
            ),
            new Item(
                [
                    'id' => 2,
                    'title' => 'Mouse',
                    'need_children_count' => 1,
                    'error_message' => 'There is no selected item for Mouse.',
                ]
            ),
        ];
        foreach ($roots as $root) {
            $root->save();
        }
        $childrenForPC = [
            new Item(
                [
                    'id' => 1001,
                    'title' => 'Brand',
                    'parent_id' => 1,
                    'error_message' => 'PC Brand is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 1002,
                    'title' => 'HP Laptop',
                    'parent_id' => 1001,
                    'error_message' => 'There is no selected item for Processor and RAM.',
                    'need_children_count' => 2,
                    'price' => 550000,
                ]
            ),
            new Item(
                [
                    'id' => 1003,
                    'title' => 'Dell Laptop',
                    'parent_id' => 1001,
                    'error_message' => 'There is no selected item for Processor and RAM.',
                    'need_children_count' => 2,
                    'price' => 500000,
                ]
            ),
            new Item(
                [
                    'id' => 1004,
                    'title' => 'Processor',
                    'parent_id' => 1002,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 1005,
                    'title' => 'RAM',
                    'parent_id' => 1002,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 1006,
                    'title' => 'Processor',
                    'parent_id' => 1003,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 1007,
                    'title' => 'RAM',
                    'parent_id' => 1003,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 1008,
                    'title' => 'i3',
                    'parent_id' => 1004,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 0,
                    'price' => 150000,
                ]
            ),
            new Item(
                [
                    'id' => 1009,
                    'title' => 'i5',
                    'parent_id' => 1004,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 0,
                    'price' => 200000,
                ]
            ),
            new Item(
                [
                    'id' => 1010,
                    'title' => 'i7',
                    'parent_id' => 1004,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 0,
                    'price' => 250000,
                ]
            ),
            new Item(
                [
                    'id' => 1011,
                    'title' => '8GB',
                    'parent_id' => 1005,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 0,
                    'price' => 100000,
                ]
            ),
            new Item(
                [
                    'id' => 1012,
                    'title' => '4GB',
                    'parent_id' => 1005,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 0,
                    'price' => 50000,
                ]
            ),
            new Item(
                [
                    'id' => 1013,
                    'title' => 'i5',
                    'parent_id' => 1006,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 0,
                    'price' => 150000,
                ]
            ),
            new Item(
                [
                    'id' => 1014,
                    'title' => 'i7',
                    'parent_id' => 1006,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 0,
                    'price' => 200000,
                ]
            ),
            new Item(
                [
                    'id' => 1015,
                    'title' => '8GB',
                    'parent_id' => 1007,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 0,
                    'price' => 100000,
                ]
            ),
            new Item(
                [
                    'id' => 1016,
                    'title' => '16GB',
                    'parent_id' => 1007,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 0,
                    'price' => 200000,
                ]
            )
        ];
        foreach ($childrenForPC as $childForPC) {
            $childForPC->save();
        }

        $childrenForMouse = [
            new Item(
                [
                    'id' => 2001,
                    'title' => 'Brand',
                    'parent_id' => 2,
                    'need_children_count' => 1,
                    'error_message' => 'Mouse Brand is required.',
                ]
            ),
            new Item(
                [
                    'id' => 2002,
                    'title' => 'HP Mouse',
                    'parent_id' => 2001,
                    'need_children_count' => 1,
                    'error_message' => 'Mouse Brand is required.',
                    'price' => 7000,
                ]
            ),
            new Item(
                [
                    'id' => 2003,
                    'title' => 'Dell Mouse',
                    'parent_id' => 2001,
                    'need_children_count' => 1,
                    'error_message' => 'Mouse Brand is required.',
                    'price' => 5000,
                ]
            ),
            new Item(
                [
                    'id' => 2004,
                    'title' => 'Standard',
                    'parent_id' => 2002,
                    'need_children_count' => 0,
                    'error_message' => 'Mouse Type is required.',
                    'price' => 1000,
                ]
            ),
            new Item(
                [
                    'id' => 2005,
                    'title' => 'Bluetooth',
                    'parent_id' => 2002,
                    'need_children_count' => 0,
                    'error_message' => 'Mouse Type is required.',
                    'price' => 5000,
                ]
            ), new Item(
                [
                    'id' => 2006,
                    'title' => 'Standard',
                    'parent_id' => 2003,
                    'need_children_count' => 0,
                    'error_message' => 'Mouse Type is required.',
                    'price' => 1000,
                ]
            ),
            new Item(
                [
                    'id' => 2007,
                    'title' => 'Bluetooth',
                    'parent_id' => 2003,
                    'need_children_count' => 0,
                    'error_message' => 'Mouse Type is required.',
                    'price' => 5000,
                ]
            ),
        ];
        foreach ($childrenForMouse as $childForMouse) {
            $childForMouse->save();
        }
    }
}
