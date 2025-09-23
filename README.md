# Core-Translations

The repository to store the Source and Translations for the Joomla Core (CMS).
Connected to the [Crowdin](https://joomla.crowdin.com/cms) Translation Platform and other repositories if needed.

## Found typos or problems with a language pack? Or just want to help?

There are dedicated community members for many translations. They can be found on the Volunteers Portal in the working group [Joomla! CMS (Core) Language Team](https://volunteers.joomla.org/teams/joomla-cms-language-team). Do not hesitate to contact someone or help directly on [Crowdin](https://joomla.crowdin.com/cms) to make Joomla available in as many languages as possible.

## Installer files

The installer files (Installer\language\en-GB // joomla.ini and langmetadata.xml) are managed in Crowdin.
This is required to keep the Core installation process intact.
In the Crowdin platform things are locked and automated to keep everything aligned.
These two files can't be processed manually, because of the amount of work and risks.

## Github Actions - Cron Schedule

### Blocked time windows
* UTC 10:00-11:00 -> Project Build J5
* UTC 11:00-12:00 -> Project Build J4
* UTC 22:00-23:00 -> Project Build J5
* UTC 23:00-00:00 -> Project Build J4
* UTC 01:01-02:00 -> J4 Download Installer Translations Crowdin Action
* UTC 02:01-03:00 -> J4 Download Package Translations Crowdin Action
* UTC 06:12-07:12 -> Get J4 Core Source and Upload to Crowdin
* UTC 03:30-04:30 -> J5 Download Installer Translations Crowdin Action
* UTC 04:01-05:00 -> J5 Download Package Translations Crowdin Action
* UTC 07:12-07:41 -> Get J5 Core Source and Upload to Crowdin
* UTC 07:42-08:12 -> Get J6 Core Source
* UTC 08:01-08:15 -> Get J4 Russian and upload Translations to Crowdin
* UTC 08:16-08:30 -> Get J5 Ukrainian and upload Translations to Crowdin
* UTC 08:31-08:45 -> Get J4 Japanese and upload Translations to Crowdin
* UTC 08:46-09:00 -> Get J4 Ukrainian and upload Translations to Crowdin
* UTC 09:01-09:15 -> Get J5 Russian and upload Translations to Crowdin
* UTC 09:16-09:30 -> Get J5 Japanese and upload Translations to Crowdin

## Folder Structure external repositories
The following structure is required for external repositories, if we need to sync it with this repository.
The languagename is only required if the repository holds multiple languages.

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- language/(locale)
- pkg_ru-RU.xml

[LanguageName] Optional
- administrator/language/(locale)
- api/language/(locale)
- language/(locale)
- pkg_ru-RU.xml
