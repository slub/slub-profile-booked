# TYPO3 Extension `slub_profile_booked`

[![TYPO3](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://typo3.org/)

SLUB profile service booked rooms extension for TYPO3.

## 1 Usage

### 1.1 Installation using Composer

The recommended way to install the extension is using [Composer][1].

Run the following command within your Composer based TYPO3 project:

```
composer require slub/slub-profile-booked
```

## 2 Administration corner

### 2.1 Release Management

News uses [semantic versioning][2], which means, that
* **bugfix updates** (e.g. 1.0.0 => 1.0.1) just includes small bugfixes or security relevant stuff without breaking changes,
* **minor updates** (e.g. 1.0.0 => 1.1.0) includes new features and smaller tasks without breaking changes,
* **major updates** (e.g. 1.0.0 => 2.0.0) breaking changes wich can be refactorings, features or bugfixes.

## 3 API

This extension communicates with another system to provide booked.

### 3.1 Routes

Please check the routes' configuration. You have to set the matching page (limitToPages). If not the routes will not work properly.

### 3.2 Booked

A list of booked rooms from a given user.

- **Uri DDEV local:** https://ddev-slub-profile-service.ddev.site/merkliste/###USER_ID###
- **Uri general:** https://###YOUR-DOMAIN###/merkliste/###USER_ID###

#### 3.2.1 Extension configuration

- **Uri:** Address or domain to request the data. The uri has to begin with "https://". If you connect to another ddev container, please use "https://ddev-###YOUR-CONTAINER###-web".
- **Argument identifier:** When you request data from this extension to the booked api (external extension), you use additional parameters too. These parameters are wrapped with the "argument identifier". The default value is "tx_slubfindbooked_bookedlist". Change only if you know what you do.

[1]: https://getcomposer.org/
[2]: https://semver.org/


