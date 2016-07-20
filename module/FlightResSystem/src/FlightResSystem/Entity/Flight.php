<?php
namespace FlightResSystem\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flightdata")
 */
class Flight{
    /**
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
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
     * @ORM\Column(name="departure", type="string", length=255)
     */
    private $departure;
    /**
     * @ORM\Column(name="arrival", type="string", length=255)
     */
    private $arrival;
    /**
     * @ORM\Column(name="freeseats", type="integer")
     */
    private $freeseats;
    /**
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    /**
     * @ORM\Column(name="departuretime", type="datetime")
     */
    private $departuretime;
    /**
     * @ORM\Column(name="arrivaltime", type="datetime")
     */
    private $arrivaltime;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
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
     * @return the $departuretime
     */
    public function getDeparturetime()
    {
        return $this->departuretime;
    }

    /**
     * @return the $arrivaltime
     */
    public function getArrivaltime()
    {
        return $this->arrivaltime;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @param field_type $departuretime
     */
    public function setDeparturetime($departuretime)
    {
        $this->departuretime = $departuretime;
    }

    /**
     * @param field_type $arrivaltime
     */
    public function setArrivaltime($arrivaltime)
    {
        $this->arrivaltime = $arrivaltime;
    }

}
