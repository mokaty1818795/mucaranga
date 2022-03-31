<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Invoice implements FromCollection, WithStyles,ShouldAutoSize,WithColumnWidths,WithTitle,WithProperties
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $collection;
    private $length;


    public function __construct($collection)
    {
        $this->collection = $collection;
        $this->length = collect($collection[0])->count();
        // dd($this->length);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells("a2:b3"); $sheet->mergeCells("c2:h3");
        $sheet->getStyle('a1:i7')->getAlignment()->applyFromArray(
            [
                'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'textRotation' => 0,
                'wrapText'     => TRUE
            ]
        );
        $sheet->getStyle('a1:i5')->getBorders()->applyFromArray([
            'outline' => [
                'borderStyle' => Border::BORDER_MEDIUM,
                'color' => ['rgb' => '000000'],
            ],
        ]);
        $sheet->getStyle('a6:i6')->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_MEDIUM,
                'color' => ['rgb' => '000000'],
            ],
        ]);
        $sheet->getStyle('a6:i'. ($this->length -2))->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]);
        $sheet->getStyle('a7:i'. ($this->length -2 ))->getBorders()->applyFromArray([
            'outline' => [
                'borderStyle' => Border::BORDER_MEDIUM,
                'color' => ['rgb' => '000000'],
            ],
        ]);
        $sheet->getStyle('a'.($this->length -1). ':b'. ($this->length))->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_MEDIUM,
                'color' => ['rgb' => '000000'],
            ],
        ]);

        $sheet->getStyle('a1:i5')
        ->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('ffffff');

        $sheet->getStyle('a6:i6')
        ->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('f73131');
        $sheet->getStyle('a2:i4')->applyFromArray(
            [
                'font'  => array(
                    'bold'  => true,
                    'color' => array('rgb' => '000000'),
                    'size'  => 15,
                    // 'name'  => 'Verdana'
                )
            ]
                );
        $sheet->freezePane('a7','j7');
        $sheet->getStyle('G')
        ->getNumberFormat()
        ->setFormatCode('_([$MZN] * #,##0.00_);_([$MZN] * (#,##0.00);_([$MZN] * "-"??_);_(@_)');
        $sheet->getStyle('B'. $this->length)
        ->getNumberFormat()
        ->setFormatCode('_([$MZN] * #,##0.00_);_([$MZN] * (#,##0.00);_([$MZN] * "-"??_);_(@_)');
    }

    public function columnWidths(): array
    {
        return [];
    }
    public function collection()
    {
        return $this->collection;
    }

    public function title(): string
    {
        return "Relatório";
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Nelson Alexandre Mutane',
            'lastModifiedBy' => 'Nelson Alexandre Mutane',
            'title'          => 'Relatório  financeiro',
            'description'    => 'Relatório de pagamentos',
            'subject'        => 'Relatórios',
            'keywords'       => 'Relatórios,Biosp,excel',
            'category'       => 'Relatórios',
            'manager'        => 'Nelson Alexandre Mutane',
            'company'        => 'Escola de Condução Mucaranga',
            'developer contact'     => '+258 861710193',
            'version number' => '1.0'
        ];
    }

}
