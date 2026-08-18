<?php

namespace App\Support;

class Sanitizer
{
    /**
     * Assainit une chaîne de texte libre contre les failles XSS et balises script.
     */
    public static function clean(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        // Supprime les balises HTML et JavaScript dangereuses
        $clean = strip_tags($value);
        
        // Convertit les caractères spéciaux HTML
        return trim(e($clean));
    }

    /**
     * Assainit récursivement un tableau de données reçues d'un formulaire.
     */
    public static function cleanArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = self::clean($value);
            } elseif (is_array($value)) {
                $data[$key] = self::cleanArray($value);
            }
        }
        return $data;
    }
}
