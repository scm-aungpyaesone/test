<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function getItemTree()
    {
        return response()->json(Item::getTree());
    }

    public function postSelectedItems(Request $request)
    {
        $GLOBALS['errors'] = [];
        $GLOBALS['errorIds'] = [];
        $GLOBALS['validSelectedIds'] = [];
        $selectedItemIds = array_unique($request['selectedItemIds']);
        $rootIds = Item::getRoots()->pluck('id')->toArray();
        $selectedRootIds = array_intersect($selectedItemIds, $rootIds);
        $unSelectedRootIds = array_diff($rootIds, $selectedRootIds);
        foreach ($unSelectedRootIds as $key => $unSelectedRootId) {
            array_push($GLOBALS['errors'], Item::find($unSelectedRootId)->error_message);
            array_push($GLOBALS['errorIds'], $unSelectedRootId);
        }
        foreach ($selectedRootIds as $key => $selectedRootId) {
            $this->checkValidation($selectedRootId, $selectedItemIds);
        }
        $invalidSelectedIds = array_diff($selectedItemIds, $GLOBALS['validSelectedIds']);
        return response()->json([
            'errors' => $GLOBALS['errors'],
            'invalidSelectedIds' => array_values($invalidSelectedIds),
        ]);
    }

    public function checkValidation($id, $selectedItemIds)
    {
        $tmpItem = Item::find($id);
        $tmpChildrenIds = $tmpItem->getChildren()->pluck('id')->toArray();
        $selectedTmpChildrenIds = array_intersect($selectedItemIds, $tmpChildrenIds);
        if (count($selectedTmpChildrenIds) > $tmpItem->need_children_count) {
            foreach ($selectedTmpChildrenIds as $key => $selectedTmpChildId) {
                array_push($GLOBALS['errorIds'], $selectedTmpChildId);
            }
            array_push(
                $GLOBALS['errors'],
                $tmpItem->title . " of choice is at most " . $tmpItem->need_children_count
            );
            return;
        } else if (count($selectedTmpChildrenIds) < $tmpItem->need_children_count) {
            array_push(
                $GLOBALS['errors'],
                $tmpItem->error_message
            );
            return;
        }
        array_push($GLOBALS['validSelectedIds'], $id);
        foreach ($selectedTmpChildrenIds as $key => $selectedTmpChildId) {
            $this->checkValidation($selectedTmpChildId, $selectedItemIds);
        }
        return;
    }
}
