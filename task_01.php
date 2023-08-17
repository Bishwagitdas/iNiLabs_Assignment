<?php

class Shape {
    protected $color;

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

$circle->setColor('Red');
$rectangle->setColor('Blue');

echo "Circle Area: " . $circle->calculateArea() . "\n";
echo "Rectangle Area: " . $rectangle->calculateArea() . "\n";
echo "Circle Color: " . $circle->getColor() . "\n";
echo "Rectangle Color: " . $rectangle->getColor() . "\n";

?>