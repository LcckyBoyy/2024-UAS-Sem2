<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menu::orderBy('updated_at', 'desc')->get();
        return view('dashboard', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required|max:200',
            'image' => 'image|required'
        ]);

        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];
        
        $data['image'] = $request->file('image')->store('menu-images');
        Menu::create($data);
        
        return redirect('/dashboard')->with('succes', 'Menu Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('edit')->with('menu', $menu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required|max:200',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];

        if ($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('menu-images');

            Storage::delete($menu->image);
        } else {
            $data['image'] = $menu->image;
        }

        $menu->update($data);
        return redirect('/dashboard')->with('succes','Menu Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return redirect('/dashboard')->with('succes','Menu Deleted');
    }
}
