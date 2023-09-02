<?php

namespace App\Models;

use CodeIgniter\Model;

class Portofolio extends Model
{

    protected $table            = 'myu_portofolio';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'description', 'image_path', 'url'];
    protected $useAutoIncrement = true;
    protected $skipValidation   = true;
    protected $useTimestamps    = false;


    public function all($find = [], $get = 'DATA' | 'LENGTH' | 'SUM')
    {

        $result = $this
            ->select("
                myu_portofolio.id AS portofolio_id,
                myu_portofolio.name AS portofolio_name,
                myu_portofolio.description AS description,
                myu_portofolio.image_path AS image_path,
                myu_portofolio.url AS url
            ");

        // Filter by name
        if (isset($find['name'])) {

            if (!is_array($find['name'])) $find['name'] = [$find['name']];

            $result = $this->like("myu_portofolio.name", $find['name']);
        }

        // Limit search
        if (isset($find['limit'])) {

            if (count($find['limit']) < 2) $find['limit'][1] = 0;

            $result = $this->limit($find['limit'][0], $find['limit'][1]);
        }

        switch ($get) {
            case 'SUM':
                $result = $this->select("SUM(myu_portofolio.id) as sum_row")
                    ->first();

                if ($result == null) return 0;
                return $result['sum_row'];
                break;
            case 'COUNT':
                $result = $this->select("COUNT(myu_portofolio.id) as length_row")
                    ->first();

                if ($result == null) return 0;
                return $result['length_row'];
                break;
        }

        $result = $this->find();

        if ($result == null) return null;

        // Parse the column that has JSON value
        foreach ($result as $key => $value) {

            $result[$key] = $value;
        }

        return $result;
    }

    public function data($identifier = [])
    {

        $result = $this
            ->select("
                myu_portofolio.id AS portofolio_id,
                myu_portofolio.name AS portofolio_name,
                myu_portofolio.description AS description,
                myu_portofolio.image_path AS image_path,
                myu_portofolio.url AS url
            ");

        // Find by id
        if (isset($identifier['id'])) {

            $result = $this->where("myu_portofolio.id", $identifier['id']);
        }

        $result = $this->get()->getResultArray();

        if ($result != null) {

            // Parse the column that has JSON value
            $result = $result[0];
        }

        return $result;
    }
}
