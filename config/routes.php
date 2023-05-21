<?php 
  
  use App\Controller\HelloController;
  use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;


  return function (RoutingConfigurator  $routes)
  {
    $routes->add('message', '/messages/{id<\d+>}')
           ->controller([HelloController::class, 'show']);
  };