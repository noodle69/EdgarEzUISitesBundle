<?php

namespace Edgar\EzUISitesBundle\EventListener;

use eZ\Publish\API\Repository\PermissionResolver;
use EzSystems\EzPlatformAdminUi\Menu\Event\ConfigureMenuEvent;
use JMS\TranslationBundle\Translation\TranslationContainerInterface;
use JMS\TranslationBundle\Model\Message;

class ConfigureMenuListener implements TranslationContainerInterface
{
    const ITEM_SITES = 'main__sites';

    /** @var PermissionResolver */
    private $permissionResolver;

    /**
     * ConfigureMenuListener constructor.
     *
     * @param PermissionResolver $permissionResolver
     */
    public function __construct(
        PermissionResolver $permissionResolver
    ) {
        $this->permissionResolver = $permissionResolver;
    }

    /**
     * Add Sites entry menu.
     *
     * @param ConfigureMenuEvent $event
     */
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        if ($this->permissionResolver->hasAccess('uisites', 'read')) {
            $menu = $event->getMenu();

            $menu->addChild(self::ITEM_SITES, []);
        }
    }

    /**
     * @return array
     */
    public static function getTranslationMessages(): array
    {
        return [
            (new Message(self::ITEM_SITES, 'messages'))->setDesc('Sites'),
        ];
    }
}
