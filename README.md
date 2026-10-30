# Bakuna Tracker – Purok Payot

Lab Activity 9 for 4-334 Full-Stack Web Development (Ateneo de Davao University, 1st Semester 2026).

A vaccination schedule dashboard for the Barangay Matina Crossing Health Center in Davao City. It is built with Laravel, Blade views, Tailwind CSS v3, and Vite. Schedule data comes from a seeded SQLite database.

## Features

- Master layout with `@yield`, a shared nav, and a footer
- Login with a seeded user (`@auth` / `@guest` nav, protected routes, logout)
- Dashboard with an alert banner (`@if` / `@elseif` / `@else`), four stat cards, and a schedule table
- Full schedule page using `@forelse` and `$loop`
- Blade components: `<x-stat-card>` and `<x-panel>`
- Responsive layout using Tailwind utility classes

## Pages

| URL | Description |
|-----|-------------|
| `/login` | Sign in |
| `/dashboard` | Stats, alerts, and schedule overview (requires login) |
| `/schedule` | Full vaccination schedule (requires login) |

## Seeded login

| Field | Value |
|-------|-------|
| Name | Alexzander |
| Email | `nurse.payot@bakuna.test` |
| Password | `bakuna2026` |

## How to run

Requirements: PHP, Composer, Node.js, and npm.

```bash
composer install
npm install
copy .env.example .env        # on Mac/Linux: cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
```

Then start the app using two terminals, both inside the project folder:

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Open http://127.0.0.1:8000 and sign in with the seeded login above.

For a production build, run `npm run build`, which creates `public/build/manifest.json`.

### Notes

- The project uses SQLite (`DB_CONNECTION=sqlite`). If `database/database.sqlite` is missing, create it with `New-Item database\database.sqlite` (PowerShell) or `touch database/database.sqlite` (Mac/Linux), then run `php artisan migrate:fresh --seed` again.
- If you see "Vite manifest not found", make sure `npm run dev` is running, or run `npm run build`.
- Tailwind v3 is installed through PostCSS. The default Tailwind v4 setup that comes with the Laravel skeleton was removed.

## Seeded data

The seeder adds 6 vaccination records (BCG, Pentavalent, OPV, MMR, Anti-Flu, Hepatitis B) with a mix of Scheduled, Done, and Overdue statuses. One record is dated on my birthday, May 20, 2026.

## Author

Alexzander Rojan Payot