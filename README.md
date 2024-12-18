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

## 2 API

This extension communicates with another system to provide booked.

### 2.1 Routes

Please check the routes' configuration. You have to set the matching page (limitToPages). If not the routes will not work properly.

### 2.2 Booked

A list of booked rooms from a given user.

- **Uri DDEV local:** https://ddev-slub-profile-service.ddev.site/raumbuchungen/###USER_ID###
- **Uri general:** https://###YOUR-DOMAIN###/raumbuchungen/###USER_ID###

#### 2.2.1 Extension configuration

- **Uri:** Address or domain to request the data. The uri has to begin with "https://". If you connect to another ddev container, please use "https://ddev-###YOUR-CONTAINER###-web".
- **Argument identifier:** When you request data from this extension to the booked api (external extension), you use additional parameters too. These parameters are wrapped with the "argument identifier". The default value is "tx_slubfindbooked_bookedlist". Change only if you know what you do.

[1]: https://getcomposer.org/


