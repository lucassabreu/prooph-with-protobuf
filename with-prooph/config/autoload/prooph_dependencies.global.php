<?php

declare(strict_types=1);

use Prooph\EventStore;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * The services configuration is used to set up a Zend\ServiceManager
 * which is used as Inversion of Controller container in our application
 * Please refer to the official documentation:
 * http://framework.zend.com/manual/current/en/modules/zend.service-manager.html
 */
return [
    'dependencies' => [
        'invokables' => [
            \Prooph\ServiceBus\Plugin\InvokeStrategy\OnEventStrategy::class => \Prooph\ServiceBus\Plugin\InvokeStrategy\OnEventStrategy::class,
            \Prooph\Common\Messaging\NoOpMessageConverter::class => \Prooph\Common\Messaging\NoOpMessageConverter::class,
            \Prooph\Common\Messaging\FQCNMessageFactory::class => \Prooph\Common\Messaging\FQCNMessageFactory::class,
            \Prooph\ProophessorDo\Response\JsonResponse::class => \Prooph\ProophessorDo\Response\JsonResponse::class,
        ],
        'factories' => [
            // prooph/psr7-middleware set up
            \Prooph\Psr7Middleware\CommandMiddleware::class => \Prooph\Psr7Middleware\Container\CommandMiddlewareFactory::class,
            \Prooph\Psr7Middleware\EventMiddleware::class => \Prooph\Psr7Middleware\Container\EventMiddlewareFactory::class,
            \Prooph\Psr7Middleware\QueryMiddleware::class => \Prooph\Psr7Middleware\Container\QueryMiddlewareFactory::class,
            \Prooph\Psr7Middleware\MessageMiddleware::class => \Prooph\Psr7Middleware\Container\MessageMiddlewareFactory::class,
            //prooph/service-bus set up
            \Prooph\ServiceBus\CommandBus::class => \Prooph\ServiceBus\Container\CommandBusFactory::class,
            \Prooph\ServiceBus\EventBus::class => \Prooph\ServiceBus\Container\EventBusFactory::class,
            \Prooph\ServiceBus\QueryBus::class => \Prooph\ServiceBus\Container\QueryBusFactory::class,
            //prooph/event-store-bus-bridge set up
            \Prooph\EventStoreBusBridge\TransactionManager::class => \Prooph\EventStoreBusBridge\Container\TransactionManagerFactory::class,
            \Prooph\EventStoreBusBridge\EventPublisher::class => \Prooph\EventStoreBusBridge\Container\EventPublisherFactory::class,
            \Prooph\Cli\Console\Helper\ClassInfo::class => \Prooph\ProophessorDo\Container\Console\Psr4ClassInfoFactory::class,
		],
		'aliases' => [
			'command_bus' => \Prooph\ServiceBus\CommandBus::class,
		]
	],
];
