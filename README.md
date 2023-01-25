# Ascensor Full Stack Developer Assessment

## Outline:
- Create a blog website with admin panel for blog posts & categorisation.

## Technology Used:
- Laravel,
- Vue3,
- Vite,
- Inertia,
- MySQL/SQLite,

## Set up:

To run the project, you will need to:

1. Clone the project from GitHub,
2. Install composer dependencies (`composer install`),
3. Configure the environment file (`cp .env.example .env`),
   1. You will need to either link to a MySQL instance or set up an SQLite database,
4. You will then need to migrate the database using `php artisan migrate`,
5. You will need to use a tool like `php artisan serve` to run the site locally.

## Adding a test user and seeding data:

Once you have set up the project using the above, you can then either manually register a new user
and start using the platform, or you can create a test user and seed some example data.
To do this, you will need to run the seed command: `php artisan db:seed`. 
After you have seeded the database, you will receive a temporary password via the command line.
You can use this to log in and use the platform, although it is strongly recommended that you reset your
password afterwards.

## Running tests:

Within the project, I have generally tried to take a Test Driven Development (TDD) approach so that 
the project is sufficiently tested.

To the run the test suite, use `php artisan test`. This will run the feature and unit tests written in PestPHP.

## Next Steps:

The next steps for the project would be to add Cypress and Jest tests so that the UI can be fully tested using an automated test suite.
