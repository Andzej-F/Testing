<?php

declare(strict_types=1);

class C
{
    public function returnTypeInt(): int
    {
        // Do something
        return 5;
    }

    public function returnTypeFloat(): float
    {
        // Do something
        return 5.7;
    }

    public function returnTypeArray(): array
    {
        // Do something

        return ['name' => 'Vardas'];
    }

    public function returnTypeBool(): bool
    {
        // Do something

        return TRUE;
    }

    // public function returnTypeDClass(): D
    // {
    //     // Do something
    //     // return 5;
    // }
}
