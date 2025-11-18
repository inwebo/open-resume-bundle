<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class InweboOpenResumeBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition
            ->rootNode()
                ->children()
                    ->arrayNode('entities')
                        ->children()
                            ->scalarNode('award')->cannotBeEmpty()->end()
                            ->scalarNode('certificate')->cannotBeEmpty()->end()
                            ->scalarNode('education')->cannotBeEmpty()->end()
                            ->scalarNode('interest')->cannotBeEmpty()->end()
                            ->scalarNode('language')->cannotBeEmpty()->end()
                            ->scalarNode('location')->cannotBeEmpty()->end()
                            ->scalarNode('profile')->cannotBeEmpty()->end()
                            ->scalarNode('project')->cannotBeEmpty()->end()
                            ->scalarNode('publication')->cannotBeEmpty()->end()
                            ->scalarNode('reference')->cannotBeEmpty()->end()
                            ->scalarNode('skill')->cannotBeEmpty()->end()
                            ->scalarNode('volunteer')->cannotBeEmpty()->end()
                            ->scalarNode('work')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->extension('doctrine', [
            'orm' => [
                'mappings' => [
                    'OpenResumeBundle' => [
                        'is_bundle' => false,
                        'type' => 'attribute',
                        'dir' => '%kernel.project_dir%/vendor/inwebo/open-resume-bundle/src/Entity',
                        'prefix' => 'Inwebo\\OpenResumeBundle\\Entity',
                        'alias' => 'OpenResumeBundle',
                    ],
                ],
            ],
        ]);
    }
}
