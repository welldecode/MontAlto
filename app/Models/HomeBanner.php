<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo','subtitulo','imagem_path','descricao','beneficios',
        'botao_label','botao_url','bg_color','text_color','is_active'
    ];

    protected $casts = [
        'beneficios' => 'array',
        'is_active' => 'boolean',
    ];
}