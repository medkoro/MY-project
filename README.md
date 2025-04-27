# KidsLearn

<p align="center">
<img src="kidslearn.jpg" width="400" alt="KidsLearn Logo">
</p>

## About KidsLearn

KidsLearn is an educational platform designed to make learning fun and engaging for children. Built with Laravel and modern web technologies, it provides an interactive learning environment with various educational resources and activities.

## Project Structure

- `app/` - Contains the core code of the application
  - `Models/` - Database models and relationships
  - `Http/` - Controllers, middleware, and form requests
  - `Providers/` - Service providers for the application

- `config/` - All configuration files for the application

- `database/` - Database migrations and seeders

- `public/` - Publicly accessible files (CSS, JavaScript, images)

- `resources/` - Frontend resources (views, raw assets, language files)

- `routes/` - All route definitions for the application

- `storage/` - Application storage (logs, cache, uploaded files)

- `tests/` - Automated tests

- `vendor/` - Composer dependencies

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL or PostgreSQL
- Git

## Installation

1. Clone the repository:
```bash
git clone https://github.com/medkoro/MY-project.git
cd MY-project
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env` file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kids_learning
DB_USERNAME=root
DB_PASSWORD=
```

7. Run database migrations:
```bash
php artisan migrate
```

8. Seed the database (optional):
```bash
php artisan db:seed
```

9. Start the development server:
```bash
php artisan serve
```

10. In a separate terminal, start Vite for frontend assets:
```bash
npm run dev
```

## Development

- The application will be available at `http://localhost:8000`
- Vite development server runs at `http://localhost:5173`

## Admin Access

To access the admin panel, use the following credentials:

```
URL: http://localhost:8000/admin/dashboard
Email: admin@example.com
Password: password
```

If you've used the database seeder, the above credentials should work out of the box. Otherwise, you'll need to create an admin user by registering a regular user and then manually updating the `is_admin` field to `1` in the database.

## Test Accounts

For testing purposes, you can use these pre-configured accounts:

```
Regular User:
Email: user@example.com
Password: password

Teacher Account:
Email: teacher@example.com
Password: password
```

## Logs and Debugging

### Application Logs
Application logs are stored in the `storage/logs` directory. To view the latest logs:

```bash
tail -f storage/logs/laravel.log
```

### Test Logs
Test-specific logs are generated when running the test suite and can be found in:

```bash
storage/logs/test.log
```

To enable more detailed test logging, modify your `.env.testing` file:

```
LOG_LEVEL=debug
```

### Admin Activity Logs
All admin actions are logged in the database using the `activity_logs` table. You can view these logs through the admin dashboard under the "Recent Activities" section.

To manually query the admin logs from the database:

```bash
php artisan tinker
>>> App\Models\ActivityLog::with('user')->latest()->get();
```

## Testing

Run the test suite:
```bash
php artisan test
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, email [support@kidslearn.com](mailto:support@kidslearn.com) or open an issue in the repository.

## Custom CSS & JavaScript

- The `.highlight` CSS class adds a yellow highlight effect to any element.
- Add the `highlight-on-click` class to any HTML element to make it highlight when clicked (see resources/js/app.js for details).
