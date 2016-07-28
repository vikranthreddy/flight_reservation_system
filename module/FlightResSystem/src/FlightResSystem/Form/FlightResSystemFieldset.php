<?php
namespace FlightResSystem\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Form\Fieldset;
use FlightResSystem\Entity\Flight;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class FlightResSystemFieldset extends Fieldset implements InputFilterProviderInterface
{
protected $objectManager;
    
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('flight');
        $this->objectManager =$objectManager;
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $this->setObject(new Flight());
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        $this->add(array(
            'name' => 'departure',
            'type' => 'Text',
            'options' => array(
                'label' => 'Departure'
                
            )
        ));
        $this->add(array(
            'name' => 'arrival',
            'type' => 'Text',
            'options' => array(
                'label' => 'Arrival'
            )
        ));
        
        $this->add(array(
            'name' => 'aircraft',
            'type' => 'Text',
            'options' => array(
                'label' => 'Aircraft'
            )
        ));
        $this->add(array(
            'name' => 'airline',
            'type' => 'Text',
            'options' => array(
                'label' => 'Airline'
            )
        ));
        $this->add(array(
            'name' => 'flightnumber',
            'type' => 'Text',
            'options' => array(
                'label' => 'Flight Number'
            )
        ));
        $this->add(array(
            'name' => 'freeseats',
            'type' => 'Text',
            'options' => array(
                'label' => 'Free seats'
            )
        ));
        $this->add(array(
            'name' => 'price',
            'type' => 'Text',
            'options' => array(
                'label' => 'Price per passenger'
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\DateTime',
            'name' => 'departuretime',
            'options' => array(
                'label' => 'Deaparture Date & Time',
                'format' => 'Y-m-d\TH:i'
            ),
            'attributes' => array(
                'min' => '2010-01-01T00:00:00Z',
                'max' => '2020-01-01T00:00:00Z',
                'step' => '1'
            )
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\DateTime',
            'name' => 'arrivaltime',
            'options' => array(
                'label' => 'Arrival Date & Time',
                'format' => 'Y-m-d\TH:iP'
            ),
            'attributes' => array(
                'min' => '2010-01-01T00:00:00Z',
                'max' => '2020-01-01T00:00:00Z',
                'step' => '1'
            )
        ));
    }
 
    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false
            ),
            'airline' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    )
            ),
            'flightnumber' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('FlightResSystem\Entity\Flight'),
                            'fields' => 'flightnumber',
                            'messages' => array(
                                'objectFound' => 'Entry with same flight number exists...!'
                            ),
                        )
                    )
                )
                
            ),
            'aircraft' => array(
                'required' => true
            ),
            'departure' => array(
                'required' => true
            ),
            'arrival' => array(
                'required' => true
            ),
            'freeseats' => array(
                'required' => true
            ),
            'price' => array(
                'required' => true
            ),
            'departuretime' => array(
                'required' => true
            ),
            'arrivaltime' => array(
                'required' => true
            )
        );
    }
}
