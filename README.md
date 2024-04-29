<img src="https://wiki.spiritbomb.ai/img/spirit-bomb-logo.png" width="75" />

# Spirit Bomb ProcessWire

A new site for Virtual Beings Record Label **Spirit Bomb** built using the ProcessWire CMF


## Table of Contents

1. [Site Structure](#site-structure)


## Site Structure

We are using the RockFrontEnd module to control templates, which are written in the LATTE php template engine. The structure of pages and templates is roughly as follows:

```
root
├── node_modules
├── src
│   └── js
│       ├── walletconnect.js
│       └── SDK.js
├── wwwroot
│   ├── site
│   │   ├── assets
│   │   ├── classes
│   │   │   ├── DefaultPage.php
│   │   │   └── HomePage.php
│   │   └── templates
│   │       ├── scripts
│   │       │   └── walletconnect-dist.js
│   │       ├── layouts
│   │       │   ├── default.php
│   │       │   └── home.php
│   │       ├── sections
│   │       │   ├── home.latte
│   │       │   ├── label.latte
│   │       │   ├── label-item.latte
│   │       │   ├── editions.latte
│   │       │   └── (etc)
│   │       ├── styles
│   │       │   ├── fonts
│   │       │   └── custom.less
│   │       ├── _init.php
│   │       ├── _main.php
│   │       ├── default-page.php
│   │       ├── news-item.php
│   │       ├── label-item.php
│   │       └── (etc)
│   └── wire
├── .env
├── .gitignore
├── package-lock.json
├── package.json
└── README.md
```

### Templates & Layouts

The action happens in the `templates` directory. Here we create any number of `php` pages and include the ProcessWire namespace in them; they are essentially empty pages acting as containers. In the `layouts` directory are stored any number of layouts, `default.php` being our main RockFrontEnd page renderer. This page will pull from the `sections` directory to render a template based on a page's assigned template in ProcessWire. Thus if we add a new template in ProcessWire (i.e. concert-visuals) and assign pages to it, we will need to add that page to the `templates` directory when we try pulling in its corresponding `latte` files from the `sections` directory via `default.php`. 

The page classes correspond to the pages in the `layout` directory, only in lowercase and without the word 'Page'. These custom classes extend ProcessWire Page classes, and the names must match. 


## Links

* [Spirit Bomb](https://spiritbomb.ai)
* [Strangeloop Studios](https://strangeloop-studios.com)

------

Copyright 2023 Spirit Bomb, Inc.

