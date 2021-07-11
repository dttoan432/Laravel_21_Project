<?php

namespace App\Exports;

use App\Models\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::with(['user', 'category', 'trademark'])->get();
    }

    public function map($products) : array {
        if ($products->status == 0){
            $status = 'Đang nhập';
        } elseif ($products->status == 1) {
            $status = 'Đang bán';
        } else {
            $status = 'Dừng bán';
        }

        return [
            $products->name,
            $products->quantity,
            $products->origin_price,
            $products->sale_price,
            $products->user->name,
            $products->category->name,
            $products->trademark->name,
            $status,
            Carbon::parse($products->created_at)->toFormattedDateString(),
            Carbon::parse($products->updated_at)->toFormattedDateString()
        ] ;
    }

    public function headings(): array
    {
        return [
            'Tên sản phẩm',
            'Số lượng',
            'Giá nhập',
            'Giá bán',
            'Người tạo',
            'Danh mục',
            'Thương hiệu',
            'Trạng thái',
            'Ngày tạo',
            'Ngày cập nhật',
        ];
    }
}
