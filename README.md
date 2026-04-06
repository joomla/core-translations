# Core-Translations

The repository to store the Source and Translations for the Joomla Core (CMS).
Connected to the [Crowdin](https://joomla.crowdin.com/cms) Translation Platform and other repositories if needed.

## Found typos or problems with a language pack? Or just want to help?

There are dedicated community members for many translations. They can be found on the Volunteers Portal in the working group [Joomla! CMS (Core) Language Team](https://volunteers.joomla.org/teams/joomla-cms-language-team). Do not hesitate to contact someone or help directly on [Crowdin](https://joomla.crowdin.com/cms) to make Joomla available in as many languages as possible.

## Installer files

The installer files (Installer\language\en-GB // joomla.ini and langmetadata.xml) are managed in Crowdin.
This is required to keep the Core installation process intact.
In the Crowdin platform things are locked and automated to keep everything aligned.
These three files can't be processed manually, because of the amount of work and risks.
This only applies to languages that are managed in Crowdin.

## Github Actions - Cron Schedule

### Blocked time windows
* UTC 20:00-20:10 -> Get J5 Core Source and Upload to Crowdin
* UTC 20:15-20:25 -> Get J6 Core Source and Upload to Crowdin
* UTC 20:30-20:45 -> Get J5 Ukrainian and upload Translations to Crowdin
* UTC 20:45-21:00 -> Get J5 Russian and upload Translations to Crowdin
* UTC 21:00-21:15 -> Get J5 Japanese and upload Translations to Crowdin
* UTC 21:15-21:30 -> Get J5 Malay and upload Translations to Crowdin
* UTC 21:30-21:45 -> Get J6 Russian and upload Translations to Crowdin
* UTC 21:45-22:00 -> Get J6 Ukrainian and upload Translations to Crowdin
* UTC 22:00-22:15 -> Get J6 Malay and upload Translations to Crowdin
* UTC 22:15-22:30 -> Project Build J5
* UTC 22:45-23:00 -> Project Build J6
* UTC 00:15-01:15 -> J5 Download Installer Translations Crowdin Action
* UTC 01:30-02:30 -> J6 Download Installer Translations Crowdin Action
* UTC 02:45-04:15 -> J5 Download Package Translations Crowdin Action
* UTC 04:30-06:00 -> J6 Download Package Translations Crowdin Action

## Folder Structure external repositories
The following structure is required for external repositories, if we need to sync it with this repository.
The languagename is only required if the repository holds multiple languages.

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- language/(locale)
- pkg_de-DE.xml

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- language/(locale)
- pkg_de-DE.xml
