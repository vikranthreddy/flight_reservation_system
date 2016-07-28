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
use FlightResSystem\Entity\FlightSearch;

class FlightSearchFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('flight-search');
        
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $this->setObject(new FlightSearch());
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
        $this->add([
            'type' => 'Zend\Form\Element\Date',
            'name' => 'traveldate',
            'options' => [
                'label' => 'Travel Date',
                'format' => 'Y-m-d'
            ],
            'attributes' => [
                'min' => '2010-01-01',
                'max' => '2020-01-01',
                'step' => '1'
            ] // minutes; default step interval is 1 min

        ]);
        $this->add(array(
            'name' => 'noofpassengers',
            'type' => 'Text',
            'options' => array(
                'label' => 'No of passengers'
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false
            ),
            
            'origin' => array(
                'required' => true
            ),
            'destination' => array(
                'required' => true
            ),
            'traveldate' => array(
                'required' => true
            ),
            'noofpassengers' => array(
                'required' => true
            )
        );
    }
}