
### Preamble

~This implementation uses a basic fusebox router for each controller in the absence of a routing library or framework.
Two are used intentionally as each could be a separate module in a production system that could be routed through a 
single Front Controller.~

The Index Controller acts as a Front Controller to load the start and end views. The Ajax Controller simulates what 
could be a separate API

### Setup

Clone repo:
// todo: add URL

From the project directory load libraries;
`composer install`

Modify `phinx,yml` with credentials for database.

Initialise db; `vendor/bin/phinx migrate -e development`

Launch application; `composer serve`

Open in browser; `http://localhost:8080:`

### Summary

Normally I would build the backend using Laminas (formerly Zend Framework3). I'm a strong believer in modular 
API-centric code so that the required business logic can use the most suitable technology for purpose. It also helps 
to reduce legacy technical debt by making upgrades incremental and fully tested in isolation.

PSR-4 name spacing is used. Code is formatted using PSR-2. An optional trait can be included for a PSR-3 logger. 