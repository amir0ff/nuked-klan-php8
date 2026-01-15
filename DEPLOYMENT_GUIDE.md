# Nuked-Klan 1.7.15 Deployment & Installation Guide

## Overview

Complete step-by-step guide for deploying and installing the patched Nuked-Klan 1.7.15 CMS on PHP 8.0.

**Status:** ✅ **DEPLOYMENT COMPLETE** - Successfully deployed and installed on January 15, 2026

---

## Prerequisites

- PHP 7.4+ (recommended: PHP 8.0)
- MySQL 5.7+ or MariaDB 10.2+
- Nginx or Apache web server
- ~50MB disk space

---

## Step 1: Prepare Your Server

### 1.1 Create MySQL Database

Create a MySQL database using your preferred method (phpMyAdmin, command line, or your hosting control panel):

1. Create a new database
2. Create a database user with full privileges on that database
3. Note down:
   - Database host (usually `127.0.0.1` or `localhost`)
   - Database port (usually `3306`)
   - Database name
   - Database username
   - Database password

**Example using MySQL command line:**
```bash
mysql -u root -p
CREATE DATABASE nuked_klan CHARACTER SET latin1 COLLATE latin1_swedish_ci;
CREATE USER 'nuked_user'@'localhost' IDENTIFIED BY 'your_strong_password';
GRANT ALL PRIVILEGES ON nuked_klan.* TO 'nuked_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 1.2 Set PHP Version

Ensure your server is running PHP 7.4 or higher (PHP 8.0 recommended). The method to set PHP version depends on your hosting environment:

- **Shared hosting:** Usually set via control panel
- **VPS/Dedicated:** Configure via your web server (Apache/Nginx) and PHP-FPM
- **Command line check:** `php -v`

---

## Step 2: Upload Files

### 2.1 Upload Files to Web Directory

**Option A: Using SCP/SFTP**
```bash
# Upload all files from UPLOAD/ directory to your web root
# Example: /path/to/your/webroot/
```

**Option B: Using Command Line (if you have SSH access)**
```bash
cd /path/to/nuked-klan-patched
sudo cp -r UPLOAD/* /path/to/your/webroot/
sudo chown -R www-data:www-data /path/to/your/webroot/
# Or use your web server user (e.g., apache:apache, nginx:nginx)
```

### 2.2 Set Permissions
```bash
cd /path/to/your/webroot/
chmod 755 upload/
chmod 755 themes/
chmod 755 modules/
chmod 644 *.php
```

---

## Step 3: Configure Web Server (If Needed)

### For Nginx

If you encounter routing issues, add this to your nginx vhost configuration:

```nginx
# Nuked-Klan CMS - Explicit INSTALL directory handling
location = /INSTALL/ {
    rewrite ^ /INSTALL/index.php last;
}

# Main location block
location / {
    try_files $uri $uri/ /index.php?$query_string;
    index index.php index.html;
}

# PHP handler
location ~ \.php$ {
    include fastcgi_params;
    fastcgi_intercept_errors on;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    try_files $uri =404;
    fastcgi_pass unix:/var/run/php/php8.0-fpm.sock; # Adjust to your PHP-FPM socket
}
```

### For Apache

Ensure `mod_rewrite` is enabled and add this to your `.htaccess` or virtual host:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?$1 [L,QSA]
</IfModule>
```

---

## Step 4: Run Installation Wizard

### 4.1 Access Installer
1. Open your browser: `https://your-domain.com/INSTALL/index.php`
2. The installer should load automatically

### 4.2 Follow Installation Steps

**Step 1: Language Selection**
- Select your language (English or French)
- Click **Next**

**Step 2: Installation Type**
- Choose **"Assisted installation"** (recommended for first-time setup)
- Click **Next**

**Step 3: Database Configuration**
Enter your database credentials:
- **Database Host:** `127.0.0.1` (or `localhost`)
- **Database Port:** `3306`
- **Database Name:** `your_database_name` (or your database name)
- **Database User:** `your_username` (or your database username)
- **Database Password:** (your database password)
- **Table Prefix:** `nuked` (default) or `wow` (to match old setup)

Click **Test Connection** to verify, then click **Next**

**Step 4: Database Creation**
- Click **Start** to create all database tables
- Wait for all 57 tables to be created successfully
- You'll see "Installation completed successfully!"

**Step 5: Admin Account Creation**
- Enter admin account details:
  - **Username:** (e.g., `YourUsername`)
  - **Email:** (your email address)
  - **Password:** (strong password)
  - **Level:** 9 (Administrator)
- Click **Create Account**

**Step 6: Installation Complete**
- Installation is complete!
- You'll be redirected to the main site

---

## Step 5: Post-Installation Security

### 5.1 Remove INSTALL Directory

**CRITICAL:** Remove or disable the INSTALL directory after installation:

```bash
# Option 1: Remove completely (recommended)
sudo rm -rf /path/to/your/webroot/INSTALL

# Option 2: Rename (if you want to keep it for reference)
sudo mv /path/to/your/webroot/INSTALL /path/to/your/webroot/INSTALL.disabled
```

### 5.2 Secure Configuration File

```bash
# Set restrictive permissions on conf.inc.php
sudo chmod 600 /path/to/your/webroot/conf.inc.php
```

### 5.3 Disable Error Display (If Enabled)

If you enabled `display_errors` for debugging, disable it:

```bash
# Check if display_errors is enabled
sudo grep "display_errors" /path/to/your/webroot/index.php

# If found, remove or comment out the line
```

---

## Step 6: Configure Your Site

### 6.1 Log into Admin Panel

1. Visit: `https://your-domain.com/index.php?file=Admin`
2. Enter your admin credentials
3. Click **Login**

### 6.2 Configure Site Settings

1. Go to **Admin → Settings**
2. Configure:
   - **Site Name:** Your site name
   - **Site Description:** Your site description
   - **Default Theme:** Select a theme (default is "Impact_Nk")
   - **Site URL:** `https://your-domain.com/`
   - **Other preferences** as needed
3. Click **Save**

### 6.3 Test the Frontend

1. Visit: `https://your-domain.com/`
2. The default theme should display
3. Verify all modules are working

---

## Step 7: Customize Your Installation (Optional)

### Update Theme URLs

If you have custom themes with hardcoded URLs, update them:

```bash
nano /path/to/your/webroot/themes/YourTheme/theme.php
```

Search for hardcoded domain names and replace with your domain or use relative paths.

---

## File Structure

```
your-web-directory/
├── index.php (entry point)
├── nuked.php (core functions)
├── globals.php (security & globals)
├── conf.inc.php (database config - created during install)
├── Includes/
│   ├── mysqli_compat.php (NEW - PHP compatibility layer)
│   └── ... (other includes)
├── themes/
│   └── Impact_Nk/ (default theme)
│   └── ... (other themes if installed)
├── modules/ (all CMS modules)
├── upload/ (user uploads directory)
└── INSTALL/ (remove after installation)
```

---

## Configuration File

After installation, `conf.inc.php` will contain:

```php
<?php
$nk_version = '1.7.15';
$global['db_host'] = '127.0.0.1';
$global['db_user'] = 'your_username';
$global['db_pass'] = 'your_db_password';
$global['db_name'] = 'your_database_name';
$db_prefix = 'nuked'; // or 'wow' if you used that prefix

define('NK_INSTALLED', true);
define('NK_OPEN', true);
define('NK_GZIP', false);
define('HASHKEY', 'your-hash-key-here');
?>
```

---

## Troubleshooting

### Issue: 500 Internal Server Error
**Check:**
1. PHP error logs (location depends on your server setup)
2. File permissions (directories: 755, files: 644)
3. PHP version is 7.4 or higher
4. `conf.inc.php` exists and has correct credentials

### Issue: Database Connection Error
**Check:**
1. Database credentials in `conf.inc.php`
2. MySQL service is running
3. Database user has proper permissions
4. Database host is correct (usually `localhost` or `127.0.0.1`)

### Issue: Theme Not Displaying
**Check:**
1. Theme directory exists in `themes/`
2. Theme has `theme.php` file
3. Theme is selected in admin panel
4. File permissions on theme directory (755)

### Issue: Uploads Not Working
**Check:**
1. `upload/` directory permissions (755 or 775)
2. PHP `upload_max_filesize` and `post_max_size` settings
3. Directory is writable by web server user

### Issue: Installer Shows MySQL Extension Error
**Solution:** This is expected. The installer checks for the `mysql` extension, but PHP 8.0 uses the compatibility layer. You can safely proceed with installation.

### Issue: JavaScript Errors in Installer
**Solution:** The installer JavaScript files have been patched with fallback i18n objects. Clear your browser cache and reload the page.

---

## Security Recommendations

1. **Remove INSTALL directory** after installation
2. **Set proper file permissions**:
   - Directories: 755
   - PHP files: 644
   - Config files: 600 (if possible)
3. **Use HTTPS** (SSL certificate)
4. **Keep PHP updated** (7.4 or 8.0 recommended)
5. **Regular backups** of database and files
6. **Monitor error logs** regularly

---

## Post-Deployment Checklist

- [x] Installation completed successfully
- [x] INSTALL directory removed/renamed
- [x] Admin account created and tested
- [x] Site settings configured
- [x] Default theme selected
- [x] File uploads tested
- [x] Database backup created
- [x] Error logging enabled
- [x] HTTPS/SSL configured (if available)
- [x] Website loads without errors or warnings

---

## Current Deployment Status

**Successfully Deployed:** January 15, 2026  
**PHP Version:** 8.0.30 (PHP-FPM)  
**Database:** your_database_name  
**Admin Account:** YourUsername (Level 9)  
**Status:** ✅ **FULLY FUNCTIONAL**

**Completed:**
- ✅ Files uploaded and deployed
- ✅ PHP 8.0 configured
- ✅ MySQL database created
- ✅ Installation wizard completed
- ✅ All 57 database tables created
- ✅ Admin account created
- ✅ Configuration file generated
- ✅ Website frontend fully functional
- ✅ All PHP 8.0 compatibility issues resolved
- ✅ No errors or warnings

---

## Next Steps

1. **Create Content:**
   - Add news articles
   - Configure modules
   - Set up user accounts

2. **Customize:**
   - Edit theme files if needed
   - Configure modules
   - Set up blocks and widgets

3. **Backup:**
   - Create regular database backups
   - Backup theme customizations
   - Document any custom changes

4. **Security:**
   - Keep PHP and MySQL updated
   - Monitor error logs
   - Regular security audits

---

## Support

For issues specific to this patched version:
- Check `MIGRATION_GUIDE.md` for technical details
- Review PHP error logs
- Verify all files were uploaded correctly
- Test with PHP 8.0 first (most compatible)

---

**Deployment Complete!** Your Nuked-Klan CMS is now fully functional on PHP 8.0! 🎉
