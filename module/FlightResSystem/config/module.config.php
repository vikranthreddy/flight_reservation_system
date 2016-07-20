<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'FlightResSystem\Controller\FlightResSystem' => 'FlightResSystem\Controller\FlightResSystemController',
        ),
    ),   
    
    
    'doctrine' => array(
        'driver' => array(
            'flightressystem_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/FlightResSystem/Entity')
            ),
    
            'orm_default' => array(
                'drivers' => array(
                    'FlightResSystem\Entity' => 'flightressystem_entities'
                )
            ))),
    
    
    'router' => array(
        'routes' => array(
            'flightressystem' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/flightressystem[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'FlightResSystem\Controller\FlightResSystem',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'flight-res-system/flight-res-system/index' => __DIR__ . '/../view/flight-res-system/flight-res-system/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'flight-res-system' => __DIR__ . '/../view',
        ),
    ),
);