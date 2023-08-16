<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\DataTables\StoreDataTable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreDataTable $dataTable)
    {
        return $dataTable->render('store.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->stores()->create($validated);

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $this->authorize('update', $store);
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $this->authorize('update', $store);

        $validated = $request->validated();
        $store->update($validated);

        return redirect(route('stores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $this->authorize('delete', $store);

        $store->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


}
