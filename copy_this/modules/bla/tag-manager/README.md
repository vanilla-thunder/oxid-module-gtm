# [bla] tag-manager  
Tag Manager integration for OXID eShop: Google, Matomo and Yandex  
module version 0.2.0 ( 2018-12-04 )

# Installation
* [https://github.com/vanilla-thunder/oxid-module-tag-manager/archive/master.zip](https://github.com/vanilla-thunder/oxid-module-tag-manager/archive/master.zip) herunterladen und entpacken
* Inhalt von "copy_this" in den Shop hochladen
* Modul aktivieren und Moduleinstellungen konfigurieren

# Einrichtung + allgemeine Funktionsweise:
Alle drei unterstützten Tag Manager werden mit Daten aus einer gemeinsamen Datenschicht (dataLayer) gefüttert.   
Für die einfachste Übersicht der enthaltenen Daten empfehle ich den Vorschau-Modus vom Google Tag Manager.

Bei jedem Seitenaufruf wird die Datenschicht mit einigen wenigen Infos erstellt, die man zum reinen Erfassen der Seitenaufrufe benötigt:
 + **page.type** - Seitentyp: default / cms / product / listing / checkout (an google analytics angelehnt) 
 + **page.title** - Seitentitel (außer Startseite, sie hat keinen Titel. Danke OXID...)
 + **page.class** - OXID Controller Klasse (start, search, etc)
 + **user.country** - Land des Benutzers, sofern dieser angemeldet ist.
 + **user.httpref** - http referrer
 
Alle für Ecommerce Tracking releavanten Daten werden mit speziellen Ecommerce Events in die Datenschicht eingefügt.
Hier ist ein Beispiel für die Einrichtung von Enhanced Ecomemrce Tracking über Google Tag Manager:
  
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

Eine Video-Anleitung mit der kompletten Google Analytics Einrichtung folgt in Kürze.


### LICENSE AGREEMENT
   [bla] tag-manager  
   Copyright (C) 2018 bestlife AG  
   info:  oxid@bestlife.ag  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>