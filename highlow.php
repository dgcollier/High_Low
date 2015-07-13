<?php

$rand = rand(1, 100);
    // echo $rand . PHP_EOL;

fwrite(STDOUT, 'Guess an integer between 1 and 100:');

$userGuess = fgets(STDIN);

// echo "You guessed {$userGuess}\n";

if ($userGuess < 1 || $userGuess > 100 || !is_int($userGuess)) {
    fwrite(STDOUT, "No, I said an integer between 1 and 100\n");
    $userGuess = fgets(STDIN);
}


?>