<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Braincrafted\Bundle\BootstrapBundle\BraincraftedBootstrapBundle(),
            new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Craue\FormFlowBundle\CraueFormFlowBundle(),
            new Claroline\MigrationBundle\ClarolineMigrationBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            
            new CanalTP\SamCoreBundle\CanalTPSamCoreBundle(),
            new CanalTP\SamCoreBridgeBundle\CanalTPSamCoreBridgeBundle(),
            new CanalTP\SamEcoreApplicationManagerBundle\CanalTPSamEcoreApplicationManagerBundle(),
            new CanalTP\SamEcoreUserManagerBundle\CanalTPSamEcoreUserManagerBundle(),
            new CanalTP\SamEcoreSecurityBundle\CanalTPSamEcoreSecurityBundle(),
            new CanalTP\SamMonitoringBundle\CanalTPSamMonitoringBundle(),
            new CanalTP\NmmPortalBridgeBundle\CanalTPNmmPortalBridgeBundle(),
            new CanalTP\NmmPortalBundle\CanalTPNmmPortalBundle(),
            new CanalTP\NavitiaProfilerBundle\NavitiaProfilerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
