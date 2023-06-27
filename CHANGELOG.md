# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.9.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.7.0...2.8.0) - 2023-06-27
### Added
- Cookiefirst usability

## [2.8.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.7.0...2.8.0) - 2023-06-23
### Added
- Method to get the in order used Payment-Name
- Method to get the current Article Category
- Following Entries to dedicated event-templates
  - coupon
  - paymentType
  - item_list_name
  - item_category
### Changed
- all used template-files have a more dedicated name
- general code cleanup

## [2.7.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.6.0...2.7.0) - 2023-06-19
### Changed
- add_to_cart event template-structure

## [2.6.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.5.0...2.6.0) - 2023-05-31
### Added
- add settings to explicit choose an external service (usercentrics/ consentmanager)
- position to block-extension
- extended instructions to check for in readme
### Fixed
- usercentrics script
- missing right articleList-getter
### Changed
- view_item_list-template block extension
- cookieManager handling
### Removed
- additional check for cookieManagerType

## [2.5.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.4.0...2.5.0) - 2023-05-23
### Added
- additional settings to explicitly indicate that consentmanager is used
### Fixed
- unnecessary converting of int to str
- missing PriceObject-bug
### Changed
- genuine code cleanup

## [2.4.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.3.3...2.4.0) - 2023-05-02
### Added
- "OXID Cookie Management powered by usercentrics" compatibility
- usercentrics defined script attributes
- cookie-manager evaluation
### Changed
- genuine clean up of base-js-files

## [2.3.3](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.3.2...2.3.3) - 2023-03-20
### Fixed
- metadata file path for view_item

## [2.3.2](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.2.2...2.3.2) - 2023-03-17
### Added
- Aggrosoft-Cookie-Consent compatibility
### Fixed
- wrong function for pageview on thankyou page
### Deleted
- unused files

## [2.2.2](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.2.1...2.2.2) - 2023-02-22
### Fixed
- price formatting in view_cart

## [2.2.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.1.1...2.2.1) - 2023-02-21
### Added
- cookie handling

## [2.1.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.1...2.1.1) - 2023-01-27
### Fixed
- add missing class import

## [2.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/2.0...2.1) - 2023-01-27
### Added
- block section for add_to_basket js
- template block order positions

## [2.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.1...2.0) - 2023-01-20
### Added
- using of ContainerFactory in ViewConfig

## [1.10.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.9.0...1.10.0) - 2023-06-27
### Added
- Following Entries to dedicated event-templates
  - coupon
  - paymentType
  - item_list_name
  - item_category
- Method to get the in order used Payment-Name
- Method to get the current Article Category
### Changed
- cookieManager handling
- general template cleanup
- renaming the template to a more intuitive name

## [1.9.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.8.0...1.9.0) - 2023-06-19
### Changed
- add_to_cart event template-structure

## [1.8.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.7.0...1.8.0) - 2023-05-31
### Fixed
- bug in explicit manager selection

## [1.7.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.6.0...1.7.0) - 2023-05-31
### Added
- extended call to read the technical documentation
### Changed
- block-extension for view_item_list
- way of getting list-articles in view_item_list

## [1.6.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.5.0...1.6.0) - 2023-05-30
### Added
- possibility to choose between consentmanager && usercentrics
- position to block extension
### Changed
- genuine code cleanup
- usercentrics includation script

## [1.5.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.4.0...1.5.0) - 2023-05-23
### Added
- additional settings to explicitly indicate that consentmanager is used
### Fixed
- unnecessary converting of int to str
- missing PriceObject-bug
### Changed
- genuine code cleanup

## [1.4.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.3.1...1.4.0) - 2023-05-02
### Added
- "OXID Cookie Management powered by usercentrics" compatibility
- usercentrics defined script attributes
- cookie-manager evaluation
### Changed
- genuine clean up of base-js-files

## [1.3.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.2.1...1.3.1) - 2023-03-17
### Added
- Aggrosoft-Cookie-Consent compatibility
### Fixed
- wrong function for pageview on thankyou page

## [1.2.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.2...1.2.1) - 2023-02-22
### Fixed
- price formatting in view_cart

## [1.2](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.1...1.2) - 2023-02-01
### Added
- own cookie-check-handler

## [1.1](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.0...1.1) - 2023-01-27
### Added
- block section for add_to_basket js
- template block order positions

### Changed
- switched price formatting

## [1.0](https://git.d3data.de/D3Public/GoogleAnalytics4/compare/1.0...1.0) - 2023-01-20
### Added
- publication of app features