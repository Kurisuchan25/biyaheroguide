# Database Setup Instructions for Biyahero

This guide will help you set up the MySQL database for the Biyahero project.

## Prerequisites
- XAMPP installed and running
- MySQL service enabled in XAMPP

## Step 1: Import the Database Schema

1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click on the "New" button to create a new database
3. Enter `biyahero_db` as the database name
4. Select "utf8mb4_unicode_ci" as the collation
5. Click "Create"

6. Select the `biyahero_db` database
7. Click on the "Import" tab
8. Click "Choose File" and select `database/schema.sql`
9. Click "Go" at the bottom

The schema will create the following tables:
- `users` - User accounts
- `subscriptions` - Subscription plans and status
- `fare_routes` - Fare calculation data
- `user_sessions` - Authentication sessions

## Step 2: Verify the Database

After importing, verify that all tables were created:
- Click on the `biyahero_db` database
- You should see 4 tables in the left sidebar

## Step 3: Test the API Endpoints

### Test Authentication API

**Register a new user:**
```bash
curl -X POST http://localhost/biyaheroguide/api/auth.php?action=register \
  -H "Content-Type: application/json" \
  -d '{"email":"test@example.com","password":"test123456","firstName":"Test","lastName":"User"}'
```

**Login:**
```bash
curl -X POST http://localhost/biyaheroguide/api/auth.php?action=login \
  -H "Content-Type: application/json" \
  -d '{"email":"test@example.com","password":"test123456"}'
```

### Test Subscription API

**Get subscription status** (requires session token from login):
```bash
curl -X GET http://localhost/biyaheroguide/api/subscription.php?action=status \
  -H "Authorization: Bearer YOUR_SESSION_TOKEN"
```

**Activate trial:**
```bash
curl -X POST http://localhost/biyaheroguide/api/subscription.php?action=activate_trial \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_SESSION_TOKEN" \
  -d '{"plan":"premium"}'
```

## Step 4: Update Configuration (if needed)

If your MySQL credentials are different from the default, edit `api/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');        // Change if needed
define('DB_PASS', '');            // Change if needed
define('DB_NAME', 'biyahero_db');
```

## Step 5: Test the Application

1. Open `http://localhost/biyaheroguide/biyahero/landingpage/login.html` in your browser
2. Try registering a new account
3. Login with the account
4. Navigate to the fare calculator
5. The subscription modal should appear and work with the database

## Troubleshooting

**Connection Error:**
- Ensure MySQL is running in XAMPP
- Check that the database name in config.php matches the created database
- Verify credentials in config.php

**API Not Responding:**
- Check that PHP is enabled in XAMPP
- Verify the file paths are correct
- Check browser console for JavaScript errors

**Session Issues:**
- Clear browser cookies and localStorage
- Ensure the session token is being stored correctly

## Database Schema Overview

### Users Table
- `id` - Primary key
- `email` - User email (unique)
- `password` - Hashed password
- `first_name` - User's first name
- `last_name` - User's last name
- `created_at` - Registration timestamp
- `updated_at` - Last update timestamp

### Subscriptions Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `plan` - 'free', 'basic', or 'premium'
- `subscription_status` - 'new', 'trial', 'active', or 'expired'
- `trial_start_date` - Trial start timestamp
- `trial_end_date` - Trial end timestamp
- `payment_date` - Payment timestamp
- `payment_amount` - Payment amount
- `ad_count` - Number of ads shown
- `fare_calc_count` - Number of fare calculations
- `trial_activated` - Boolean flag

### Fare Routes Table
- `id` - Primary key
- `origin` - Starting location
- `destination` - Ending location
- `mode` - Transport mode (jeepney, tricycle, etc.)
- `base_fare` - Base fare amount
- `fare_range_low` - Low end of fare range
- `fare_range_high` - High end of fare range
- `travel_time` - Estimated travel time
- `steps` - Route steps (text)

### User Sessions Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `session_token` - Unique session token
- `expires_at` - Session expiration timestamp
- `created_at` - Session creation timestamp
