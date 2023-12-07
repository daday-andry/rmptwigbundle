<?php
/**
 * @ Author: Daday ANDRY
 * @ Create Time: 2022-11-12 19:25:03
 * @ Modified by: Daday ANDRY
 * @ Modified time: 2023-12-07 18:08:10
 * @ Description:
 */

namespace DadayAndry\RpmTwigBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;


class RpmTwigExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader =new YamlFileLoader($container,new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');
    }
    
    public function getAlias(): string
    {
        return parent::getAlias();
    }
}
