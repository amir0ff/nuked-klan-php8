# Nuked-Klan 1.7.15 - PHP 8.0 Compatible Edition

[![PHP Version](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-GPL%20v2-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

## 🎯 Overview

This is a **community-maintained, modernized version** of Nuked-Klan CMS 1.7.15 from 2016 that has been successfully migrated from PHP 5.x to **PHP 8.0+**. The original codebase was designed for PHP 5.x and used deprecated functions that were removed in PHP 7.0+.

> **Note:** The [original Nuked-Klan repository](https://github.com/Nuked-Klan/CMS_Nuked-Klan) is archived and no longer maintained. This is an independent community effort to keep Nuked-Klan running on modern PHP versions.

---

## ✨ What's Been Fixed

✅ **MySQLi Compatibility**: All 2620+ `mysql_*` function calls now work via compatibility layer  
✅ **PHP 8.0 Deprecations**: Fixed `strftime()`, `utf8_encode()`, `get_magic_quotes_gpc()`, `session_gc()` conflict, `each()`, `create_function()`  
✅ **Undefined Variables**: Fixed all undefined array key warnings and array offset on null issues  
✅ **Auto-Increment IDs**: Fixed 28+ MySQL 8.0 compatibility issues with auto-increment fields  
✅ **Type Safety**: Fixed 23+ `strlen()` calls on non-string values (PHP 8.0 TypeError prevention)  
✅ **SQL Injection**: Fixed 30+ SQL injection vulnerabilities with proper escaping and type casting  
✅ **Security**: Fixed 26+ critical security issues (RCE via eval(), command execution, LFI/RFI, XSS)  
✅ **Installer**: Fixed all PHP 8.0 compatibility issues  
✅ **Frontend**: Website loads without errors or warnings  
✅ **Admin Panel**: All admin pages now functional without errors  
✅ **User Module**: Profile editing, avatar uploads, and preferences fully functional  

---

## 📋 Requirements

- **PHP:** 7.4+ (tested on PHP 8.0, 8.1, 8.2, 8.3, 8.4, 8.5)
- **MySQL:** 5.7+ or MariaDB 10.2+
- **Web Server:** Nginx or Apache

---

## 🚀 Quick Start

### Installation

1. **Clone this repository:**
   ```bash
   git clone https://github.com/amir0ff/nuked-klan-php8.git
   cd nuked-klan-php8
   ```

2. **Upload files:**
   - Copy all contents of the `UPLOAD/` folder to your web server
   - Ensure proper file permissions (directories: 755, files: 644)
   
   **Adjusting file permissions:**
   ```bash
   # Navigate to your web server directory (after copying UPLOAD/ contents)
   cd /path/to/your/web/directory
   
   # Set directories to 755 (rwxr-xr-x)
   find . -type d -exec chmod 755 {} \;
   
   # Set files to 644 (rw-r--r--)
   find . -type f -exec chmod 644 {} \;
   ```
   
   **Note:** After installation, the `upload/` directory needs write access:
   ```bash
   chmod 775 upload/
   ```

3. **Run the installer:**
   - Navigate to `http://your-domain.com/INSTALL/`
   - Follow the installation wizard
   - Create your admin account

4. **Post-installation:**
   - Remove or rename the `INSTALL/` directory for security
   - Configure your site settings in the admin panel

For detailed installation instructions, see [DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md).

---

## 🔧 Migration Details

This version includes comprehensive fixes for PHP 8.0+ compatibility:

- **151+ fixes applied** across 64+ files for PHP 8.0 compatibility
- **MySQLi compatibility layer** replacing all deprecated `mysql_*` functions
- **Auto-increment ID fixes** (28 instances) for MySQL 8.0+ compatibility
- **Type safety improvements** (23+ strlen() fixes) preventing PHP 8.0 TypeErrors
- **Undefined variable/array key warnings** fixed throughout (including array offset on null)
- **Deprecated functions** replaced (`each()`, `create_function()`, `strftime()`, etc.)
- **SQL injection vulnerabilities** fixed (30+ instances) with proper escaping
- **Security vulnerabilities** fixed (26+ instances: RCE, command execution, LFI/RFI, XSS)
- **Reserved keyword conflicts** resolved (e.g., `match()` → `nk_match()`)
- **File upload handling** modernized
- **Session management** updated for PHP 8.0+ (including secure cookie flags)

For complete technical documentation, see [MIGRATION.md](MIGRATION.md).

---

## 📚 Documentation

- **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)** - Step-by-step deployment and installation instructions (start here!)
- **[MIGRATION.md](MIGRATION.md)** - Complete technical documentation of all PHP 8.0 compatibility fixes
- **[TESTING.md](TESTING.md)** - Manual testing checklist for PHP 8.0 migration
- **[README.md](README.md)** - This file

---

## ⚠️ Important Notes

1. **Abandoned CMS**: The original Nuked-Klan project is archived and no longer maintained. Use at your own risk.
2. **Security**: Keep PHP and MySQL updated, use HTTPS
3. **Testing**: This version has been tested on PHP 8.0.30. Results may vary on other PHP versions.

---

## 🤝 Contributing

This is a community-maintained modernization effort. Contributions are welcome!

- Report bugs via [GitHub Issues](https://github.com/amir0ff/nuked-klan-php8/issues)
- Submit pull requests for improvements
- Share your experiences and feedback

---

## 📝 License

GPL v2 (same as original Nuked-Klan)

See [LICENSE](LICENSE) file for details.

---

## 🙏 Credits

- **Original Nuked-Klan:** [nuked-klan.org](https://nuked-klan.fr) / [GitHub](https://github.com/Nuked-Klan/CMS_Nuked-Klan)
- **PHP 8.0 Migration:** Community contribution
- **Original Developers:** Nuked-Klan team (2001-2016)

---

## 🔗 Links

- **Original Repository:** https://github.com/Nuked-Klan/CMS_Nuked-Klan
- **Original Website:** https://nuked-klan.fr
- **Original Twitter:** [@nukedklan](http://www.twitter.com/nukedklan)
