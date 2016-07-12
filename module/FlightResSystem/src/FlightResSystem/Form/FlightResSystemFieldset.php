<?php
namespace FlightResSystem\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\InputFilter\InputFilter;
use Zend\Form\Fieldset;
use FlightResSystem\Entity\Flight;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class FlightResSystemFieldset extends Fieldset implements InputFilterProviderInterface
{

    protected $inputFilter;

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('flight');
        
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $this->setObject(new Flight());
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        $this->add(array(
            'name' => 'origin',
            'type' => 'Text',
            'options' => array(
                'label' => 'Origin'
            )
        ));
        $this->add(array(
            'name' => 'destination',
            'type' => 'Text',
            'options' => array(
                'label' => 'Destination'
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
            'name' => 'airlines',
            'type' => 'Text',
            'options' => array(
                'label' => 'Airlines'
            )
        ));
        $this->add(array(
            'name' => 'flightno',
            'type' => 'Text',
            'options' => array(
                'label' => 'Flight Number'
            )
        ));
        $this->add(array(
            'name' => 'passengerno',
            'type' => 'Text',
            'options' => array(
                'label' => 'No of Passengers'
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
            'name' => 'departure',
            'type' => 'Text',
            'options' => array(
                'label' => 'Departure Time'
            )
        ));
        $this->add(array(
            'name' => 'arrival',
            'type' => 'Text',
            'options' => array(
                'label' => 'Arrival Time'
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\DateTimeLocal',
            'name' => 'traveldate',
            'options' => array(
                'label' => 'Date of travel',
                'format' => 'Y-m-d\TH:i'
            ),
            'attributes' => array(
                'min' => '2010-01-01T00:00:00Z',
                'max' => '2020-01-01T00:00:00Z',
                'step' => '1'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\DateTimeLocal',
            'name' => 'departure',
            'options' => array(
                'label' => 'Deaparture',
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
            'name' => 'arrival',
            'options' => array(
                'label' => 'Arrival',
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
            'origin' => array(
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array('name' => 'NotEmpty')
                )
              
            ),
            'destination' => array(
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array('name' => 'NotEmpty')
                )
               
            )
      
        );
    }
}
