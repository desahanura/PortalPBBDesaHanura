<?php

namespace App\Controllers\PbbController;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use App\Models\NOPModel;

class DaftarDihapus extends BaseController
{
    public $nopModel, $db;
    function __construct()
    {
        $this->nopModel = new NOPModel();
        $this->db = \Config\Database::connect();;
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->onlyDeleted()->findAll();
        return view('pbbView/daftarDihapus/viewDaftarDihapus', $data);
    }

    public function hapus($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tb_noppbb')
                ->set('deleted_at', null, true)
                ->where(['id' => $id])
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('daftarDihapus'))->with('success', 'Data Berhasil Dihapus');
            }
        } else {
            $this->db->table('tb_noppbb')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('daftarDihapus'))->with('success', 'Data Berhasil Dihapus');
            }
        }
    }

    public function hapusPermanen($id = null)
    {
        $this->nopModel = new NOPModel();
        if ($this->request->getMethod() === 'delete') {
            if ($id != null) {
                $this->nopModel->forceDelete($id, true); // Menghapus data secara permanen
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Data Berhasil Dihapus Permanen');
            } else {
                $this->nopModel->purgeDeleted(); // Menghapus semua data yang telah dihapus secara permanen
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Semua Data Berhasil Dihapus Permanen');
            }
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function export()
    {
        $noppbb = $this->nopModel->onlyDeleted()->findAll();

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
        header('Content-Dispotition:attachment;filename=NOPPBB.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
