# [vt] Google Tag Manager  
Google Tag Manager integration for OXID eShop v6.2 und höher  
module version 0.5.0 ( 2021-12-10 )

## Installation
* ``composer require vanilla-thunder/oxid-module-gtm --no-update``
* Modul aktivieren und Moduleinstellungen konfigurieren

## Tag Manager konfigurieren:
+ https://support.google.com/tagmanager/answer/9442095

## Google Analytics 4 Einrichtung

## GA4 Events / Customizing
für alle implementierten GA4 Events existieren Templates unter `source/modules/GoogleTagManager/Application/views/ga4/`, dabei entspricht der Dateiname dem Eventnamen in GA4. 
Die Einbindung dieser Event-Templates erfolgt über TPL-Blöcke unter `source/modules/GoogleTagManager/Application/views/blocks/`.   

## Universal Analytics Events

**"EE-Trigger" für Ecomemrce-Tags (Beispiel für Google Tag Manager):**
+ Triggertyp: Benutzerdefiniertes Ereignis
+ Ereignisname: ``ee\..*``
+ Übereinstimmung mit regulärem Ausdruck verwenden
+ Diesen Trigger auslösen bei: Alle benutzerdefinierten Ereignisse

**"EE-Tag" für Google Analytics Enhanced Ecommerce:**
+ Tag-Typ: Google Analytics - Universal Analytics
+ Tracking-Typ: Ereignis
+ Aktion: {{Event}}
+ Label: {{Event Label}}
+ Trigger : EE-Trigger

## Verfügbare Datalayer Variablen 
Für die einfachste Übersicht der enthaltenen Daten empfehle ich den Vorschau-Modus vom Google Tag Manager.

Bei jedem Seitenaufruf wird die Datenschicht mit einigen wenigen Infos erstellt, die man zum reinen Erfassen der Seitenaufrufe benötigt:
 + **page.type** - Seitentyp: default / cms / product / listing / checkout (an google analytics angelehnt) 
 + **page.title** - Seitentitel (außer Startseite, sie hat keinen Titel. Danke OXID...)
 + **page.cl** - OXID Controller Klasse (start, search, etc)
 + **userid** - oxID vom Benutzer bzw `false` falls nicht eingeloggt
 + **sessionid** - session iD
 
Alle für Ecommerce Tracking releavanten Daten werden mit speziellen Ecommerce Events in die Datenschicht eingefügt.
Hier ist ein Beispiel für die Einrichtung von Enhanced Ecomemrce Tracking über Google Tag Manager:




### LICENSE AGREEMENT
   [vt] google-tag-manager  
   Copyright (C) 2021 Marat Bedoev  
   info:  info@mb-dev.pro oder so /** @todo: überarbeiten, wenn ich wieder nüchtern bin */  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>