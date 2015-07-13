<?php

$rand = rand(1, 100);
    // echo $rand . PHP_EOL;

fwrite(STDOUT, 'Guess a number between 1 and 100:');

$userGuess = fgets(STDIN);

// echo "You guessed {$userGuess}\n";


?>