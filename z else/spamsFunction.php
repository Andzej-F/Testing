<?php
function provideSpams(): array
{
    $spamStrings = [
        'one' => 'Riley was named NBA Coach of the Year three times',
        'two' => 'He is the first North American sports figure to win a championship as a player, as an assistant coach, as a head coach, and as an executive, and in various roles has reached the NBA finals in six different decades',
        'three' => ' In 1996, he was named one of the 10 Greatest Coaches in NBA history.'
    ];

    $result = [];
    foreach ($spamStrings as $spamString) {
        $result[mb_substr($spamString, 0, 10)] = [$spamString];
    }

    return $result;
}

echo '<pre>';
print_r(provideSpams());
