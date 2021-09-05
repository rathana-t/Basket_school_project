<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Store Id',
            'Store Name',
            'Product Code',
            'Product',
            'Price',
            'Quantity Order',
            'Total Price',
            'Commission',
            'Commission Price',
        ];
    }
    public function collection()
    {
        return collect(Report::GetReportAllSellerCommission());
        // return Report::all();
    }

}
