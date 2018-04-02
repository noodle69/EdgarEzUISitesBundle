<?php

namespace Edgar\EzUISitesBundle;

use Edgar\EzUISitesBundle\DependencyInjection\Security\PolicyProvider\UISitesPolicyProvider;
use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\EzPublishCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EdgarEzUISitesBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        /** @var EzPublishCoreExtension $eZExtension */
        $eZExtension = $container->getExtension('ezpublish');
        $eZExtension->addPolicyProvider(new UISitesPolicyProvider($this->getPath()));
    }
}
