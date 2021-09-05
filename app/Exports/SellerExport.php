<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SellerExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Product Code',
            'Product',
            'Price',
            'Quantity Order',
            'Total Price',
            'Commission',
            'Commission Price',
        ];
    }
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection()
    {

        return collect(Report::GetReportCommission($this->id));
        // return Report::all();
    }
}