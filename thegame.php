<?php

$ch = array(1 => 'F', 2 => 'C', 3 => 'P');

function checkAnswer(string $answerComputer, string $character): void
{
    global $counting;
    if ($answerComputer != $character) {
        $counting['computer']++;
    } else {
        $counting['human']++;
    }
}

do {
    $playerName = readline("What is your name?: ");

    do {
        $counting = array('computer' => 0, 'human' => 0);

        do {
            do {
                $answerHuman = readline("Pierre feuille ciseau? (P, F ou C) ");
            } while ($answerHuman !== 'F' && $answerHuman !== 'C' && $answerHuman !== 'P');

            $answerComputer = $ch[array_rand($ch)];

            echo 'Computer\'s answer: ' . match($answerComputer) {
                'P' => "Pierre\n",
                'F' => "Feuille\n",
                'C' => "Ciseau\n",
            };

            if ($answerComputer != $answerHuman) {
                match($answerHuman) {
                    $ch[1] => checkAnswer($answerComputer, $ch[3]),
                    $ch[2] => checkAnswer($answerComputer, $ch[1]),
                    $ch[3] => checkAnswer($answerComputer, $ch[2]),
                };
            }

            echo "Computer {$counting['computer']}:{$counting['human']} $playerName\n";

        } while ($counting['computer'] < 3 && $counting['human'] < 3);

        if ($counting['computer'] >= 3) {
            echo "Computer win\n";
        } else {
            echo "$playerName win\n";
        }

        $replay = readline("Replay? (Y): ");

    } while ("Y" === $replay);

} while ($playerName == '');
