<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code',
        'child_name',
        'Ayah_name',
        'Ibu_name',
        'registrasi',
        'birth_place',
        'birth_date',
        'address',
        'wilayah',
        'reference',
        'no_tlp',
        'khitan',
        'uang_bingkisan',
        'fothobooth',
        'khitan_received',
        'uang_bingkisan_received',
        'fothobooth_received',
        'is_distributed',
        'distributed_at',
        'keterangan'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'khitan_received',
        'uang_bingkisan_received',
        'fothobooth_received',
        'is_distributed' => 'boolean',
        'distributed_at' => 'datetime'
    ];

    public function isFullyDistributed()
    {
        return $this->uniform_received && $this->shoes_received && $this->bag_received;
    }

    public function getDistributionStatusAttribute()
    {
        if ($this->is_distributed) {
            return 'Sudah Menerima';
        }
        return 'Belum Menerima';
    }
}
