# Portfolio CMS

A developer-portfolio website with a full admin panel behind it, so every part of the page —
the hero, about section, projects, skills, activities, and contact links — is editable from a
dashboard instead of being hard-coded. Built on Laravel with a Filament admin panel, it renders
the content and can publish it out as a fast static page.

> This is a sanitised demo build. It began as a real portfolio site for a client, but the name,
> bio, contact details, and images have all been replaced with fictional placeholders (the
> "Jordan Lee" persona here is invented). The projects and skills are kept as generic examples.
> The repo is here to show the architecture, not the original person's site.

**Live demo:** https://umairahmedazizi.github.io/laravel-portfolio-cms/ — a static render of the
portfolio this CMS produces, hosted on GitHub Pages. The Laravel admin panel isn't running there
(Pages can't run PHP); it needs a normal PHP host.

## What it does

- A single-page portfolio rendered by Laravel from content stored in the database.
- A Filament admin panel to manage everything without editing code:
  - **Site settings** — hero text, about copy, SEO fields, contact and footer details.
  - **Projects** — title, subtitle, tech chips, description, highlights, links, and an
    optional screenshot upload.
  - **Skills** grouped by area, plus **stats**, **activities**, and **contact / social links**.
- A `site:publish` console command (and a button in the admin) that renders the current content
  to a static `index.html` for fast hosting.

## Why it's built this way

The interesting part is the separation: the public site is a thin view layer over a set of
well-defined models (`Project`, `SkillCategory`, `Stat`, `Activity`, `ContactLink`, `SocialLink`,
`Setting`). Adding or reordering content is a database operation through the admin panel, not a
code change — which is the whole point of a CMS. There are also small authoring conveniences, like
`*word*` for emphasis and `==phrase==` for a highlight pill, so the editor never has to write HTML.

## Tech

Laravel 13 (PHP 8.3), Filament 5 for the admin panel, Blade for the front end, and SQLite or
MySQL for storage.

## Running it locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed     # creates the schema and loads the demo content
php artisan serve
```

The public site is then at `http://localhost:8000`, and the admin panel at `/admin`. The seeder
creates a demo admin account (`admin@portfolio.local` / `portfolio123`) — change it before
deploying anywhere real. To reset content back to the starting point, run
`php artisan migrate:fresh --seed`.

## Notes on secrets

Nothing sensitive is committed. The `.env` file, the `vendor/` directory, and the local SQLite
database are all git-ignored. Use `.env.example` as your starting point and generate your own
`APP_KEY`.
