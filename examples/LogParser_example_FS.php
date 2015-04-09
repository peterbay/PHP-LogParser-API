<?php

require ( 'LogParser_autoload.php' );

$parser = new \LogParser\LogParser();

$inputFormat = $parser->setInputFormat ( 'fs' );

$query = $parser->query ( 'SELECT Path, Name, Size, LastWriteTime  FROM ' . __DIR__ . '\*.* ORDER BY Size DESC' );

foreach ($query as $record)
{
    print_r ( $record ) . "\n";
}
