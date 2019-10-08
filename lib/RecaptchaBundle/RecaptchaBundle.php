<?php
namespace Alex\RecaptchaBundle;

use Alex\RecaptchaBundle\RecaptchaCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecaptchaBundle extends Bundle {

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RecaptchaCompilerPass());
    }

}
