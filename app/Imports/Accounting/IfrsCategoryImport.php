<?php

namespace App\Imports\Accounting;

use App\Models\Accounting\IfrsCategories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;


class IfrsCategoryImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\DataAccounting\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IfrsCategories([
            'entity_id' => $row['entity_id'],
            'category_type' => $row['category_type'],
            'name' => $row['name']            
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
