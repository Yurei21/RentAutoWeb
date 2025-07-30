<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentsFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'document_type', 'document_path', 'upload_date'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
