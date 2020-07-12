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
        $itemCSVData = array_map('str_getcsv', file(storage_path('/data/csv/items.csv')));
        $itemDataWithoutCSV = array_slice($itemCSVData, 1);
        $itemHeaderList = $itemCSVData[0];
        foreach ($itemDataWithoutCSV as $row) {
            $draftItem = [];
            foreach ($itemHeaderList as $index => $header) {
                if (!empty(trim($row[$index]))) {
                    if (trim($header) == 'images' || trim($header) == 'validation_rules') {
                        $imagePathList = explode("|", trim($row[$index]));
                        $imageObj = [];
                        foreach ($imagePathList as $imagePath) {
                            $imageKeyValuePair = explode(":", $imagePath);
                            $imageObj[trim($imageKeyValuePair[0])] = trim($imageKeyValuePair[1]);
                        }
                        $draftItem[$header] = $imageObj;
                    } else {
                        $draftItem[$header] = trim($row[$index]);
                    }
                }
            }
            $item = new Item($draftItem);
            $item->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
