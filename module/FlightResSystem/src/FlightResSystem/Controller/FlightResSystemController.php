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
        if (! $this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        
        return $this->_objectManager;
    }

    public function indexAction()
    {
         return new ViewModel(array(
            'flights' => $this->getObjectManager()->getRepository('FlightResSystem\Entity\Flight')->findAll(),
        )
        );
    }

    public function searchAction()
    {
        $em = $this->getObjectManager();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $querybuilder = $em->createQueryBuilder();
            $querybuilder->select('flug')
                        ->from('FlightResSystem\Entity\Flight', 'flug')
                        ->where('flug.arrival = munich');
            
            $result = $querybuilder->getQuery()->getResult();
        }
        
        return $this->redirect()->toRoute('flightressystem', array(
            'action' => 'index'
        ));
    }

    public function addAction()
    {
        $objectManager = $this->getObjectManager();
        
        $form = new FlightResSystemForm($objectManager);
        
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $flight = new Flight();
            $form->bind($flight);
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $objectManager->persist($flight);
                $objectManager->flush();
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()
            ->getRouteMatch()
            ->getParam('id');
        if (! $id) {
            return $this->redirect()->toRoute('flightressystem', array(
                'action' => 'add'
            ));
        }
        $objectManager = $this->getObjectManager();
        
        $flight = $objectManager->find('FlightResSystem\Entity\Flight', $id);
        
        $form = new FlightResSystemForm($objectManager);
        $form->setBindOnValidate(false);
        $form->bind($flight);
        $form->get('submit')->setValue('Edit');
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $objectManager->persist($flight);
                $objectManager->flush();
                return $this->redirect()->toRoute('flightressystem', array(
                    'controller' => 'flightressystem'
                ));
            }
        }
        return array(
            'id' => $id,
            'form' => $form
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->getEvent()
            ->getRouteMatch()
            ->getParam('id');
        if (! $id) {
            return $this->redirect()->toRoute('FlightResSystem', array(
                'controller' => 'flightressystem'
            ));
        }
        $objectManager = $this->getObjectManager();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');
                $flight = $objectManager->find('FlightResSystem\Entity\Flight', $id);
                if ($flight) {
                    $objectManager->remove($flight);
                    $objectManager->flush();
                }
            }
            
            // Redirect to list of Flights
            return $this->redirect()->toRoute('flightressystem', array(
                'controller' => 'flightressystem'
            ));
        }
        return array(
            'id' => $id,
            'flightressystem' => $objectManager->find('FlightResSystem\Entity\Flight', $id)
        );
    }
}