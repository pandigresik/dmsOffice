<?php

namespace App\Imports\Accounting;

use App\Models\Accounting\IfrsAccounts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;


class IfrsAccountImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\DataAccounting\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IfrsAccounts([
            'entity_id' => $row['entity_id'],
            'category_id' => $row['category_id'],
            'currency_id' => $row['currency_id'],
            'code' => $row['code'],
            'name' => $row['name'],
            'description' => $row['description']           
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
