# [vt] Google Tag Manager  
Google Tag Manager integration for OXID eShop v6.2 und höher  
module version 0.6.0

## Installation
1. Execute the following commands from the main directory of the OXID:
   ```
   composer config repositories.vtgtm vcs https://github.com/vanilla-thunder/oxid-module-gtm.git
   composer require --no-update vanilla-thunder/oxid-module-gtm
   composer update --no-interaction
   vendor/bin/oe-console oe:module:install-configuration source/modules/vt/GoogleTagManager/
   vendor/bin/oe-console oe:module:apply-configuration
   ```
2. Enable moudle "[vt] Google Tag Manager (`vanilla-thunder/oxid-module-gtm`) in the OXID eShop Admin (https://www.domain.tld/admin/).
3. If necessary, flush the `tmp/` directory and regenerate views.

## Tag Manager konfigurieren:
+ https://support.google.com/tagmanager/answer/9442095

## Google Analytics 4 Einrichtung

## GA4 in GTM einrichten
+ GA4 Event Trigger:
+ GA4 Event Tag


## Verfügbare Datalayer Variablen 
Für die einfachste Übersicht der enthaltenen Daten empfehle ich den Vorschau-Modus vom Google Tag Manager.

Bei jedem Seitenaufruf wird die Datenschicht mit einigen wenigen Infos erstellt, die man zum reinen Erfassen der Seitenaufrufe benötigt:
 + **page.type** - Seitentyp: default / cms / product / listing / checkout (an google analytics angelehnt) 
 + **page.title** - Seitentitel (außer Startseite, sie hat keinen Titel. Danke OXID...)
 + **page.cl** - OXID Controller Klasse (start, search, etc)
 + **userid** - oxID vom Benutzer bzw `false` falls nicht eingeloggt
 + **sessionid** - session iD


# Customizing
At fist glance this might look a bit complicated, but I promise you, its smart as f😱ck.  
Lets start with the module's structure:
+ all the templates are here: `source/modules/vt/GoogleTagManager/Application/views/`
+ template blocks are used to inject module functions into templates
+ GA4 events are placed in dedicated templates inside `ga4` subdirectory
+ there are two main template blocks: 
  1) `_gtm_js.tpl` for GTM JS code and base datalayer variables
  2) `_gtm_nojs.tpl` for GTM nojs fallback code
+ other blocks are used to inject events into right spots, those files are named according to the blocks they use

Now look into `blocks/details_productmain_title.tpl` file, it includes the dedicated template for the "view_item" event:  
`[{include file=$oViewConf->getGtmEventTpl("ga4/view_item") event="view_item" gtmProduct=$oView->getProduct()}]`  
The template name is returned by the method `getGtmEventTpl()` from the ViewConfig extension:
```PHP
public function getGtmEventTpl($event) {
    $tpl = $event.".tpl";

    // first check if there is custom template in theme dir
    $themePath = $this->getTemplateDir();
    var_dump($themePath);
    if (file_exists($themePath.$tpl)) return $tpl;

    // fallback to default module's templates
    $modulePath = $this->getModulePath("vt-gtm","/Application/views/");
    return (file_exists($modulePath.$tpl ? "ga4_".$tpl : "empty.tpl"));
}
```
basically, it maps event "ga4/view_item" to this template `source/modules/vt/GoogleTagManager/Application/views/ga4/view_item.tpl`

Now, lets say you need to change the event template. You have two options here:
1) add custom event template to you child theme, e.g. `source/Application/views/wave/tpl/ga4/view_item.tpl`
2) create own module, that extends ViewConfig and overwrites `getGtmEventTpl` method, e.g.:
```PHP
public function getGtmEventTpl($event) {
    if($event === "ga4/view_item") return "my_custom_template.tpl";
    else return parent::getGtmEventTpl($event);
}
```

The check if file exists is added to prevent php errors when there is no template for particular event.  


### LICENSE AGREEMENT
   [vt] google-tag-manager  
   with friendly help from [Kussin | eCommerce und Online-Marketing GmbH](https://kussin.de)  
   Copyright (C) 2022 Marat Bedoev  
   info:  info@mb-dev.pro  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>