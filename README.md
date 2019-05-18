Synology SSO Auth plugin for Kanboard
=====================================

[![Build Status](https://travis-ci.org/Kolossi/plugin-synologysso-auth.svg?branch=master)](https://travis-ci.org/Kolossi/plugin-synologysso-auth)

- Link a Synology SSO  account to a Kanboard user profile.

Author
------

- Paul Sweeney
- License MIT

Requirements
------------

- Kanboard >= 1.2.6

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/SynologySSOAuth`
3. Clone this repository into the folder `plugins/SynologySSOAuth`

Note: Plugin folder is case-sensitive.

Configuration
-------------

To use this plugin, you must have access to a [Synology NAS](https://www.synology.com/products) with the [SSO Server package](https://www.synology.com/en-us/dsm/packages/SSOServer) installed and configured.


## Troubleshooting

- Enable the debug mode
- All connection errors with the Synology SSO API are recorded in the log files `data/debug.log` or syslog
