<?php

namespace App\Imports;

use App\Models\Recipient;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecipientImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Recipient::create([
                'qr_code' => $row['qr_code'],
                'child_name' => $row['child_name'],
                'Ayah_name' => $row['ayah_name'],
                'Ibu_name' => $row['ibu_name'],
                'birth_place' => $row['birth_place'],
                'birth_date' => $row['birth_date'],
                'address' => $row['address'],
                'wilayah' => $row['wilayah'],
                'reference' => $row['reference'],
                'no_tlp' => $row['no_tlp'],
    
                'khitan_received' => filter_var($row['khitan_received'], FILTER_VALIDATE_BOOLEAN),
                'uang_bingkisan_received' => filter_var($row['uang_bingkisan_received'], FILTER_VALIDATE_BOOLEAN),
                'fothobooth_received' => filter_var($row['fothobooth_received'], FILTER_VALIDATE_BOOLEAN),
                'is_distributed' => filter_var($row['is_distributed'], FILTER_VALIDATE_BOOLEAN),
                'distributed_at' => $row['distributed_at'] ?: null,
            ]);
        }
    }
}
