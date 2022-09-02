<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticlesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'product_name' => $row['product_name'] ?? null,
            'part_number' => $row['part_number'] ?? null,
            'articel_group_Id' => $row['articel_group_id'] ?? null,
            'prize' => $row['prize'] ?? null
        ]);
    }
}
