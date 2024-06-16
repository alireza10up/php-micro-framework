<?php

namespace App\Utils;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class Validators
{
    /**
     * Validates a location search request data.
     *
     * This method performs validation on a provided location search request data array. It
     * checks for the following:
     *
     * - `term`:
     *    - Required (NotBlank)
     *    - Minimum length of 3 characters (Length)
     *    - Only contains letters, numbers, spaces, Arabic characters, and percent symbol (Regex)
     * - `lat`:
     *    - Optional
     *    - Maximum length of 15 characters (Length)
     *    - If present, must be a valid floating-point number (Regex)
     * - `lng`:
     *    - Optional
     *     - Maximum length of 15 characters (Length)
     *    - If present, must be a valid floating-point number (Regex)
     *
     * The method returns an associative array containing validation errors for each invalid field.
     *
     * @param array $data The location search request data.
     * @return array An associative array containing validation errors for each invalid field, or an empty array if valid.
     */
    public static function validateLocation(array $data): array
    {
        $errors = [];

        $validator = Validation::createValidator();

        $violations = $validator->validate($data['term'] ?? '', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 3, 'max' => 128]),
            new Assert\Regex('/^[a-zA-Z0-9\s\p{Arabic}%20]+$/u'),
        ]);

        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $errors['term'][] = $violation->getMessage();
            }
        }

        $constraints = [
            new Assert\NotBlank(),
            new Assert\Range(['min' => -180, 'max' => 180]),
            new Assert\Length(['max' => 15]),
        ];

        $violations = $validator->validate($data['lat'] ?? '', $constraints);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $errors['lat'][] = $violation->getMessage();
            }
        }

        $violations = $validator->validate($data['lng'] ?? '', $constraints);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $errors['lng'][] = $violation->getMessage();
            }
        }


        return $errors;
    }
}
