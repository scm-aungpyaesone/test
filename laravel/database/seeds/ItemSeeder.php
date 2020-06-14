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
                    'error_message' => 'PC is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 2,
                    'title' => 'Mouse',
                    'error_message' => 'Mouse is required.',
                    'need_children_count' => 1,
                ]
            ),
        ];
        foreach ($roots as $root) {
            $root->save();
        }
        $children = [
            new Item(
                [
                    'id' => 3,
                    'title' => 'PC Brand',
                    'parent_id' => 1,
                    'error_message' => 'PC Brand is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 4,
                    'title' => 'Dell PC',
                    'need_children_count' => 2,
                    'parent_id' => 3,
                    'error_message' => 'PC Specifications are required.'
                ]
            ),
            new Item(
                [
                    'id' => 5,
                    'title' => 'PC RAM',
                    'parent_id' => 4,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 6,
                    'title' => 'PC Processor',
                    'parent_id' => 4,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 7,
                    'title' => '4GB',
                    'parent_id' => 5,
                    'error_message' => 'PC RAM is required.'
                ]
            ),
            new Item(
                [
                    'id' => 8,
                    'title' => '8GB',
                    'parent_id' => 5,
                    'error_message' => 'PC RAM is required.'
                ]
            ),
            new Item(
                [
                    'id' => 9,
                    'title' => 'i5',
                    'parent_id' => 6,
                    'error_message' => 'PC Processor is required.'
                ]
            ),
            new Item(
                [
                    'id' => 10,
                    'title' => 'i7',
                    'parent_id' => 6,
                    'error_message' => 'PC Processor is required.'
                ]
            ),
            new Item(
                [
                    'id' => 11,
                    'title' => 'HP PC',
                    'need_children_count' => 2,
                    'parent_id' => 3,
                    'error_message' => 'PC Specifications are required.'
                ]
            ),
            new Item(
                [
                    'id' => 12,
                    'title' => 'PC RAM',
                    'parent_id' => 11,
                    'error_message' => 'PC RAM is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 13,
                    'title' => 'PC Processor',
                    'parent_id' => 11,
                    'error_message' => 'PC Processor is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 14,
                    'title' => '4GB',
                    'parent_id' => 12,
                    'error_message' => 'PC RAM is required.'
                ]
            ),
            new Item(
                [
                    'id' => 15,
                    'title' => '8GB',
                    'parent_id' => 12,
                    'error_message' => 'PC RAM is required.'
                ]
            ),
            new Item(
                [
                    'id' => 16,
                    'title' => 'i5',
                    'parent_id' => 13,
                    'error_message' => 'PC Processor is required.'
                ]
            ),
            new Item(
                [
                    'id' => 17,
                    'title' => 'i7',
                    'parent_id' => 13,
                    'error_message' => 'PC Processor is required.'
                ]
            ),
            new Item(
                [
                    'id' => 18,
                    'title' => 'Gaming Mouse',
                    'parent_id' => 2,
                    'error_message' => 'Mouse Type is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 19,
                    'title' => 'Normal Mouse',
                    'parent_id' => 2,
                    'error_message' => 'Mouse Type is required.',
                    'need_children_count' => 1,
                ]
            ),
            new Item(
                [
                    'id' => 20,
                    'title' => 'Bluetooth',
                    'parent_id' => 18,
                    'error_message' => 'Gaming Mouse Type is required.'
                ]
            ),
            new Item(
                [
                    'id' => 21,
                    'title' => 'Normal',
                    'parent_id' => 18,
                    'error_message' => 'Gaming Mouse Type is required.'
                ]
            ),
            new Item(
                [
                    'id' => 22,
                    'title' => 'Bluetooth',
                    'parent_id' => 19,
                    'error_message' => 'Normal Mouse Type is required.'
                ]
            ),
            new Item(
                [
                    'id' => 23,
                    'title' => 'Normal',
                    'parent_id' => 19,
                    'error_message' => 'Normal Mouse Type is required.'
                ]
            ),
        ];
        foreach ($children as $child) {
            $child->save();
        }
    }
}
