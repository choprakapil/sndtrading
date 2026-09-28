# SND Trading Website

Official website and admin panel for SND Trading.

## Database
- Full database dump is included in [`sndtradi_snd_user_new.sql`](./sndtradi_snd_user_new.sql).
- Tables include products, categories, subcategories, services, turnkey projects, blogs, team members, contact inquiries, and admin credentials.

## Local Development
Run with PHP built-in server:
```bash
php -S localhost:8000 router.php
```
Access at `http://localhost:8000`.

## Production & cPanel Deployment
1. Upload website files to `public_html`.
2. Import `sndtradi_snd_user_new.sql` into MySQL database.
3. Configure database credentials in `inc/function.php`.

## Vercel Deployment
This repository is configured for Vercel using `vercel.json` and `vercel-php`.
If using the cPanel MySQL database from Vercel:
1. Log in to cPanel.
2. Go to **Databases > Remote MySQL**.
3. Add `%` to allowed access hosts so Vercel serverless IPs can reach the database.
4. Optionally set environment variables in Vercel project settings:
   - `DB_HOST`
   - `DB_USER`
   - `DB_PASSWORD`
   - `DB_NAME`
   - `DB_PORT`
