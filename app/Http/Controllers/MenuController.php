<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menu::orderBy('name', 'asc')->get();
        return view('admin', ['data'=>$data]);
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
        
        return redirect('/admin')->with('succes', 'Menu Saved');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required|max:200',
            'image' => 'image'
        ]);

        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];

        if($request->file('image')){
            $data['image'] = $request->file('image')->store('menu-images');
        }

        Menu::where('id',$id)->update($data);
        return redirect('/admin')->with('succes','Menu Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::where('id',$id)->delete();
        
        return redirect('/admin')->with('succes', 'Menu Deleted');
    }
}
