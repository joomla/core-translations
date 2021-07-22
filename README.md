# Core-Translations

The repository to store the Source and Translations for the Joomla Core (CMS).
Connected to the Crowdin Translation Platform and other repositories if needed.


## Github Actions - Cron Schedule

### Blocked time windows
* UTC 11:00-12:00 -> Project Build
* UTC 23:00-00:00 -> Project Build
* UTC 06:12-07:12 -> Get Core Source and Upload too Crowdin
* UTC 08:01-08:15  -> Get Russian and upload Translations to Crowdin
* UTC 08:16- 


## Folder Structure external repositories
The following structure is required for external repositories, if we need to sync it with this repository.
The languagename is only required if the repository holds multiple languages.

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- installation/language/(locale)
- language/(locale)
- pkg_ru-RU.xml

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- installation/language/(locale)
- language/(locale)
- pkg_ru-RU.xml
