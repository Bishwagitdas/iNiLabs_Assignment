<?php

class Animal {
    public function makeSound() {
        
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow...";
    }
}

class Dog extends Animal {
    public function makeSound() {
         return "Bark...";
    }
}

function animalSounds($animal) {
    return $animal->makeSound();
}

$animals = [new Cat(), new Dog()];

foreach ($animals as $animal) {
    echo animalSounds($animal) . "\n";
}

?>