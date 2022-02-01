<?php
class Dog
{
    private string $name;
    private string $sex;

    private ?string $motherName;
    private ?string $fatherName;

    public function __construct($name, $sex, $motherName = null, $fatherName = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->motherName = $motherName;
        $this->fatherName = $fatherName;
    }


    /**
     * @return mixed|string|null
     */
    public function getFatherName(): string
    {
       return $this->fatherName != null? $this->fatherName: "Unknown";

    }

    /**
     * @return mixed|string|null
     */
    public function getMotherName()
    {
        return $this->motherName;
    }
    public function HasSameMotherAs(Dog $dog):bool
    {
        return $this->motherName === $dog->getMotherName();
    }
}








