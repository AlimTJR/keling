<?php namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'materi';
	protected $useTimestamps = true;
    protected $allowedFields = ['judul','foto','materi','kategori'];

    public function search($keyword)
    {
        $builder = $this->table('materi');
        $builder->like('judul', $keyword);
        $builder->orLike('kategori', $keyword);
        $builder->orLike('materi', $keyword);
        return $builder;
        // return $this->table('materi')->like('judul', $keyword)
    }
}