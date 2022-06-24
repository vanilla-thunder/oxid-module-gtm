<?php

namespace VanillaThunder\GoogleTagManager\Application\Traits;

trait UATrait
{

    protected $_aUAPageTypes = [
        "content"  => "cms",
        "details"  => "product",
        "alist"    => "listing",
        "search"   => "listing",
        "basket"   => "checkout",
        "user"     => "checkout",
        "payment"  => "checkout",
        "order"    => "checkout",
        "thankyou" => "checkout",
    ];

    private function _getUABasicDatalayer()
    {
        return [
            'page'      => [
                'type'  => $this->_aUAPageTypes[$cl] ?? "unknown",
                'title' => $this->oView->getTitle(),
                'cl'    => $this->cl,
            ],
            'userid'    => ($this->oUser ? $this->oUser->getId() : false),
            'sessionid' => session_id() ?? false,
            //'httpref'   => $_SERVER["HTTP_REFERER"] ?? "unknown"
        ];
    }

}