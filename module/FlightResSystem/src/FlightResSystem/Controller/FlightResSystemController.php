<?php
namespace FlightResSystem\Controller;
use Doctrine\Common\Persistence\ObjectManager;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use FlightResSystem\Form\FlightResSystemForm;
use FlightResSystem\Entity\Flight;
use FlightResSystem\Form\FlightSearchForm;

class FlightResSystemController extends AbstractActionController
{
    protected $_objectManager;
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
    
        return $this->_objectManager;
    }
    
    public function indexAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
         $form = new FlightSearchForm($objectManager);
         return array('form' => $form);
          
    }
    public function searchAction()
    {
        
         return new ViewModel(array(
            'flights' => $this->getObjectManager()->getRepository('\FlightResSystem\Entity\Flight')->findAll(),
        ));
    }

    public function addAction()
    {
        $objectManager = $this->getObjectManager();
        
        $form = new FlightResSystemForm($objectManager);
    
        $form ->get('submit')->setValue('Add');
        $request =$this->getRequest();
        if($request->isPost()){
            $flight = new Flight();
            $form->bind($flight);
            $form->setData($request->getPost());

        if($form->isValid())
        {
         $objectManager->persist($flight);
         $objectManager->flush();
        }
        }
        return array('form'=> $form);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}