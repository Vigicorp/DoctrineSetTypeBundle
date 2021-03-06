<?php

namespace Okapon\DoctrineSetTypeBundle\Tests\DependencyInjection;

use Okapon\DoctrineSetTypeBundle\DependencyInjection\OkaponDoctrineSetTypeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OkaponDoctrineSetTypeExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new OkaponDoctrineSetTypeExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition('doctrine_set_type.set_type_guesser'), 'SetTypeGuesser is loaded');
        $this->assertEquals('Okapon\DoctrineSetTypeBundle\DBAL\Types\AbstractSetType', $container->getParameter('doctrine_set_type.set_type.class_name'));
        $this->assertEquals('Okapon\DoctrineSetTypeBundle\Form\Guess\SetTypeGuesser', $container->getParameter('doctrine_set_type.set_type_guesser.class'));
    }
}