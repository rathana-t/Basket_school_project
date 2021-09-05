<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminExportOneSeller implements FromCollection,WithHeadings
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
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection()
    {
        return collect(Report::GetReportOneSellerCommission($this->id));
        // return Report::all();
    }

}
