<?php
namespace FlightResSystem\Form;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
class FlightResSystemForm extends Form
{

    public function __construct( ObjectManager $objectManager)
    {
        parent::__construct('flight-res-system-form');
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $flightfieldset = new FlightResSystemFieldset($objectManager);
        $flightfieldset ->setUseAsBaseFieldset(true);
        $this->add($flightfieldset);
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submitbutton'
            )
           
        ));
        
    }
}