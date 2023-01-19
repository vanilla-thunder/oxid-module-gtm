[![deutsche Version](https://logos.oxidmodule.com/de2_xs.svg)](README.md)

# ![D3 Logo](https://logos.oxidmodule.com/d3logo_24x24.svg) Google-Analytics 4 für OXID eShop

Google-Analytics 4 integration via 'Google Tag Manager' für den OXID eShop 6.x

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
    ...
  }
```

Öffnen Sie eine Kommandozeile und navigieren Sie zum Stammverzeichnis des Shops (Elternverzeichnis von source und vendor). Führen Sie den folgenden Befehl aus. Passen Sie die Pfadangaben an Ihre Installationsumgebung an.


```bash
php composer require d3/modulename:^2.0
```

Sofern nötig, bestätigen Sie bitte, dass Sie `package-name` erlauben, Code auszuführen.

Aktivieren Sie das Modul im Shopadmin unter "Erweiterungen -> Module".

## Verwendung

...

## Changelog

Siehe [CHANGELOG](CHANGELOG.md) für weitere Informationen.

## Beitragen

Wenn Sie eine Verbesserungsvorschlag haben, legen Sie einen Fork des Repositories an und erstellen Sie einen Pull Request. Alternativ können Sie einfach ein Issue erstellen. Fügen Sie das Projekt zu Ihren Favoriten hinzu. Vielen Dank.

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

Die vollständigen Copyright- und Lizenzinformationen entnehmen Sie bitte der [LICENSE](LICENSE.md)-Datei, die mit diesem Quellcode verteilt wurde.

## weitere Lizenzen und Nutzungsbedingungen

...