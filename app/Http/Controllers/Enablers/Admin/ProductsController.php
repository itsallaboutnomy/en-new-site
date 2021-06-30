<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Product;
use App\Http\Requests\Enablers\Admin\ProductRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $product, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->imagesDirectoryPath = $product::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.products.';
        $this->route = 'products.';
    }

    public function index()
    {
        $products = $this->product->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('products'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(ProductRequest $request)
    {
        $request->validated();

        $logoPath = $request->file('logo')->store($this->imagesDirectoryPath);
        $bannerPath = $request->file('banner')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['logo_path'] = $logoPath;
        $data['banner_path'] = $bannerPath;

        $this->product->create($data);

        return redirect()->route($this->route.'index')->with('success','New Product added successfully');
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found');
        }

        return view($this->viewPrefix.'show',compact($product));
    }

    public function edit($id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found');
        }

        return view($this->viewPrefix.'edit',compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found');
        }

        $data = $request->all();

        if($request->hasFile('logo'))
        {
            $data['logo_path'] = $request->file('logo')->store($this->imagesDirectoryPath);
            \File::delete($product->logo_path);
        }

        if($request->hasFile('banner'))
        {
            $data['banner_path'] = $request->file('banner')->store($this->imagesDirectoryPath);
            \File::delete($product->banner_path);
        }

        $product->update($data);

        return redirect()->route($this->route.'index')->with('success','Product update successfully');
    }

    public function updateStatus($id)
    {
        $product = $this->product->find($id);

        $product->is_enabled = !(bool)$product->is_enabled;
        $product->save();

        return redirect()->route($this->route.'index')->with('success','Product status updated successfully');
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found');
        }

        \File::delete($product->logo_path);
        \File::delete($product->banner_path);
        $product->delete();

        return redirect()->route($this->route.'index')->with('success','Product deleted successfully');
    }
}
