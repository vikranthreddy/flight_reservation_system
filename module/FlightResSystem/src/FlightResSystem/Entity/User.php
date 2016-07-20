<?php
namespace FlightResSystem\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User{
    /**
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;
    /**
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;
    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * @ORM\Column(name="datetime", type="string", length=255)
     */
    private $dateoftravel;
    /**
     * @ORM\Column(name="origin", type="string", length=255)
     */
    private $origin;
    /**
     * @ORM\Column(name="destination", type="string", length=255)
     */
    private $destination;
    /**
     * @ORM\Column(name="noofpassenger", type="integer")
     */
    private $noofpassenger;
    /**
     * @ORM\Column(name="priceperperson", type="integer")
     */
    private $priceperperson;
    /**
     * @ORM\Column(name="totalprice", type="integer")
     */
    private $totalprice;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $fullname
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @return the $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return the $dateoftravel
     */
    public function getDateoftravel()
    {
        return $this->dateoftravel;
    }

    /**
     * @return the $origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @return the $destination
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return the $noofpassenger
     */
    public function getNoofpassenger()
    {
        return $this->noofpassenger;
    }

    /**
     * @return the $priceperperson
     */
    public function getPriceperperson()
    {
        return $this->priceperperson;
    }

    /**
     * @return the $totalprice
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @param field_type $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param field_type $dateoftravel
     */
    public function setDateoftravel($dateoftravel)
    {
        $this->dateoftravel = $dateoftravel;
    }

    /**
     * @param field_type $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @param field_type $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @param field_type $noofpassenger
     */
    public function setNoofpassenger($noofpassenger)
    {
        $this->noofpassenger = $noofpassenger;
    }

    /**
     * @param field_type $priceperperson
     */
    public function setPriceperperson($priceperperson)
    {
        $this->priceperperson = $priceperperson;
    }

    /**
     * @param field_type $totalprice
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;
    }

    
    
}