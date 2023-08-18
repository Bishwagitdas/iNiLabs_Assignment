<?php

class Employee {
    private $id;
    private $firstName;
    private $lastName;
    private $salary;

    public function __construct($id, $firstName, $lastName, $salary) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->setSalary($salary);
    }

    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function setSalary($salary) {
        
        if ($salary > 0) {
            $this->salary = $salary;
        }
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getAnnualSalary() {
        return $this->salary * 12;
    }

    public function increment($amount) {
        
        if ($amount > 0) {
            $this->salary += $amount;
        }
    }
}

$employee = new Employee(1, 'Bishwagit', 'Das', 20000);

echo "Employee ID: " . $employee->getId() . "\n";
echo "Employee Name: " . $employee->getFullName() . "\n";
echo "Monthly Salary: $" . $employee->getSalary() . "\n";
echo "Annual Salary: $" . $employee->getAnnualSalary() . "\n";

$employee->increment(10000);
echo "After Increment Monthly Salary is: $" . $employee->getSalary() . "\n";

?>