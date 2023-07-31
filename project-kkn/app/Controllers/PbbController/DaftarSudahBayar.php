<?php

namespace App\Controllers\PbbController;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\NOPModel;


class DaftarSudahBayar extends BaseController
{
    function __construct()
    {
        $this->nopModel = new NOPModel();
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->withDeleted()->where('status_bayar', '1')->find();
        // dd($data['noppbb']);

        return view('pbbView/daftarSudahBayar/viewDaftarSudahBayar', $data);
    }

    public function export()
    {
        $noppbb = $this->nopModel->withDeleted()->where('status_bayar', '1')->find();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NOP');
        $sheet->setCellValue('C1', 'Tahun');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Alamat');
        $sheet->setCellValue('F1', 'Besaran PBB');
        $sheet->setCellValue('G1', 'Denda');

        $column = 2;
        foreach ($noppbb as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nop);
            $sheet->setCellValue('C' . $column, $value->tahun);
            $sheet->setCellValue('D' . $column, $value->nama);
            $sheet->setCellValue('E' . $column, $value->alamat);
            $sheet->setCellValue('F' . $column, $value->besaran_pbb);
            $sheet->setCellValue('G' . $column, $value->denda);
            $column++;
        }

        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);


        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('c')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Dispotition: attachment;filename=NOPPBB.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
