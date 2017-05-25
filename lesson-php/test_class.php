<?php

class Character {
    public static $type = '';
    
    public $hp = 1;
    public $power = 1;
    
    function __construct($type, $hp, $power) {
        $this->type = $type;
        $this->hp = $hp;
        $this->power = $power;
    }
    
    function name() {
        return $this::type;
    }
    
    function attack($character) {
        $character->hp = $character->hp - $this->power;
        print $this->name() . 'が' . $character->name() . 'を攻撃して' . $this->power . 'ポイントのダメージを与えた！' . PHP_EOL;
        
        if ($character->hp <= 0) {
            $this->defeat($character);
        }
    }

    function defeat($character) {
        print $this->name() . 'は' . $character->name() . 'を倒した！' . PHP_EOL;
    }
}

class Slime extends Character {
    
    public static $type = 'スライム';
    
    public $suffix = '';
    
    function __construct($suffix) {
        parent::__construct(10, 3);
        $this->suffix = $suffix;
    }
    
    function name() {
        return parent::name() . $this->suffix;
    }
    
    static function description() {
        print self::$type . 'は、最弱のモンスターだ！' . PHP_EOL;
    }
}


class Hero extends Character {
    
    public static $type = '主人公';
    
    function __construct() {
        parent::__construct(1000, 30);
    }
    
    static function description() {
        print self::$type . 'は、この世界を守る勇者だ！' . PHP_EOL;
    }
}

$hero = new Hero();
$slime_A = new Slime('A');

$slime_A->attack($hero);
$hero->attack($slime_A);

Hero::description();
Slime::description();

