<?php

namespace App\Exports;

use App\Pembukuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class PembukuanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembukuan::all();
    }


    public function headings(): array {
        return [
            'No',
            'No Surat Jalan',
            'User',
            'Nama Barang',
            'Harga Beli',
            'Harga PO',
            'Tanggal Pembelian',
            'Deskripsi',
            'Status',
            'Unit',
            'Quantity',
            'Created At',
            'Updated At'
        ];
    }

    public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event){ 
            $cellRange = 'A1:W1'; // All header
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            //$spreadsheet->getDefaultStyle()->getFont()->setName('arial');
            //$spreadsheet->getDefaultStyle()->getFont()->setSize('12');

        },
    ];
}

}
