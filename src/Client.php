<?php

// namespace Nawarian\ArchiveOrg;

class Client
{
    public function fetchMetadata(string $identifier): object
    {
        return new class
        {
            public function identifier():string{|
            return 'nawarian-test';
            }
        };
    }
}
