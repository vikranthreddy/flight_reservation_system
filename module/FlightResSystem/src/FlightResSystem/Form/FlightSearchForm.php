<?php
namespace FlightResSystem\Form;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
class FlightSearchForm extends Form
{

    public function __construct( ObjectManager $objectManager)
    {
        parent::__construct('flight-search-form');
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $flightsearchfieldset = new FlightSearchFieldset($objectManager);
        $flightsearchfieldset ->setUseAsBaseFieldset(true);
        $this->add($flightsearchfieldset);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Search',
                'id' => 'submitbutton'
            )
        ));
    }
}