<?php

namespace D3\GoogleAnalytics4\Application\Model;

class ManagerTypes
{
    #ToDo: make own classes for each of the manager


    const EXTERNAL_SERVICE          = "externalService";
    const NET_COOKIE_MANAGER        = "net_cookie_manager";

    /**
     * Further information's:
     * https://github.com/aggrosoft/oxid-cookie-compliance
     */
    const AGCOOKIECOMPLIANCE        = "agcookiecompliance";

    /**
     * Used the OXID Module.
     *
     * Further information's:
     * https://docs.oxid-esales.com/modules/usercentrics/de/latest/einfuehrung.html
     *
     * Usercentrics homepage:
     * https://usercentrics.com
     */
    const USERCENTRICS_MODULE       = "oxps_usercentrics";

    /**
     * manually included usercentrics script
     */
    const USERCENTRICS_MANUALLY     = "USERCENTRICS";

    const CONSENTMANAGER            = "CONSENTMANAGER";

    const COOKIEFIRST               = "COOKIEFIRST";

    /**
     * @return array
     */
    public function getManagerList(): array
    {
        return [
            "externalService"       => self::EXTERNAL_SERVICE,
            "agcookiecompliance"    => self::AGCOOKIECOMPLIANCE,
            "net_cookie_manager"    => self::NET_COOKIE_MANAGER,
            "oxps_usercentrics"     => self::USERCENTRICS_MODULE,
            "usercentrics"          => self::USERCENTRICS_MANUALLY,
            "consentmanager"        => self::CONSENTMANAGER,
            "cookiefirst"        => self::COOKIEFIRST
        ];
    }

    /**
     * @param string $sManager
     * @return bool
     */
    public function isManagerInList(string $sManager) :bool
    {
        return in_array($sManager, $this->getManagerList(), true);
    }
}