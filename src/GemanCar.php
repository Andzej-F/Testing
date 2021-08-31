<?php

// declare(strict_types=1);

class GermanCar
{
    public $germanCarsArray = ['Volkswagen', 'BMW', 'Mercedes', 'Audi', 'Porsche'];

    public function checkCar($input): bool
    {
        if (in_array($input, $this->germanCarsArray)) {
            return TRUE;
        }

        throw new CarException($input . ' is not a German car');
    }
}
