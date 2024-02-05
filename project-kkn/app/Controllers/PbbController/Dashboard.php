<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;
use App\Models\NOPModel;

class Dashboard extends BaseController
{

    public $pbbModel;
    public function __construct()
    {
        $this->pbbModel = new NOPModel();
    }

    public function index()
    { 

        $belumBayarCount = $this->pbbModel->where('status_bayar', '0')->countAllResults();
        $sudahBayarCount = $this->pbbModel->where('status_bayar', '1')->countAllResults();

        // Kirim data ke view
        $data = [
            'belumBayarCount' => $belumBayarCount,
            'sudahBayarCount' => $sudahBayarCount,
        ];

        // dd($data);

        $selectedStatus = $this->request->getGet('filterStatus');
    
        if ($selectedStatus == '1') {
            $data['noppbb'] = $this->pbbModel->withDeleted()->where('status_bayar', '1')->findAll();
        } elseif ($selectedStatus == '0') {
            $data['noppbb'] = $this->pbbModel->withDeleted()->where('status_bayar', '0')->findAll();
        } else {
            $data['noppbb'] = $this->pbbModel->withDeleted()->findAll();
        }
    
        $data['selectedStatus'] = $selectedStatus ?? ''; // Initialize the variable
    

        echo view('pbbView/lamanDashboard/dashboard',$data);
    }
}
