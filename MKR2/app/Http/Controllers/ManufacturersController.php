<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    protected $manufacturers;
    protected $products;

    public function __construct()
    {
        $this->manufacturers = Manufacturer::all();
    }
    public function index()
    {
        return view('manufacturers.index', ['manufacturers' => $this->manufacturers]);
    }
    public function show($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $productsByManufacturer = Product::where('manufacturer', $manufacturer->brand)->get();
        return view('manufacturers.show', ['manufacturer' => $manufacturer, 'products' => $productsByManufacturer]);
    }
    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('manufacturers.edit', ['manufacturer' => $manufacturer]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->all());
        return redirect('/manufacturers/' . $manufacturer->id)->with('success', 'Manufacturer updated successfully!');
    }
}
