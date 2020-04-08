<?php

namespace DtlUser\View\Helper\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class MasterIdentityFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $service = new \DtlUser\View\Helper\MasterIdentity();
        $authService = $container->get(\Laminas\Authentication\AuthenticationService::class);
        $service->setAuth($authService);
        return $service;
    }

}
