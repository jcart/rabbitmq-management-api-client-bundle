<?php

namespace JC\RabbitmqManagementApiClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JCRabbitmqManagementApiClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config['clients'] as $id => $client) {
            $clientServiceId = sprintf('jc_rabbimq_management_api_client.%s', $id);

            $baseUrl = sprintf('%s://%s:%s', $client['secure'] ? 'https' : 'http', $client

            $container->register($clientServiceId, 'RabbitMq\ManagementApi\Client')
                ->addArgument(null)
                ->addArgument($baseUrl)
                ->addArgument($client['username'])
                ->addArgument($client['password']);
        }
    }
}