<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoPesertaModel extends Model
{
    protected $table      = 'info_peserta';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['instansi', 'startDate', 'endDate', 'pengantar', 'proposal', 'userId'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
