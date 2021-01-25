<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        helper(['form']);
        session();
        $data = [
            'title'      => 'Admin',
            'validation' => \Config\Services::validation()
        ];
        return view('login', $data);
    }

    public function auth()
    {
        if (!$this->validate([
                'username' => [
                    'rules'  => 'required[user.username]',
                    'errors' => [
                        'required' => 'Harus di isi'
                    ]
                ],
                'password' => [
                    'rules'  => 'required[user.passrowd]',
                    'errors' => [
                        'required' => 'Harus di isi'
                    ]
                ]
            ])){
            return redirect()->to('/login')->withInput();
        }

        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'        => $data['id'],
                    'nama'      => $data['nama'],
                    'username'  => $data['username'],
                    'loged_in'  => true
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', '<i>Username</i> tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}