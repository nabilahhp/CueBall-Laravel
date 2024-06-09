<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'meja'; // Ubah menjadi 'meja'

    /**
     * Kunci utama tabel.
     *
     * @var string
     */
    protected $primaryKey = 'idmeja';

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
    protected $keyType = 'int';
}
