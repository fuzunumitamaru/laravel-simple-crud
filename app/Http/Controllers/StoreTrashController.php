<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\DataTables\StoreTrashDataTable;

class StoreTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreTrashDataTable $dataTable)
    {
        return $dataTable->render('store.trash');
    }


    public function restore(Request $request)
    {
        Store::withTrashed()->find($request->id)->restore();

        return response(['status' => 'success', 'message' => 'Restored Successfully!']);
    }


    public function destroy_permanent(Request $request)
    {
        Store::withTrashed()->find($request->id)->forceDelete();

        return response(['status' => 'success', 'message' => 'Delete Successfully!']);
    }

}
