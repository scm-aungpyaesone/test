<?php

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('item_closure')->truncate();
        DB::table('items')->truncate();
        $items = array_map('str_getcsv', file(storage_path('/data/csv/items.csv')));
        foreach ($items as $index => $row) {
            $itemValues = [
                'id' => $row[0]
            ];
            if ($row[1]) {
                $itemValues['parent_id'] = $row[1];
            }
            if ($row[2]) {
                $itemValues['title'] = $row[2];
            }
            if ($row[3]) {
                $itemValues['price'] = $row[3];
            }
            if ($row[4]) {
                $itemValues['images'] = $row[4];
            }
            if ($row[5]) {
                $itemValues['need_children_count'] = $row[5];
            }
            $item = new Item($itemValues);
            $item->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
