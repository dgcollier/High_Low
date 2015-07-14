<?php

$play = 1;
$i = 0;
$best = 0;
$floor = 1;
$ceiling = 100;
$gameLength = 7;

if ($argc >= 3) {
    $floor = intval($argv[1]);
    $ceiling = intval($argv[2]);
    $gameLength = intval((($ceiling - $floor) / 10) + 1);
}

echo "Game Length: $gameLength turns." . PHP_EOL;

do {

    $rand = mt_rand($floor, $ceiling);
    // echo $rand . PHP_EOL;
    fwrite(STDOUT, "Guess a number between {$floor} and {$ceiling}:" . PHP_EOL);

    $userGuess = intval(fgets(STDIN));

    while ($userGuess) {
    
        if ($i == ($gameLength + 1)) {
            echo 'You ran out of turns.' . PHP_EOL;
            $userGuess = 0;
        } else if ($userGuess < $floor || $userGuess > $ceiling) {
            fwrite(STDOUT, "Keep it between {$floor} and {$ceiling}:" . PHP_EOL);
            $userGuess = intval(fgets(STDIN));
        } else if ($userGuess < $rand) {
            echo "HIGHER than {$userGuess}"  . PHP_EOL;
            fwrite(STDOUT, 'Guess again:' . PHP_EOL);
            $userGuess = intval(fgets(STDIN));
        } else if ($userGuess > $rand) {
            echo "LOWER than {$userGuess}" . PHP_EOL;
            fwrite(STDOUT, 'Guess again:' . PHP_EOL);
            $userGuess = intval(fgets(STDIN));
        } else if ($userGuess == $rand) {
            echo 'YOU WIN!!!' . PHP_EOL;
            $i++;

            if ($best == 0) {
                $best = $i;
                echo "You guessed right in {$i} turns!" . PHP_EOL;
            } else if ($best > $i) {
                $best = $i;
                echo "You set a new best score! You guessed right in {$i} turns!" . PHP_EOL;
            } else if ($best < $i) {
                echo "You guessed right in {$i} turns!" . PHP_EOL;
                echo "Your best score is still {$best}. Play again to beat it!" . PHP_EOL;
            } else {
                echo "You tied your best score of {$best} turns! Good job." . PHP_EOL;
            }

            $userGuess = 0;
        }

        $i++;
    }

    fwrite(STDOUT, 'Play again? Enter: "1" for Yes or "0" for No' . PHP_EOL);

    $playAgain = trim(fgets(STDIN));

    if ($playAgain == $play) {
        echo 'Awesome sauce!' . PHP_EOL;
        $i = 0;
    } else {
        echo "Lame. :(" . PHP_EOL;
        $play = 0;
    }
} while ($play);


?>