<?php namespace App\Controllers;


use App\Models\MateriModel;
use CodeIgniter\Controller;

class Lihatmateri extends Controller
{
    protected $materiModel;
    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('cari');
        if($keyword){
            $materi = $this->materiModel->search($keyword);
        }else{
            $materi = $this->materiModel;
        }

        $data = [
            'title'     => 'Materi',
            'materi'    => $materi->paginate(5),
            'pager'     => $this->materiModel->pager
        ];
        return view('Lihatmateri/listmateri', $data);
    }

    public function detail($id)
    {
        $materi = $this->materiModel->where(['id'=>$id])->first();
        $data = [
            'materi' => $materi,
            'title'  => 'Detail Materi'
        ];
        if(empty($data['materi'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($id.' Tidak Ditemukan');
            
        }
        return view('Lihatmateri/detailmateri', $data);
    }
}