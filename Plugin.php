<?php

namespace Kanboard\Plugin\SynologySSOAuth;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\AuthenticationManager;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;
use Kanboard\Event\AuthSuccessEvent

/**
 * Synology Chat Plugin
 *
 * @package  Synology SSO Auth
 * @author   Paul Sweeney
 */
class Plugin extends Base
{
    public function initialize()
    {
        $this->dispatcher->addListener(AuthenticationManager::EVENT_SUCCESS, array($this, 'onLoginSuccess'));

        $this->authenticationManager->register(new SynologySSOAuthProvider($this->container));
//        $this->applicationAccessMap->add('OAuthController', 'handler', Role::APP_PUBLIC);


        $this->template->hook->attach('template:auth:login-form:after', 'SynologySSOAuth:auth/login');
        $this->template->hook->attach('template:config:integrations', 'SynologySSOAuth:config/integration');
        $this->template->hook->attach('template:user:external', 'SynologySSOAuth:user/external');
        $this->template->hook->attach('template:user:integrations', 'SynologySSOAuth:user/integrations');
        $this->template->hook->attach('template:user:authentication:form', 'SynologySSOAuth:user/authentication');
        $this->template->hook->attach('template:user:create-remote:form', 'SynologySSOAuth:user/create_remote');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
    
    public function getPluginName()
    {
        return 'Synology SSO Authentication';
    }

    public function getPluginDescription()
    {
        return 'Use Synology SSO as authentication provider';
    }

    public function getPluginAuthor()
    {
        return 'Paul Sweeney';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Kolossi/plugin-synologysso-auth';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.6';
    }
}
