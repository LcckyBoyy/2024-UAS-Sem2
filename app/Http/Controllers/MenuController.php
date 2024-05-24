<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use Illuminate\Http\Request;
=======
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
>>>>>>> new-back

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $data = Menu::orderBy('name', 'asc')->get();
        return view('admin', ['data'=>$data]);
=======
        $data = Menu::orderBy('updated_at', 'desc')->get();
        return view('dashboard', ['data'=>$data]);
>>>>>>> new-back
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
<<<<<<< HEAD

=======
>>>>>>> new-back
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
        
<<<<<<< HEAD
        return redirect('/admin')->with('succes', 'Menu Saved');
=======
        return redirect('/dashboard')->with('succes', 'Menu Saved');
>>>>>>> new-back
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
<<<<<<< HEAD
    public function edit(string $id)
    {
        //
=======
    public function edit(Menu $menu)
    {
        return view('edit')->with('menu', $menu);
>>>>>>> new-back
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, string $id)
=======
    public function update(Request $request, Menu $menu)
>>>>>>> new-back
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required|max:200',
<<<<<<< HEAD
            'image' => 'image'
=======
>>>>>>> new-back
        ]);

        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];

<<<<<<< HEAD
        if($request->file('image')){
            $data['image'] = $request->file('image')->store('menu-images');
        }

        Menu::where('id',$id)->update($data);
        return redirect('/admin')->with('succes','Menu Updated');
=======
        if ($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('menu-images');

            Storage::delete($menu->image);
        } else {
            $data['image'] = $menu->image;
        }

        $menu->update($data);
        return redirect('/dashboard')->with('succes','Menu Updated');
>>>>>>> new-back
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(string $id)
    {
        Menu::where('id',$id)->delete();
        Storage::delete('id');
        return redirect('/admin')->with('succes', 'Menu Deleted');
=======
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return redirect('/dashboard')->with('succes','Menu Deleted');
>>>>>>> new-back
    }
}
