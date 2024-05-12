<?php 

namespace App\Enums;
 
enum CategoryEnum: string
{
    
    case STANDART = 'standart';
    case SPECIAL = 'special';
 
    public function toString(): ?string
    {
        return match ($this) {
            self::STANDART => 'Обычная категория',
            self::SPECIAL => 'Спец категория',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::STANDART => 'warning',
            self::SPECIAL => 'success',
        };
    }
}