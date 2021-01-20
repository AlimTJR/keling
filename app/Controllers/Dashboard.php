<?php namespace App\Controllers;


use App\Models\MateriModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    protected $materiModel;
    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $materi = $this->materiModel->countAllResults();
        $data = [
        'title' => 'Dashboard',
        'materi'=> $materi
    ];
        return view('dashboard/index', $data);
    }

    public function materi()
    {

        $keyword = $this->request->getVar('cari');
        if($keyword){
            $materi = $this->materiModel->search($keyword);
        }else{
            $materi = $this->materiModel;
        }

        $data = [
            'title'     => 'Materi',
            'materi'    => $materi->paginate(10),
            'pager'     => $this->materiModel->pager
        ];
        return view('dashboard/materi', $data);
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
        return view('dashboard/detail', $data);
    }

    public function formtambah()
    {
        session();
        $data = [
            'title'      => 'Tambah Materi',
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/tambah', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'judul' => [
                'rules'  => 'required[materi.judul]',
                'errors' => [
                    'required' => 'Harus di isi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Harus di upload',
                    'max_size' => 'yang dipilih terlalu besar',
                    'is_image' => 'Silahkan pilih gambar yang benar',
                    'mime_in'  => 'Silahkan pilih gambar yang benar'
                ]
            ],
            'materi' => [
                'rules' => 'required[materi.materi]',
                'errors' => [
                    'required' => 'Harus di isi'
                ]
            ],
            'kategori' => [
                'rules' => 'required[materi.kategori]',
                'errors' => [
                    'required' => 'Harus di isi'
                ]
            ]
            ])){
            return redirect()->to('/dashboard/formtambah')->withInput();
            // $validation = \Config\Services::validation();
            // return redirect()->to('/dashboard/formtambah')->withInput()->with('validation', $validation);
        }

        $fileGambar = $this->request->getFile('foto');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('images', $namaGambar);

        $this->materiModel->save([
            'judul'    => $this->request->getVar('judul'),
            'foto'     => $namaGambar,
            'materi'   => $this->request->getVar('materi'),
            'kategori' => $this->request->getVar('kategori')
        ]);
        return redirect()->to('/dashboard/materi');
    }

    public function formedit($id)
    {
        $materi = $this->materiModel->where(['id'=>$id])->first();
        $data = [
            'title'     => 'Edit Materi',
            'materi'    => $materi
        ];
        return view('dashboard/edit', $data);
    }

    public function edit($id)
    {

        $fileGambar = $this->request->getFile('foto');
        //cek apakah foto berubah
        if ($fileGambar->getError() == 4){
            $namaFoto = $this->request->getVar('fotoLama');
        }else{
            $namaFoto = $fileGambar->getRandomName();
            //ambil foto baru
            $fileGambar->move('images', $namaFoto);
            //hapus foto lama
            unlink('images/'.$this->request->getVar('fotoLama'));

        }

        $this->materiModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'foto'      => $namaFoto,
            'materi'    => $this->request->getVar('materi'),
            'kategori'  => $this->request->getVar('kategori')
        ]);
        return redirect()->to('/dashboard/materi');
    }

    public function delete($id)
    {
        $materi = $this->materiModel->find($id);
        unlink('images/'.$materi['foto']);
        $this->materiModel->delete($id);
        return redirect()->to('/dashboard/materi');
    }
}