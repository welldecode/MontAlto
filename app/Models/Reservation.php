<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = [
        'name', 'rg', 'cpf', 'phone', 'address', 'email',
        'product_id', 'pickup_date', 'return_date'
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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}