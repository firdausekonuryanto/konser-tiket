<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketOrder extends Model
{
    // Tambahkan user_id ke dalam fillable
    protected $fillable = [
        'user_id',
        'concert_id',
        'nama_pemesan',
        'email',
        'jumlah_tiket',
        'total_harga'
    ];

    // Relasi ke tabel concerts
    public function concert(): BelongsTo
    {
        return $this->belongsTo(Concert::class);
    }

    // Relasi ke ticket_details
    public function details(): HasMany
    {
        return $this->hasMany(TicketDetail::class);
    }

    // ✅ Relasi ke user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
