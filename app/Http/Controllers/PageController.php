<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index','read','show'
        ]);
    }
    public function index()
    {
        return view('index');
    }

    public function read()
    {
        $products = Product::paginate(8);
        $date = now();
        return view('read', compact('date'))->with('products', $products);
    }

    public function show(int $id)
    {
        $product = Product::query()->find($id);
        $date = now();
        return view('show', compact('date'))->with('product', $product);
    }

    public function create()
    {
        return view('create-page');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'files',
                $name,
                'public'
            );
        }

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'shortcontent' => 'required',
            'body' => 'required',
            'image' => 'image|image|max:5024'
        ]);
        $products = Product::create([
            'title' => $request->title,
            'shortcontent' => $request->shortcontent,
            'body' => $request->body,
            'price' => $request->price,
            'image' => $path,
        ]);
        return redirect()->back();
    }

    public function edit(int $id)
    {
        $product = Product::query()->find($id);
        return view('edit')->with(['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::query()->find($id);
        if ($request->hasFile('image')) {
            if (isset($product->image)) {
                Storage::delete($product->image);
            }
        }
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('files',$name);
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'shortcontent' => 'required',
            'body' => 'required',
            'image' => 'image|image|max:5024'
        ]);

        $product->update([
            'title' => $request->title,
            'shortcontent' => $request->shortcontent,
            'body' => $request->body,
            'price' => $request->price,
            'image' => $path,
        ]);
        return redirect()->route('read');
    }

    public function delete(Request $request, $id)
{
    $product = Product::query()->find($id);


    if ($request->hasFile('image')) {
        if (isset($product->image)) {
            Storage::delete($product->image);
        }
    }

    $product->delete();
    return redirect()->route('read');
}

}
