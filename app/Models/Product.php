<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'features',
        'status',
        'images'
    ];

    protected $casts = [
        'price' => 'array',
        'features' => 'array',
        'images' => 'array', // se você quer salvar várias imagens
    ];

    public function getFormattedValue(string $column)
    {
        $value = $this->{$column};

        switch ($column) {
            case 'price':
                if (is_array($value)) {
                    // Exemplo: "Diária: 200 | Semanal: 1000"
                    return collect($value)
                        ->map(fn($v, $k) => "$k: R$ " . number_format((float)$v, 2, ',', '.'))
                        ->implode(' | ');
                }
                return $value;

            case 'features':
                if (is_array($value)) {
                    // Exemplo: "Tipo: Gasolina | Espaço: 7 Pessoas | Status: Ativo"
                    return collect($value)
                        ->map(fn($v, $k) => ucfirst($k) . ': ' . $v)
                        ->implode(' | ');
                }
                return $value;

            default:
                return $value;
        }
    }

    public function scopeMostViewed($query, $limit = 6)
    {
        return $query->orderByDesc('views')->take($limit);
    }

public function getMainImageAttribute()
{
    if (!empty($this->images[0])) {
        return Storage::url($this->images[0]); // gera URL completa
    }

    return asset('images/no-image.jpg');
}

    public function getMensalPriceAttribute()
    {
        return $this->price['Mensal'] ?? null;
    }

    public function getDiariaPriceAttribute()
    {
        return $this->price['Diária'] ?? null;
    }

    public function getTipoAttribute()
    {
        return $this->features['tipo'] ?? null;
    }

    public function getEspacoAttribute()
    {
        return $this->features['espaco'] ?? null;
    }

    public function getTransmissaoAttribute()
    {
        return $this->features['categoria'] ?? null;
    }
}
