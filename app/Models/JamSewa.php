<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamSewa extends Model
{
    use HasFactory;
    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'jam_sewa';

    /**
     * Kunci utama tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indikasi apakah kunci utama adalah auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; // Sesuaikan dengan apakah kunci utama Anda auto-increment atau tidak

    /**
     * Tipe data kunci utama.
     *
     * @var string
     */
    protected $keyType = 'int'; // Sesuaikan dengan tipe data 'idmakanan', bisa 'int' atau 'string'

    public function sewa()
    {
    return $this->belongsTo(Sewa::class);
    }
}
