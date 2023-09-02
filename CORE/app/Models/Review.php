<?php

namespace App\Models;

use CodeIgniter\Model;

class Review extends Model
{

    protected $table            = 'myu_client_review';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['client_id', 'profession', 'review', 'rate', 'review_date', 'update_date'];
    protected $useAutoIncrement = true;
    protected $skipValidation   = true;
    protected $useTimestamps    = false;


    public function all($find = [], $get = 'DATA' | 'LENGTH' | 'SUM')
    {

        $result = $this
            ->select("
                myu_client_review.id AS review_id,
                myu_client_review.client_id AS client_id,
                myu_client.name AS name,
                myu_client_review.profession AS profession,
                myu_client_review.review AS review,
                myu_client_review.rate AS rate,
                myu_client_review.review_date AS review_date,
                myu_client_review.update_date AS update_date
            ")
            ->join('myu_client', 'myu_client.id = myu_client_review.client_id', 'LEFT');

        // Filter by client_id
        if (isset($find['client_id'])) {

            if (!is_array($find['client_id'])) $find['client_id'] = [$find['client_id']];

            $result = $this->like("myu_client_review.client_id", $find['client_id']);
        }

        // Filter by name
        if (isset($find['name'])) {

            if (!is_array($find['name'])) $find['name'] = [$find['name']];

            $result = $this->like("myu_client_review.name", $find['name']);
        }

        // Filter by review_date
        if (isset($find['review_date'])) {

            if (!is_array($find['review_date'])) $find['review_date'] = [$find['review_date']];

            $result = $this->like("myu_client_review.review_date", $find['review_date']);
        }

        // Limit search
        if (isset($find['limit'])) {

            if (count($find['limit']) < 2) $find['limit'][1] = 0;

            $result = $this->limit($find['limit'][0], $find['limit'][1]);
        }

        switch ($get) {
            case 'SUM':
                $result = $this->select("SUM(myu_client_review.id) as sum_row")
                    ->first();

                if ($result == null) return 0;
                return $result['sum_row'];
                break;
            case 'COUNT':
                $result = $this->select("COUNT(myu_client_review.id) as length_row")
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
                myu_client_review.id AS review_id,
                myu_client_review.client_id AS client_id,
                myu_client.name AS name,
                myu_client_review.profession AS profession,
                myu_client_review.review AS review,
                myu_client_review.rate AS rate,
                myu_client_review.review_date AS review_date,
                myu_client_review.update_date AS update_date
            ")
            ->join('myu_client', 'myu_client.id = myu_client_review.client_id', 'LEFT');

        // Find by id
        if (isset($identifier['id'])) {

            $result = $this->where("myu_client_review.id", $identifier['id']);
        }

        $result = $this->get()->getResultArray();

        if ($result != null) {

            // Parse the column that has JSON value
            $result = $result[0];
        }

        return $result;
    }
}
