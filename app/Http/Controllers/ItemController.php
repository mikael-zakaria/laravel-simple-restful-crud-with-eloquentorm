<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::all(); //Get All Data From Database
        return view('index', ['items'  =>  $items]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate (
            [
                'sku'           => 'required|size:5|unique:items,sku',
                'name'          => 'required|min:1|max:70',
                'description'   => 'required|min:1|max:100',
                'price'         => 'required|integer',
            ]
        );

        Item::create($validateData);
        return redirect()->route('index')->with('message', "{$validateData['name']}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        // get database with id search
        $result = Item::findOrFail($item);

        return view('show', ['item'  =>  $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validateData = $request->validate (
            [
                'sku'           => 'required|size:5|unique:items,sku,'.$item->id,
                'name'          => 'required|min:1|max:70',
                'description'   => 'required|min:1|max:100',
                'price'         => 'required|integer',
            ]
        );

        Item::where('id', $item->id)->update($validateData);

        return redirect()->route('show', ['item' => $item->id])->with('message', "{$validateData['name']}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();
        return redirect()->route('index')->with('message', "Delete data $item->name Success");
    }
}
