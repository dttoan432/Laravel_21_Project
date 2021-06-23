<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Trademark;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademarks = Trademark::all();
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'DESC')->paginate(25);

        return view('backend.products.index')->with([
            'products' => $products,
            'trademarks' => $trademarks,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $trademarks = Trademark::all();
        return view('backend.products.create')->with([
            'categories' => $categories,
            'trademarks'    => $trademarks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('_token');

        $data['slug'] = Str::slug($request->get('name'));
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();

        $product = Product::create($data);

        if ($request->hasFile('image')){
            $files = $request->file('image');

            foreach ($files as $file){
                $name = $file->getClientOriginalName();
                $disk = 'public';
                $path = Storage::disk($disk)->putFileAs('images', $file, $name);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }

        }

        if ($product && $image){
            return redirect()->route('backend.product.index')->with("success",'Tạo mới thành công');
        }
        return redirect()->route('backend.product.index')->with("error",'Tạo mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.products.show')->with([
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
        $trademarks = Trademark::all();
        return view('backend.products.edit')->with([
            'product'       => $product,
            'categories'    => $categories,
            'trademarks'    => $trademarks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);

        $data = $request->except('_token');
        $data['slug'] = Str::slug($request->get('name'));
        $data['updated_at'] = Carbon::now();

        $product->update($data);

        if ($request->hasFile('image')){
            $files = $request->file('image');

            foreach ($files as $file){
                $name = $file->getClientOriginalName();
                $disk = 'public';
                $path = Storage::disk($disk)->putFileAs('images', $file, $name);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        $deleteImg = $request->delete_img;
        if (!empty($deleteImg)){
            foreach ($deleteImg as $dete) {
                $imgDelete = Image::find($dete);
                Storage::disk('public')->delete($imgDelete->path);
                $imgDelete->delete();
            }
        }

        if ($product){
            return redirect()->route('backend.product.index')->with("success",'Thay đổi thành công');
        }
        return redirect()->route('backend.product.index')->with("error",'Thay đổi thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('update', $product);
        $deleteImg = Image::where('product_id', $product->id)->get();
        if (!empty($deleteImg)){
            foreach ($deleteImg as $dete) {
                Storage::disk('public')->delete($dete->path);
                $dete->delete();
            }
        }
        $product->delete();

        if ($product){
            return redirect()->route('backend.product.index')->with("success",'Xóa thành công');
        }
        return redirect()->route('backend.product.index')->with("error",'Xóa thất bại');
    }

    public function search(Request $request){
        $trademarks = Trademark::all();
        $categories = Category::all();
        $products = Product::search($request)->paginate(25);

        return view('backend.products.index')->with([
            'products' => $products,
            'trademarks' => $trademarks,
            'categories' => $categories
        ]);
    }

    public function filter(Request $request){
        $trademarks = Trademark::all();
        $categories = Category::all();
        if ($request->get('trademark') == -1 && $request->get('category') == -1 && $request->get('status') == -1){
            return redirect()->route('backend.product.index');
        }
        $products = Product::query()
            ->status($request)
            ->trade($request)
            ->category($request)
            ->paginate(25);

        return view('backend.products.index')->with([
            'products' => $products,
            'trademarks' => $trademarks,
            'categories' => $categories
        ]);
    }
}
