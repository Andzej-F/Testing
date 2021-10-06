<?php

class TheRealLogger implements Logger
{
    public function log(string $someMessage): void
    {
        // Stuff involving database, filesystem, vendors,...
    }
}
