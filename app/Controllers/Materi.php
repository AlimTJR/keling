<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\MateriModel;
use CodeIgniter\Controller;

class Materi extends Controller
{
    use ResponseTrait;
    protected $materiModel;
    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $data = $this->materiModel->findAll();
        $materi = [
            'status' => true,
            'materi' => $data
        ];
        return $this->respond($materi, 200);
    }

    public function show($id = null)
    {
        $data = $this->materiModel->getWhere(['id' => $id])->getResult();
        if ($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Data Tidak Ditemukan untuk id : '.$id);
        }
    }
}