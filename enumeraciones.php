<?php
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }
    public function texto(): string
    {
        return match($this) {
            Suit::Hearts => "Corazones", Suit::Diamonds => 'Diamantes',
            Suit::Clubs => "Treboles", Suit::Spades => 'Picas',
        };
    }
}
$test = Suit::Hearts; 
echo $test->texto();
