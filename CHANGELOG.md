# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

For a brief few notes on what's Inane Class check out the [InaneClasses Wiki](https://git.inane.co.za:3000/Inane/tools/wiki "InaneClasses Wiki"). Will be fleshing this out over time. But don't hold your breath. If you want something specific... Ask!

Check out the [README](README.md) for installation stuff.

## 0.26.0 - 2022-01-21

- Config\Options:
    - fix var_export empty of data
- Debug\Dumper:
    - variable name used (when able) if no label supplied
    - label now shows type
- File\FileInfo AND Http\Client
    - fixes for php 8.1
- Data\ValueType
    - New enum for MySQL => php types

## 0.25.0 - 2021-12-07

- Dumper        : minor fixes
- ArrayUtil     : replace merge with complete and update

## 0.24.0 - 2021-10-16

- Dumper        : CSS fixes
- Dumper        : Added Silence attribute which can be set `true`/`false` to control Dumper's output by individual class and function
- General       : Bug fixes and enhancements.

## 0.23.0 - 2021-07-22

- Render        : Helper and Engine cover the basis of templates
- Dumper        : Simple, took a few steps back and much happier with it now

## 0.22.2 - 2021-07-20

- Config\Options: array type for configurations, settings and options
- Http          : a bunch a stuff for requests, responses and formatting those responses
- Dumper        : A quick and easy dump tool that neatly stacks dumps collapsed at the end of page
- fixes and tweaks

## 0.21.0.3 - 2021-04-16

- Added Writer: tweaking odds & ends
- Bitwise   : test can check optional options object

## 0.20.1 - 2020-11-24

 - **New** BitwiseFlag 0.1.0: Bitwise Flag abstract class
 - **New** BitwiseFlagTrait 0.1.0: Bitwise Flag as trait

## 0.19.0 - 2020-10-06

 - **Upd** Enum 0.4.0: Added default value, optional value to be used as needed. Usage identical to description.

## 0.18.0 - 2020-08-20

 - **New** IpTrait: Adds getIp
 - **New** LogTrait: Adds log

## 0.17.0 - 2020-06-29

 - **New** PropertyTrait: Adds __get/__set methods and property parser for method names

## 0.16.4 - 2020-05-13

 - **Upd** FileServer: serve now also takes a response object which it returns updated.

## 0.16.3 - 2020-04-27

 - **Upd** FileInfo: added getFiles, getFile functions.

## 0.16.1 - 2020-04-07

 - **New** UUID

## 0.14.3 - 2020-01-30

 - **Upd** Move requirement to laminas

## 0.14.2 - 2020-01-29

 - **Fix** Some spelling
 - **Upd** Deprecate Logger::echo

## 0.14.0 - 2019-06-01

- **Upd** Logger: echo renamed to dump

## 0.13.2 - 2019-03-01

- **Upd** Once: Value type string
- **Upd** Once: updated php documentation
- **Fix** Version: the url for version checking was incorrect
- **New** Logger: new easy access to dumper, just call echo on the object

## 0.13.1 - 2018-12-30

- **Upd** FileInfo: Human readable file size no longer shows trailing zeros

## 0.13.0 - 2018-12-05

- **Upd** Str: More functions
- **New** Debug\Timer: Time the duration of code

## 0.12.6 - 2018-09-28

- **New** Str: String utilities

## 0.12.5 - 2018-07-27

- **Fix** Fixed psr4 path

## 0.12.4 - 2017-11-05

- **Upd** Once can now be directly echo as well

## 0.12.3 - 2016-09-06

- **Upd** Package inanepain/inane
- **Add** github & packagist
- **Upd** README.md

## 0.12.2 - 2016-06-23

- **Upd** Http\FileServer->setBandwidth is now a rough kb/s setting

## 0.12.1 - 2016-06-23

- **Fix** Type\Enum Undefined index when no description for key

## 0.12.0 - 2016-06-02

- **Add** Http\FileServer->forceDownload
- **Upd** Enum\Enum MOVED Type\Enum
- **Add** Type\Enum::description, use: public static $descriptions = [STATUS => description, ...]
- **Add** String\Capitalisation
- **Add** File\FileInfo->getExtension optional argument Capitalisation
- **Add** Config\ConfigAwareTrait
- **Add** Http\FileServer can limit download bandwidth
- **Add** Observer Pattern

## 0.11.0 - 2016-04-29

- **Add** Http\FileServer->forceDownload
- **Upd** Enum\Enum MOVED Type\Enum
- **Add** String\Capitalisation
- **Add** File\FileInfo->getExtension optional argument Capitalisation

## 0.10.1 - 2016-04-20

- **Add** Type::Once Documentation

## 0.10.1 - 2016-04-20

- **Add** Type::Once Documentation

## 0.10.0 - 2016-04-20

- **Add** Type::Once

## 0.9.0 - 2016-04-18

- **Add** Exceptions

## 0.8.0 - 2016-04-18

- **Add** Config
- **Add** Enum

## 0.7.0 - 2016-04-11

- **Add** Version.
- **Add** Http\FileServer: Name, Used to send an alternative filename for download file
