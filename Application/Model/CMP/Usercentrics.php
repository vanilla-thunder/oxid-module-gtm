<?php

declare(strict_types=1);

namespace D3\GoogleAnalytics4\Application\Model\CMP;

use D3\GoogleAnalytics4\Application\Model\ManagerTypes;

/**
 * Used the OXID Module.
 *
 * Further information's:
 * https://docs.oxid-esales.com/modules/usercentrics/de/latest/einfuehrung.html
 *
 * Usercentrics homepage:
 * https://usercentrics.com
 */
class Usercentrics extends ConsentManagementPlatformBaseModel
{
    public const sExternalIncludationPublicName    = "( Externe Einbindung ) Usercentrics";
    public const sExternalIncludationInternalName  = "usercentrics";
    public const sModuleIncludationPublicName      = "( Modul ) Usercentrics";
    public const sModuleIncludationInternalName    = "oxps_usercentrics";
}
