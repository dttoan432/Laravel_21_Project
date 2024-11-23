<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Trademark;
use App\Models\Warehouse;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyW = '';
        $products = Product::where('quantity', '>=', -100);
        if ($request->has('q')) {
            $keyW = $request->get('q');
            $products->where('name', 'LIKE', '%'.$keyW.'%');
        }

        if ($request->has('trademark')) {
            $products->where('trademark_id', $request->get('trademark'));
        }

        if ($request->has('category')) {
            $products->where('category_id', $request->get('category'));
        }

        if ($request->has('status')) {
            $products->where('status', $request->get('status'));
        }

        $products = $products->orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.products.index')->with([
            'products' => $products,
            'keyW' => $keyW
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('_token');

        if ($request->has('key') || $request->has('val')) {
            $key = $request->get('key');
            $val = $request->get('val');
            $list = [];
            $merge = [];
            for ($i = 0; $i < count($key); $i++) {
                $list = [$key[$i] => $val[$i]];
                $merge = array_merge($merge, $list);
            }
            $data['content_more'] = json_encode($merge, JSON_UNESCAPED_UNICODE);
        }

        $data['slug'] = Str::slug($request->get('name'));
        $data['quantity'] = 0;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();

        $product = Product::create($data);

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $disk = 'public';
                $path = Storage::disk($disk)->put('images', $file);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        $ware['product_id'] = $product->id;
        $ware['entered']    = 0;
        $ware['sold']       = 0;
        $ware['sale_date']  = Carbon::now();
        $warehouse = Warehouse::create($ware);

        if ($product && $image && $warehouse) {
            return redirect()->route('backend.product.index')->with("success", 'Tạo mới thành công');
        }
        return redirect()->route('backend.product.index')->with("error", 'Tạo mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('backend.products.edit')->with([
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);

        $data = $request->except('_token');

        if ($request->has('key')) {
            $key = $request->get('key');
            $val = $request->get('val');
            $list = [];
            $merge = [];
            for ($i = 0; $i < count($key); $i++) {
                $list = [$key[$i] => $val[$i]];
                $merge = array_merge($merge, $list);
            }
            $data['content_more'] = json_encode($merge, JSON_UNESCAPED_UNICODE);
        } else {
            $data['content_more'] = null;
        }

        $data['slug'] = Str::slug($request->get('name'));
        $data['updated_at'] = Carbon::now();

        $product->update($data);

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $disk = 'public';
                $path = Storage::disk($disk)->put('images', $file);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        $deleteImg = $request->delete_img;
        if (!empty($deleteImg)) {
            foreach ($deleteImg as $dete) {
                $imgDelete = Image::find($dete);
                Storage::disk('public')->delete($imgDelete->path);
                $imgDelete->delete();
            }
        }

        if ($product) {
            return redirect()->route('backend.product.index')->with("success", 'Thay đổi thành công');
        }
        return redirect()->route('backend.product.index')->with("error", 'Thay đổi thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $deleteImg = Image::where('product_id', $product->id)->get();
        if (!empty($deleteImg)) {
            foreach ($deleteImg as $dete) {
                Storage::disk('public')->delete($dete->path);
                $dete->delete();
            }
        }
        $warehouse = Warehouse::where('product_id', $product->id)->first();
        $warehouse->delete();
        $product->delete();

        if ($product && $warehouse) {
            return redirect()->route('backend.product.index')->with("success", 'Xóa thành công');
        }
        return redirect()->route('backend.product.index')->with("error", 'Xóa thất bại');
    }

    public function getTrademark(Request $request){
        $id = $request->get('id');
        if ($id == 0){
            $trademark = Trademark::all();
            echo $data = json_encode($trademark);
        } else {
            $category   = Category::where('id', $id)->first();
            echo $data  = json_encode($category->trademarks);
        }
    }

    public function export()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    public function import(){
        Excel::import(new ProductsImport(),request()->file('file'));

        return back();
    }


    public function seedingProduct()
    {
        $images = [
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/ecb4ecb89954043d893bc493e1eb1aed_0.jpg.webp?itok=nS1DkJh7',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/hanhnhanrangbo.png?itok=qXcfiSRz',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/MACACA.jpg.webp?itok=ccFShh1O',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/DI%E1%BA%BAUANGMUOI.jpg.webp?itok=mvwXVkYg',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/DIEUSAY.jpg.webp?itok=-k5RQSH4',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/62800ac8800a2c270bdb99a71920c3f7.jpg.webp?itok=MlB30Xna',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/b3239b079ecfab297e7ccbee40e8f697.jpg.webp?itok=cp8dKWzY',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/3-16.jpg.webp?itok=bKPi6our',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/lap-suon.jpg.webp?itok=zEF5a9lv',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/ce943681560b24ed8261a60c5922c009.jpg.webp?itok=q0oMLP95',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/Thao%20qua-2.jpeg.webp?itok=eoUK6bdV',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/image008.png.webp?itok=QN9v9GdR',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/b4bfb42f3aa140ce7bf87b55aa1d6266.jpg.webp?itok=grASjnwA',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/que-kho.jpg.webp?itok=diUk7r1f',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/thit-lon-gac-bep-ocop-3.png.webp?itok=aMG3e5tJ',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/hoa-ho%CC%82%CC%80i-scaled.jpg.webp?itok=kXbiobC0',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/BC200-TC-VK.jpg.webp?itok=oVNpIg12',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/BC300-C-VK.jpg.webp?itok=vWJVkjR1',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/BC250-C-VK.jpg.webp?itok=5PGgFuic',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/a8f9940ffbd9429440a69af427918e22_0.jpg.webp?itok=dLWmn-9f',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/aff8f54260881f784e78436a49d18e60_1.jpg.webp?itok=60X6y2D6',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/BC200-OW-VK1.jpg.webp?itok=Tmh0hEO_',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/HoangTra-OW-200gr.jpg.webp?itok=MU0PCud3',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2023-05/tra-dinh-ngoc-thai-nguyen-cao-cap-huu-co-sach-1-bup-duy-nhat-goi-200g-td02-3.jpg.webp?itok=-9S7bEXw',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3677766440186_9fe5f9247bf936c9a8cb614287eda662.jpg.webp?itok=IQjfF9Ux',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3677766454805_551040b9077e910aa8563ca191e68bc3.jpg.webp?itok=AMew3gS6',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3664541483415_8bde50dab326456dee8cd62d2cfab2e9.jpg.webp?itok=i4zyThTm',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3664539912435_e180a41d9487cd1955171e4b83aff547.jpg.webp?itok=dIqvc0nX',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3677766440161_5057325c48b5f5076f5d1174b1504f25.jpg.webp?itok=04ghVoC1',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/Thi%E1%BA%BFt%20k%E1%BA%BF%20ch%C6%B0a%20c%C3%B3%20t%C3%AAn_0.png.webp?itok=dCFijf7R',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3676311975703_489c1c0c2fba218bacd19bf0c9b04757.jpg.webp?itok=kAEaLOpR',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3676312857381_7a10574dcfabc61866dcbe43a5cfe439.jpg.webp?itok=8ULjQtlK',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/z3676312505439_b7bb57c579cba3dc901ca32cca522f76.jpg.webp?itok=P_sAZgnj',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-07/bakich.jpg.webp?itok=VYbcRFk9',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/z3366897076391_cd37b256db1a80deb471da23364c1b2a.jpg.webp?itok=5KuvmFci',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/dc83eb1f928c9d4ffc94c2488e31bc41.jpg.webp?itok=hHcaOr0b',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/com_lang_vong_2.jpeg.webp?itok=H7GbpEW0',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/tnhk222151973.png.webp?itok=qLRlxExK',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/mychupho1.jpg.webp?itok=CzcveHSC',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-09/mychutrang.jpg.webp?itok=wfNuWMXw',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/d9155fedf7863dd86497.jpg.webp?itok=YPxr37-n',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/myngusac.jpg.webp?itok=Ann5fDXp',
            'https://dacsanhht.com/sites/default/files/styles/anh_san_pham_list/public/2022-08/gl2.png.webp?itok=T__xgnh4',
        ];

        $names = [
            'Hạnh nhân sấy',
            'Hạnh nhân rang bơ',
            'Macca',
            'Hạt điều A cồ xếp hoa',
            'Hat điều sấy',
            'Chà là sấy',
            'Yến mạch hữu cơ Đức',
            'Hạt chia Úc',
            'Lạp sườn Lạng Sơn',
            'Táo mèo khô',
            'Thảo quả',
            'Ba chỉ hun khói',
            'Măng rối',
            'Vỏ quế',
            'Thịt lợn thăn gác bếp',
            'Hoa hồi',
            'Bình Trà 200ml',
            'Bình Trà 300ml',
            'Bình Trà Tròn',
            'Long nhãn',
            'Hạt sen',
            'Bình Trà Ống Dài',
            'Hoàng Trà - Bình Đựng Trà',
            'Trà Đinh đặc biệt',
            'Bột nghệ đen',
            'Mầm đậu nành nguyên xơ',
            'Đông trùng hạ thảo khô',
            'Tinh bột nghệ',
            'Trà túi lọc linh chi',
            'Trà sơn mật hồng sâm',
            'Chè dây Cao Bằng',
            'Trà giảo cổ lam Cao Bằng',
            'Ba Kích Tím',
            'Chẩm chéo',
            'Chả cốm Làng Vòng',
            'Cốm Làng Vòng',
            'Tương nếp Hồng Kỳ',
            'Mỳ chũ phở HP',
            'Mỳ chũ trắng HP',
            'Miến dong TH',
            'Mỳ ngũ sắc HP',
            'Mỳ gạo Lứt HP',
            'Thạch Đen',
            'Tương ớt Bản Mường',
            'Khô cá lóc xẻ nguyên con',
            'Chả ram tôm đất',
            'Cá chỉ vàng sốt chua ngọt ĐS',
            'Mực bơ tỏi ĐS',
            'Cá thiều tẩm gia vị ĐS',
            'Cá mai sốt chanh ĐS',
            'Ghẹ sữa rim ĐS',
            'Gà xé lá chanh ĐS',
        ];

        foreach ($names as $name) {
            $request = new Request([
                '_token' => '4g3sieRRIeXdSnjI1NhHEnKsD5loqDIqKRNW8YGe',
                'name' => $name,
                'category_id' => (string)rand(1, 7),
                'trademark_id' => (string)rand(1, 13),
                'origin_price' => (string)rand(100000, 500000),
                'sale_price' => (string)rand(550000, 2000000),
                'content' => file_get_contents('http://loripsum.net/api'),
                'status' => '0',
                'image' => [
                    $this->createUploadedFileFromUrl($images[array_rand($images)]),
                    $this->createUploadedFileFromUrl($images[array_rand($images)]),
                    $this->createUploadedFileFromUrl($images[array_rand($images)]),
                ],
            ]);

            $this->seedingProductProcess($request);
        }
    }

    public function createUploadedFileFromUrl($url)
    {
        // Tải nội dung file từ URL
        $fileContents = file_get_contents($url);
        if ($fileContents === false) {
            throw new Exception("Không thể tải file từ URL: $url");
        }

        // Lưu file tạm thời
        $temporaryPath = sys_get_temp_dir() . '/' . uniqid() . basename(parse_url($url, PHP_URL_PATH));
        file_put_contents($temporaryPath, $fileContents);

        // Tạo đối tượng UploadedFile
        $file = new UploadedFile(
            $temporaryPath,
            basename($temporaryPath),
            mime_content_type($temporaryPath),
            null,
            true // Đánh dấu file đã được chuyển (true cho temporary file)
        );

        return $file;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function seedingProductProcess(Request $request)
    {
        DB::transaction(function () use ($request) {
            $prod = Product::query()->firstWhere('name', $request->get('name'));

            if (!$prod) {
                $data = $request->except('_token');

                if ($request->has('key') || $request->has('val')) {
                    $key = $request->get('key');
                    $val = $request->get('val');
                    $list = [];
                    $merge = [];
                    for ($i = 0; $i < count($key); $i++) {
                        $list = [$key[$i] => $val[$i]];
                        $merge = array_merge($merge, $list);
                    }
                    $data['content_more'] = json_encode($merge, JSON_UNESCAPED_UNICODE);
                }


                $data['slug'] = Str::slug($request->get('name'));
                $data['quantity'] = 0;
                $data['user_id'] = 1;
                $data['created_at'] = Carbon::now();

                $product = Product::create($data);
                foreach ($request->image as $file) {
                    $name = $file->getClientOriginalName();
                    $disk = 'public';
                    $path = Storage::disk($disk)->put('images', $file);

                    $image = new Image();
                    $image->name = $name;
                    $image->disk = $disk;
                    $image->path = $path;
                    $image->product_id = $product->id;
                    $image->save();
                }

                $ware['product_id'] = $product->id;
                $ware['entered'] = 0;
                $ware['sold'] = 0;
                $ware['sale_date'] = Carbon::now();
                $warehouse = Warehouse::query()->create($ware);
            }
        });
    }
}
