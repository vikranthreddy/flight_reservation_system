<?php
namespace FlightResSystem\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flightdata")
 */
class Flight{
        protected $inputFilter;
    /**
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="origin", type="string", length=255) 
     */
    private $origin;
    /**
     * @ORM\Column(name="destination", type="string", length=255)
     */
    private $destination;
    /**
     * @ORM\Column(name="airline", type="string", length=255)
     */
    private $airline;
    /**
     * @ORM\Column(name="flightnumber", type="string", length=255)
     */
    private $flightnumber;
    /**
     * @ORM\Column(name="aircraft", type="string", length=255)
     */
    private $aircraft;
    /**
     * @ORM\Column(name="freeseats", type="integer")
     */
    private $freeseats;
    /**
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    /**
     * @ORM\Column(name="departure", type="datetime")
     */
    private $departure;
    /**
     * @ORM\Column(name="arrival", type="datetime")
     */
    private $arrival;
    
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
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
     * @return the $airline
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @return the $flightnumber
     */
    public function getFlightnumber()
    {
        return $this->flightnumber;
    }

    /**
     * @return the $aircraft
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @return the $freeseats
     */
    public function getFreeseats()
    {
        return $this->freeseats;
    }

    /**
     * @return the $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return the $departure
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return the $arrival
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @param field_type $airline
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;
    }

    /**
     * @param field_type $flightnumber
     */
    public function setFlightnumber($flightnumber)
    {
        $this->flightnumber = $flightnumber;
    }

    /**
     * @param field_type $aircraft
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;
    }

    /**
     * @param field_type $freeseats
     */
    public function setFreeseats($freeseats)
    {
        $this->freeseats = $freeseats;
    }

    /**
     * @param field_type $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param field_type $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * @param field_type $arrival
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }

}