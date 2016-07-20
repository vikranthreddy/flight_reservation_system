<?php 
namespace FlightResSystem\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flightsearch")
 */
class FlightSearch{
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
     * @ORM\Column(name="traveldate", type="datetime", length=255)
     */
    private $traveldate;
    /**
     * @ORM\Column(name="noofpassengers", type="integer")
     */
    private $noofpassengers;
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
     * @return the $traveldate
     */
    public function getTraveldate()
    {
        return $this->traveldate;
    }

    /**
     * @return the $noofpassengers
     */
    public function getNoofpassengers()
    {
        return $this->noofpassengers;
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
     * @param field_type $traveldate
     */
    public function setTraveldate($traveldate)
    {
        $this->traveldate = $traveldate;
    }

    /**
     * @param field_type $noofpassengers
     */
    public function setNoofpassengers($noofpassengers)
    {
        $this->noofpassengers = $noofpassengers;
    }

    
}