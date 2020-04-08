<?php

namespace DtlUser\Controller\Factory;

use Interop\Container\ContainerInterface;
use DtlUser\Controller\AuthController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use DtlUser\Service\AuthManager;
use DtlUser\Service\UserManager;

/**
 * This is the factory for AuthController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class AuthControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(\Laminas\Authentication\AuthenticationService::class);
        $userManager = $container->get(UserManager::class);

        return new AuthController($entityManager, $authManager, $authService, $userManager);
    }

}
