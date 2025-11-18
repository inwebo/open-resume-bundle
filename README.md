### Open Resume Bundle for Symfony

An installable Symfony bundle providing Doctrine ORM mapped superclasses and models for the Open Resume domain (basics, profiles, work, volunteer, education, skills, etc.). Use it as a foundation to model resume data in your Symfony application, extending the provided base entities and wiring them into Doctrine.

This repository is a reusable library (not a standalone app).

#### Key features
- Doctrine ORM mapped superclasses for common resume entities
- Symfony Validator integration (interfaces/types geared for validation)
- Symfony bundle that prepends Doctrine mapping for the package entities

---

### Stack and requirements
- Language: PHP 8.2+
- Framework: Symfony (bundle components; tested with Symfony 7 components)
- Persistence: Doctrine ORM 3.5+ with doctrine/doctrine-bundle (v2 or v3)
- Validation: symfony/validator ^7.3

See `composer.json` for authoritative constraints.

---

### Installation (in a Symfony application)
1) Require the bundle via Composer:

```
composer require inwebo/open-resume-bundle
```

2) Define your concrete entity classes by extending the mapped superclasses from this bundle (e.g., `Inwebo\OpenResumeBundle\Entity\Basics`). Example:

```
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Entity\Basics as BaseBasics;

#[ORM\Entity]
class Basics extends BaseBasics
{
    // add your own fields or mappings if needed
}
```

3) Configure the bundle to point to your concrete classes. The bundle defines a configuration section with an `entities` map. Provide fully qualified class names for each key you use. Example `config/packages/inwebo_open_resume.yaml`:

```
inwebo_open_resume:
  entities:
    profile: App\Entity\Profile
    work: App\Entity\Work
    volunteer: App\Entity\Volunteer
    education: App\Entity\Education
    award: App\Entity\Award
    certificate: App\Entity\Certificate
    interest: App\Entity\Interest
    language: App\Entity\Language
    location: App\Entity\Location
    project: App\Entity\Project
    publication: App\Entity\Publication
    reference: App\Entity\Reference
    skill: App\Entity\Skill
```

Notes:
- No defaults are provided by the bundle; you should create concrete entities (extending the provided mapped superclasses) and wire them here.
- Doctrine mapping for this bundle’s `src/Entity` directory is pre-registered automatically by the bundle; when you create your own concrete entities in your app namespace, ensure those are mapped as regular Doctrine entities.

4) Run your usual Doctrine workflows in the host app:

```
php bin/console doctrine:schema:validate
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

---

### Usage overview
- Extend the mapped superclasses in `Inwebo\OpenResumeBundle\Entity` to implement concrete `App\Entity\...` classes.
- Use the interfaces from `inwebo/open-resume-model` (a dependency) to program against contracts.
- Access relationships like `Basics -> profiles`, `Basics -> work`, etc., as exposed by the base classes.

For specific properties and methods, inspect the entities in `src/Entity`. Example files:
- `src/Entity/Basics.php`
- `src/Entity/Profile.php`
- `src/Entity/Work.php`
- `src/Entity/Volunteer.php`

---

### Configuration reference
The bundle exposes the following config root with an `entities` section inside:

```
inwebo_open_resume:
  entities:
    award:       'FQCN required'
    certificate: 'FQCN required'
    education:   'FQCN required'
    interest:    'FQCN required'
    language:    'FQCN required'
    location:    'FQCN required'
    profile:     'FQCN required'
    project:     'FQCN required'
    publication: 'FQCN required'
    reference:   'FQCN required'
    skill:       'FQCN required'
    volunteer:   'FQCN required'
    work:        'FQCN required'
```

All listed keys are supported; each value must be a non-empty string (your concrete entity’s FQCN).

---

### Development (this repository)

Clone and install dev dependencies:

```
git clone https://github.com/inwebo/open-resume-bundle.git
cd open-resume-bundle
composer install
```

Available Composer scripts:
- `composer run php-cs-fixer` — run PHP-CS-Fixer on `src/` with risky rules enabled
- `composer run php-stan` — run PHPStan (config: `phpstan.neon`)

---

### Scripts
Defined in `composer.json`:

```
{
  "scripts": {
    "php-cs-fixer": "vendor/bin/php-cs-fixer fix src --allow-risky=yes",
    "php-stan": "vendor/bin/phpstan analyse -c phpstan.neon"
  }
}
```

Run them with:

```
composer run php-cs-fixer
composer run php-stan
```

---

### Environment variables
This bundle itself does not require specific environment variables. It relies on the host Symfony application’s standard configuration (e.g., database connection via `DATABASE_URL` for Doctrine).

TODO:
- Document any bundle-specific env toggles if/when added in future versions.

---

### Tests
There are no tests in this repository at the moment.

TODO:
- Add unit tests and/or integration tests for entity contracts and configuration.

---

### Project structure
Relevant files and directories:
- `src/` — bundle code
  - `InweboOpenResumeBundle.php` — bundle class; config definition and Doctrine mapping prepend
  - `Entity/` — Doctrine mapped superclasses (e.g., `Basics`, `Profile`, `Work`, `Volunteer`, ...)
  - `Model/` — shared model traits (e.g., `HasBasicTrait`)
- `composer.json` — package metadata, constraints, and scripts
- `phpstan.neon` — static analysis configuration
- `LICENSE` — GPL-3.0-or-later
- `CHANGELOG.md` — change history
- `README.md` — this file

---

### License
GPL-3.0-or-later. See the `LICENSE` file for details.
