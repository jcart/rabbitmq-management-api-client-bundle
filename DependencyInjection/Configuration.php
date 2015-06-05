<?php

namespace JC\RabbitmqManagementApiClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jc_rabbitmq_management_api_client');

        $rootNode
            ->children()
                ->arrayNode('clients')
                    ->defaultValue([
                        'secure' => false,
                        'host' => 'localhost',
                        'port' => 15672,
                        'username' => 'guest',
                        'password' => 'guest'
                    ])
                    ->requiresAtLeastOneElement()
                    ->prototype('array')
                        ->children()
                            ->booleanNode('secure')
                                ->defaultFalse()
                            ->end()            
                            ->scalarNode('host')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('port')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()                
                            ->scalarNode('username')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('password')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()                                
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}


