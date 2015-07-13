<?php

$play = 1;
$i = 0;
$best = 0;

$floor = (intval($argv[1]));
$ceiling = (intval($argv[2]));

do {

    $rand = rand($floor, $ceiling);
    fwrite(STDOUT, "Guess a number between {$floor} and {$ceiling}:" . PHP_EOL);

    $userGuess = intval(fgets(STDIN));

    while ($i <= 7 && $userGuess) {

        $i++;
        
        if ($userGuess < $floor || $userGuess > $ceiling) {
            fwrite(STDOUT, "Keep it between {$floor} and {$ceiling}:\n");
            $userGuess = intval(fgets(STDIN));
        }

        if ($userGuess < $rand) {
            echo "HIGHER than {$userGuess}"  . PHP_EOL;
            fwrite(STDOUT, 'Guess again:' . PHP_EOL);
            $userGuess = intval(fgets(STDIN));
        } else if ($userGuess > $rand) {
            echo "LOWER than {$userGuess}" . PHP_EOL;
            fwrite(STDOUT, 'Guess again:' . PHP_EOL);
            $userGuess = intval(fgets(STDIN));
        } else if ($userGuess == $rand) {
            echo 'You win!!!' . PHP_EOL;

            if ($best == 0) {
                $best = $i;
                echo "You guessed right in {$i} turns!\n";
            } else if ($best > $i) {
                $best = $i;
                echo "You set a new best score! You guessed right in {$i} turns!\n";
            } else if ($best < $i) {
                echo "You guessed right in {$i} turns!\n";
                echo "Your best score is still {$best}. Play again to beat it!\n";
            } else {
                "You tied your best score of {$best} turns! Good job.\n";
            }

            $userGuess = 0;
        } else if ($i == 7) {
            echo 'You ran out of turns.';
            $userGuess = 0;
        }
    }

    fwrite(STDOUT, 'Play again? Enter: "1" for Yes or "0" for No' . PHP_EOL);

    $playAgain = fgets(STDIN);

    if ($playAgain == $play) {
        echo 'Awesome sauce!' . PHP_EOL;
        $i = 0;
    } else {
        echo 'Too bad.' . PHP_EOL;
        $play = 0;
    }
} while ($play);


?>