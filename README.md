[![deutsche Version](https://logos.oxidmodule.com/de2_xs.svg)](README.md)

# ![D3 Logo](https://logos.oxidmodule.com/d3logo_24x24.svg) Google-Analytics 4 für OXID eShop

Dieses Modul bietet die Möglichkeit in Ihrem OXID eShop (6.x) die neue 'Property' Google Analytics 4 (GA4) von Google
zu integrieren.  
Hierfür stehen Ihnen verschiedene 'templates' zur verfügung, mit denen Sie bestimmte Events tracken können.  
Beispiele dafür sind: view_item, add_to_basket, purchase, ...

Weiterführende Informationen: https://developers.google.com/analytics/devguides/collection/ga4

## Inhaltsverzeichnis

- [Installation](#installation)
- [Verwendung](#verwendung)
- [Changelog](#changelog)
- [Lizenz](#lizenz)

## Installation

Dieses Paket erfordert einen mit Composer installierten OXID eShop in einer in der [composer.json](composer.json) definierten Version.

Bitte tragen Sie den folgenden Abschnitt in die `composer.json` Ihres Projektes ein:

```
  "extra": {
    optionale Anweisungen von 3rd-Party-Packages (z.B. Patch- oder Symlink-Anweisungen)
  }
```

Öffnen Sie eine Kommandozeile und navigieren Sie zum Stammverzeichnis des Shops (Elternverzeichnis von source und vendor). Führen Sie den folgenden Befehl aus. Passen Sie die Pfadangaben an Ihre Installationsumgebung an.


```bash
php composer require d3/google-analytics4:^1
```

Sofern nötig, bestätigen Sie bitte, dass Sie `package-name` erlauben, Code auszuführen.

Aktivieren Sie das Modul im Shopadmin unter "Erweiterungen -> Module".

## Verwendung
### Grundfunktionalität
Nach erfolgreicher Installation finden Sie in Ihrem Shop-Admin unter "Erweiterungen > Module" 
den Eintrag 'Google Analytics 4'.
Aktivieren Sie dieses Modul, um die Funktionalitäten nutzen zu können.

Navigieren Sie danach zum Reiter 'Einstell.'.
Tragen Sie die nötige sog. 'Container ID' ein. Diese sieht in etwa so aus: 'GTM-W34LLOP'.

Aktivieren Sie GA4 selbst, indem Sie dieses direkt darunter anhaken.

### Technische Infos
- Navigieren Sie bitte zur [technischen Doku](./Docs/README.md)

---

## Changelog

Siehe [CHANGELOG](CHANGELOG.md) für weitere Informationen.

## Beitragen

Wenn Sie einen Verbesserungsvorschlag haben, legen Sie einen Fork des Repositories an und erstellen Sie einen Pull Request. Alternativ können Sie einfach ein Issue erstellen. Fügen Sie das Projekt zu Ihren Favoriten hinzu. Vielen Dank.

- Erstellen Sie einen Fork des Projekts
- Erstellen Sie einen Feature Branch (git checkout -b feature/AmazingFeature)
- Fügen Sie Ihre Änderungen hinzu (git commit -m 'Add some AmazingFeature')
- Übertragen Sie den Branch (git push origin feature/AmazingFeature)
- Öffnen Sie einen Pull Request

## Lizenz
(Stand: 06.05.2021)

Vertrieben unter der GPLv3 Lizenz.

```
Copyright (c) D3 Data Development (Inh. Thomas Dartsch)

Diese Software wird unter der GNU GENERAL PUBLIC LICENSE Version 3 vertrieben.
```

Die vollständigen Copyright- und Lizenzinformationen entnehmen Sie bitte der [LICENSE](LICENSE)-Datei, die mit diesem Quellcode verteilt wurde.

## Credits
Zu diesem Modul haben beigetragen:

- [Marat Bedoev](https://github.com/vanilla-thunder)

Vielen Dank.