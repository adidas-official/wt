<?php

namespace ContainerWxQN2KL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrineMigrations_GenerateCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'doctrine_migrations.generate_command' shared service.
     *
     * @return \Doctrine\Migrations\Tools\Console\Command\GenerateCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/src/Tools/Console/Command/DoctrineCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/src/Tools/Console/Command/GenerateCommand.php';

        $container->privates['doctrine_migrations.generate_command'] = $instance = new \Doctrine\Migrations\Tools\Console\Command\GenerateCommand(($container->privates['doctrine.migrations.dependency_factory'] ?? $container->load('getDoctrine_Migrations_DependencyFactoryService')), 'doctrine:migrations:generate');

        $instance->setName('doctrine:migrations:generate');
        $instance->setDescription('Generate a blank migration class.');

        return $instance;
    }
}
