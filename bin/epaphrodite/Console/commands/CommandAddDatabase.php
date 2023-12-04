<?php

namespace epaphrodite\epaphrodite\Console\commands;

use epaphrodite\epaphrodite\Console\Models\createNewDatabase;

class CommandAddDatabase extends createNewDatabase{

    protected static $defaultName = 'create:db';
}