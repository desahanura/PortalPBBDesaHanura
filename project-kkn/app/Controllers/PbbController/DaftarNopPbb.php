<?php

namespace App\Controllers\PbbController;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


use App\Models\NOPModel;

class DaftarNopPbb extends BaseController
{

    public $nopModel, $db;
    function __construct()
    {
        $this->nopModel = new NOPModel();
        $this->db = \Config\Database::connect();;
    }

    public function index()
    {
        $selectedStatus = $this->request->getGet('filterStatus');
    
        if ($selectedStatus == '1') {
            $data['noppbb'] = $this->nopModel->withDeleted()->where('status_bayar', '1')->findAll();
        } elseif ($selectedStatus == '0') {
            $data['noppbb'] = $this->nopModel->withDeleted()->where('status_bayar', '0')->findAll();
        } else {
            $data['noppbb'] = $this->nopModel->withDeleted()->findAll();
        }
    
        $data['selectedStatus'] = $selectedStatus ?? ''; // Initialize the variable
    
        return view('pbbView/daftarNopPbb/viewDaftarNopPbb', $data);
    }
    

    public function create()
    {
        return view('pbbView/daftarNopPbb/addNopPbb');

        $data = $this->request->getPost();
        $this->nopModel->insert($data);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data berhasil Disimpan');
        

    }

    public function store()
    {
        $data = [
            "nop" => $this->request->getPost('nop'),
            "tahun" => $this->request->getPost('tahun'),
            "nama" => $this->request->getPost('nama'),
            "alamat" => $this->request->getPost('alamat') . ' ' . $this->request->getPost('dusun') . ' RT/RW ' . $this->request->getPost('rt'). '/' . $this->request->getPost('rw'),
            "besaran_pbb" => $this->request->getPost('besaran_pbb'),
            "denda" => $this->request->getPost('denda'),
            "tanggal" => $this->request->getPost('tanggal'),
            "status_bayar" => $this->request->getPost('status_bayar'),
            "jenis_pajak" => $this->request->getPost('jenis_pajak'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ];
        $this->db->table('tb_noppbb')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    public function edit($id = null)
    {
        $noppbb = $this->nopModel->where('id', $id)->first();
        if (is_object($noppbb)) {
            $data['noppbb'] = $noppbb;
            return view('pbbView/daftarnoppbb/editNopPbb', $data);
        } else {
            return redirect()->to(site_url('daftarNopPbb'))->with('error', 'Data berada di dalam Permintaan Dihapus!');
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // if ($id != null) {
        //     $query = $this->db->table('tb_noppbb')->getWhere(['id' => $id]);
        //     if ($query->resultID->num_rows > 0) {
        //         $data['nopPbb'] = $query->getRow(); //getRow return object teratas
        //         return view('daftarnoppbb/editNopPbb', $data);
        //     } else {
        //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        //     }
        // } else {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }
    }

    public function update($id = null)
    {
        $data = [
            "nop" => $this->request->getVar('nop'),
            "tahun" => $this->request->getVar('tahun'),
            "nama" => $this->request->getVar('nama'),
            "alamat" => $this->request->getPost('alamat') . ' ' . $this->request->getPost('dusun') . ' RT/RW ' . $this->request->getPost('rt'). '/' . $this->request->getPost('rw'),
            "besaran_pbb" => $this->request->getVar('besaran_pbb'),
            "denda" => $this->request->getVar('denda'),
            "tanggal" => $this->request->getVar('tanggal'),
            "status_bayar" => $this->request->getVar('status_bayar'),
            "jenis_pajak" => $this->request->getVar('jenis_pajak'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ];
        // $data = $this->request->getPost();
        // dd($data);
        $this->nopModel->update($id, $data);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Diperbaharui");
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // $this->db->table('tb_noppbb')->where(['id' => $id])->update($data);
        // return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Diperbaharui");
    }

    public function delete($id = null)
    {
        $this->nopModel->where('id', $id)->delete(); 
        // $this->nopModel->delete($id);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data Berhasil Dihapus');
    }

    // public function delete($id = null)
    // {
    //     try {
    //         $deleted = $this->nopModel->where('id', $id)->delete();
    //         if ($deleted) {
    //             return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data Berhasil Dihapus');
    //         } else {
    //             return redirect()->to(site_url('daftarNopPbb'))->with('error', 'Data Gagal Dihapus');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->to(site_url('daftarNopPbb'))->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }


    public function sudahBayar()
    {
        $data = $this->request->getVar('checkbox');
        foreach ($data as  $value) {
            $this->nopModel->update($value, ['status_bayar' => '1']);
        }
        return redirect()->to(site_url('daftarHarusDitagih'))
            ->with('success', "Data Berhasil Diperbaharui");
    }

    public function belumBayar()
    {
        $data = $this->request->getVar('checkbox');
        foreach ($data as  $value) {
            $this->nopModel->update($value, ['status_bayar' => '0']);
        }
        return redirect()->to(site_url('daftarSudahBayar'))
            ->with('success', "Data Berhasil Diperbaharui");
    }


    // public function destroy($id)
    // {
    //     $this->db->table('tb_noppbb')->where(['id' => $id])->delete();
    // return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Dihapus");
    // }

    public function export()
    {
        $noppbb = $this->nopModel->withDeleted()->findAll();

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
        $sheet->getStyle('A1:G'.($column-1))->applyFromArray($styleArray);


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

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $fileUpload = $spreadsheet->getActiveSheet()->toArray();
            foreach ($fileUpload as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nop' => $value[1],
                    'tahun' => $value[2],
                    'nama' => $value[3],
                    'alamat' => $value[4],
                    'besaran_pbb' => (float)str_replace(',', '', $value[5]),
                    'denda' => (float)str_replace(',', '', $value[6]),
                ];
                $this->nopModel->insert($data);
            }
            return redirect()->back()->with('success', 'Data Berhasil Diimport');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }

    // public function filter()
    // {
    //     $selectedStatus = $this->request->getGet('filterStatus');
    
    //     if ($selectedStatus == '1') {
    //         $data['noppbb'] = $this->nopModel->where('status_bayar', '1')->findAll();
    //     } elseif ($selectedStatus == '0') {
    //         $data['noppbb'] = $this->nopModel->where('status_bayar', '0')->findAll();
    //     } else {
    //         $data['noppbb'] = $this->nopModel->findAll();
    //     }
    
    //     $data['selectedStatus'] = $selectedStatus ?? ''; // Initialize the variable
    
    //     return view('pbbView/daftarNopPbb/viewDaftarNopPbb', $data);
    // }


}
