# Nuked-Klan PHP 8.0 Migration Guide - Complete Technical Documentation

## Overview

This document provides complete technical documentation of the migration of Nuked-Klan CMS v1.7.15 from PHP 5.x to PHP 8.0, including all fixes applied, issues encountered, and solutions implemented.

**Migration Date:** January 15, 2026  
**Status:** ✅ **COMPLETE** - Website fully functional on PHP 8.0  
**PHP Version:** 8.0.30 (PHP-FPM)  
**Target Environment:** Your server environment, Nginx, MySQL

---

## Migration Summary

### Original Setup
- **Old Version:** Nuked-Klan 1.7.9 (PHP 5.x)
- **Location:** `/path/to/your/webroot/`
- **Database:** Lost (recreated fresh)
- **Customizations:** Any custom themes or modifications from the original installation

### New Setup
- **Version:** Nuked-Klan 1.7.15 (patched for PHP 8.0)
- **Location:** `/path/to/your/webroot/`
- **Database:** `your_database_name` (fresh installation)
- **Table Prefix:** `nuked`
- **Admin Account:** `YourUsername` (level 9)

---

## All PHP 8.0 Compatibility Fixes Applied

### 1. MySQL Extension Deprecation
**Problem:** PHP 8.0 removed the deprecated `mysql_*` functions.

**Solution:** Created a comprehensive MySQLi compatibility layer.

**Files Created:**
- `Includes/mysqli_compat.php` (NEW - 300+ lines)

**Files Modified:**
- `index.php` - Added `include_once('Includes/mysqli_compat.php');`
- `INSTALL/index.php` - Added `require_once dirname(__DIR__) . "/Includes/mysqli_compat.php";`

**Functions Implemented:**
- `mysql_connect()` → `mysqli_connect()`
- `mysql_select_db()` → `mysqli_select_db()`
- `mysql_query()` → `mysqli_query()`
- `mysql_fetch_array()` → `mysqli_fetch_array()`
- `mysql_fetch_assoc()` → `mysqli_fetch_assoc()`
- `mysql_fetch_row()` → `mysqli_fetch_row()`
- `mysql_num_rows()` → `mysqli_num_rows()`
- `mysql_affected_rows()` → `mysqli_affected_rows()`
- `mysql_result()` → Custom implementation using `mysqli_data_seek()`
- `mysql_real_escape_string()` → `mysqli_real_escape_string()`
- `mysql_escape_string()` → Alias for `mysql_real_escape_string()`
- `mysql_error()` → `mysqli_error()`
- `mysql_errno()` → `mysqli_errno()`
- `mysql_close()` → `mysqli_close()`
- `mysql_insert_id()` → `mysqli_insert_id()`
- `mysql_free_result()` → `mysqli_free_result()`
- `mysql_data_seek()` → `mysqli_data_seek()`
- `mysql_set_charset()` → `mysqli_set_charset()` (NEW)
- `mysql_get_server_info()` → `mysqli_get_server_info()` (NEW)

---

### 2. Magic Quotes Functions Deprecation
**Problem:** `get_magic_quotes_gpc()` and `set_magic_quotes_runtime()` removed in PHP 7.4+.

**Files Modified:**
- `globals.php`
  - Removed `get_magic_quotes_gpc()` check
  - Removed `set_magic_quotes_runtime(0)` call
  - Updated `SecureVar()` function to always apply `addslashes()`

---

### 3. strftime() Deprecation (PHP 8.1)
**Problem:** `strftime()` deprecated in PHP 8.1.

**Solution:** Created `nk_strftime()` compatibility function using `IntlDateFormatter`.

**Files Modified:**
- `nuked.php`
  - Added `nk_strftime()` function with IntlDateFormatter fallback
  - Replaced all `strftime()` calls with `nk_strftime()`

---

### 4. utf8_encode() Deprecation (PHP 8.2)
**Problem:** `utf8_encode()` deprecated in PHP 8.2.

**Solution:** Created `nk_utf8_encode()` compatibility function using `mb_convert_encoding`.

**Files Modified:**
- `nuked.php`
  - Added `nk_utf8_encode()` function
  - Replaced all `utf8_encode()` calls with `nk_utf8_encode()`

---

### 5. Curly Brace Array Access (PHP 8.0)
**Problem:** `$array{index}` syntax removed in PHP 8.0.

**Files Modified:**
- `INSTALL/includes/class/process.class.php` (line 772)
  - Changed: `$charPool{mt_rand(0, $poolLength)}`
  - To: `$charPool[mt_rand(0, $poolLength)]`

---

### 6. Required Parameter After Optional (PHP 8.0)
**Problem:** Required parameter `$callbackUpdateFunction` follows optional `$fieldId`.

**Files Modified:**
- `INSTALL/includes/class/dbTable.class.php` (line 519)
  - Changed: `applyUpdateFieldListToData($fieldId = 'id', $callbackUpdateFunction)`
  - To: `applyUpdateFieldListToData($callbackUpdateFunction, $fieldId = 'id')`
- `INSTALL/tables/*.php` (28 files)
  - Updated all function calls to match new parameter order

---

### 7. Undefined Array Key Warnings (PHP 8.0)
**Problem:** PHP 8.0 throws warnings for undefined array keys.

**Files Modified:**
- `globals.php` (line 69): `isset($_SERVER['QUERY_STRING'])`
- `index.php` (lines 89, 172, 228): Added isset checks for `$user` array, `$_REQUEST` arrays
- `INSTALL/index.php` (line 21): `isset($_SERVER['HTTP_HOST'])`
- `INSTALL/includes/autoload.php` (line 25): `isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])`
- `Includes/fatal_errors.php` (line 3): `isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])`
- `nuked.php` (lines 58, 64, 124, 294, 861): Added isset checks for `$nuked`, `$user`, `$_REQUEST` arrays
- `themes/Impact_Nk/theme.php` (lines 108, 115, 158, 172, 264): Added isset checks for `$complet`, `$module_aff_unique`, `$block` arrays
- `Includes/blocks/block_login.php` (lines 17, 52): Added isset checks for `$blok`, `$user` arrays
- `Includes/blocks/block_menu.php` (line 28): Added isset check for `$user[1]`
- `themes/Impact_Nk/blocks/test.php` (lines 10-14): Added isset checks for `$nb`, `$user` arrays
- `modules/Stats/blok.php` (line 65): Initialized `$counter = 0`
- `modules/News/index.php` (line 42): Added isset check for `$_REQUEST['p']` and type casting
- `nuked.php` (line 915): Added isset check for `$_GET['file']`

---

### 8. get_class() on Null (PHP 8.0)
**Problem:** `get_class()` throws TypeError when called on null.

**Files Modified:**
- `INSTALL/includes/class/process.class.php` (line 953)
  - Added null check: `if ($this->_view !== null && get_class($this->_view) == 'view')`

---

### 9. isset() on Expression (PHP 8.0)
**Problem:** Cannot use `isset()` on the result of an expression.

**Files Modified:**
- `Includes/fatal_errors.php` (lines 9, 21)
  - Created temporary variables before using in `define()`:
    ```php
    $errno_val = isset($errno) ? $errno : '';
    $errstr_val = isset($errstr) ? $errstr : '';
    $errline_val = isset($errline) ? $errline : '';
    $errfile_val = isset($errfile) ? $errfile : '';
    ```
  - Used variables in `ERROR_SQL` definition instead of direct `isset()` calls

---

### 10. session_gc() Function Conflict (PHP 8.0)
**Problem:** PHP 8.0 has built-in `session_gc()` function, causing redeclaration error.

**Files Modified:**
- `nuked.php` (line 213)
  - Renamed function: `session_gc()` → `nk_session_gc()`
  - Updated handler registration: `session_set_save_handler(..., 'nk_session_gc')`
  - Added `TMPSES_TABLE` constant checks in all session handler functions

---

### 11. JavaScript i18n Loading Issues
**Problem:** i18n JavaScript object not loading, causing form submission failures.

**Files Modified:**
- `INSTALL/media/js/setConfig.js`
  - Added fallback i18n object with all required translation keys
  - Added `window.i18n` global variable setup
- `INSTALL/media/js/runProcess.js`
  - Added fallback i18n object and `language` variable
- `INSTALL/views/fullPage.php`
  - Added cache-busting query string: `?v=<?php echo time() ?>`

---

### 12. Installer MySQL Extension Check
**Problem:** Installer checks for `mysql` extension which doesn't exist in PHP 8.0.

**Files Modified:**
- `INSTALL/includes/class/process.class.php` (lines 705-720)
  - Updated requirements check to detect `mysql_connect()` function (from compatibility layer) instead of extension

---

### 13. Theme and Language Safety Checks
**Files Modified:**
- `index.php` (lines 89-90)
  - Added safety checks before using `$theme` and `$language`:
    ```php
    if (!isset($theme)) $theme = isset($nuked['theme']) ? $nuked['theme'] : 'Impact_Nk';
    if (!isset($language)) $language = isset($nuked['langue']) ? $nuked['langue'] : 'english';
    ```

---

### 14. microtime() Non-Numeric Value Warning
**Problem:** `microtime()` returns string, causing non-numeric value warnings.

**Files Modified:**
- `index.php` (lines 58, 241-242)
  - Changed `microtime()` to `microtime(true)` to return float
  - Fixed calculation: `$mtime_end = microtime(true); $mtime = $mtime_end - $mtime;`
  - Added `number_format()` for display

---

### 15. Undefined Constant "titre"
**Problem:** `$block[titre]` should be `$block['titre']` (missing quotes).

**Files Modified:**
- `themes/Impact_Nk/theme.php` (line 264)
  - Changed: `$block[titre]` → `$block['titre']`

---

### 16. Admin Panel PHP 8.0 Compatibility Fixes
**Problem:** Multiple admin pages showing undefined array key warnings and fatal errors.

**Critical Fix - Reserved Keyword:**
- `modules/Wars/admin.php` (line 108)
  - **FATAL ERROR:** `match()` is a reserved keyword in PHP 8.0+
  - **Solution:** Renamed function `match()` → `nk_match()`
  - Updated function call in switch case (line 821)
  - All references updated to use new function name

**Admin Core Files:**
- `modules/Admin/phpinfo.php` (line 30)
  - Added `isset($_REQUEST['what'])` check before accessing array key
  
- `modules/Admin/user.php` (lines 519, 526, 535, 567-590, 595-629)
  - Fixed undefined `$_REQUEST['query']` with isset check and variable assignment
  - Fixed undefined `$_REQUEST['orderby']` with isset check and default value
  - Fixed undefined `$_REQUEST['p']` with isset check and type casting to int
  - Added proper default values for pagination and sorting
  - Fixed all orderby display checks in HTML output

- `modules/Admin/setting.php` (lines 385-386)
  - Fixed undefined `$_REQUEST['stats_share']` with isset check
  - Fixed undefined `$_REQUEST['inscription_avert']` with isset check
  - Added default values when keys are not set

- `modules/Admin/modules.php` (line 166)
  - Removed undefined `$nom` variable from header display
  - Variable was used but never defined in `main()` function scope

- `themes/Impact_Nk/admin.php` (line 364)
  - Fixed undefined `$_REQUEST['sub']` with isset check and default value
  - Added: `$sub = isset($_REQUEST['sub']) ? $_REQUEST['sub'] : 'index';`

- `Includes/nkStats.php` (lines 39, 80)
  - Fixed undefined `$server_ip` variable (line 39)
    - Added: `$server_ip_check = (strlen($nuked['server_ip'])>0) ? "set" : "";`
    - Updated reference to use `$server_ip_check`
  - Fixed undefined `$timediff` variable (line 80)
    - Added: `$timediff = isset($timediff) ? $timediff : 0;` before use

**Module Admin Files (Bulk Fixes via sed):**
- `modules/Comment/admin.php` (line 107)
  - Fixed `$_REQUEST['p']` with isset check: `if (!isset($_REQUEST['p']) || !$_REQUEST['p'])`

- `modules/Download/admin.php` (lines 533, 559-584)
  - Fixed `$_REQUEST['p']` with isset check and type casting
  - Fixed multiple `$_REQUEST['orderby']` occurrences with isset checks

- `modules/Gallery/admin.php` (lines 339, 364-402)
  - Fixed `$_REQUEST['p']` with isset check and type casting
  - Fixed multiple `$_REQUEST['orderby']` occurrences with isset checks

- `modules/Guestbook/admin.php` (line 118)
  - Fixed `$_REQUEST['p']` with isset check

- `modules/News/admin.php` (lines 29, 54-87)
  - Fixed `$_REQUEST['p']` with isset check and type casting
  - Fixed multiple `$_REQUEST['orderby']` occurrences with isset checks

- `modules/Sections/admin.php` (lines 28, 53-93)
  - Fixed `$_REQUEST['p']` with isset check and type casting
  - Fixed multiple `$_REQUEST['orderby']` occurrences with isset checks

- `modules/Textbox/admin.php` (line 120)
  - Fixed `$_REQUEST['p']` with isset check

- `modules/Links/admin.php` (lines 238, 264-284)
  - Fixed `$_REQUEST['p']` with isset check and type casting
  - Fixed multiple `$_REQUEST['orderby']` occurrences with isset checks

---

### 17. Theme Display and User Module Fixes
**Problem:** Multiple undefined array key warnings in theme display and user profile functionality.

**Theme Files:**
- `themes/Impact_Nk/theme.php` (lines 108, 115, 158, 172, 264, 275, 283, 301, 307)
  - Fixed undefined array key "User" and "News" in `$complet` and `$module_aff_unique` arrays
  - Added isset checks for `$_REQUEST['file']`, `$complet[$_REQUEST['file']]`, `$module_aff_unique[$_REQUEST['file']]`, and `$_REQUEST['page']`
  - Fixed undefined constant "titre" on line 264: Changed `$block[titre]` to `$block['titre']`
  - Applied fixes to `top()`, `opentable()`, and `closetable()` functions

**User Module Files:**
- `modules/User/index.php` (lines 2029, 1473-1490, 1386-1399, 1530-1534)
  - Fixed undefined array keys in `update_pref()` function call: Added isset checks with default empty strings for all `$_REQUEST` parameters
  - Fixed file upload handling: Added isset checks for `$_FILES['fichiernom']['name']` and `$_FILES['fichiernom']['size']`
  - Added `is_uploaded_file()` validation before `move_uploaded_file()`
  - **Critical Fix:** Avatar synchronization - Added code to update `USER_TABLE.avatar` when uploading via preferences page (was only updating `USER_DETAIL_TABLE.photo`, but account page displays from `USER_TABLE.avatar`)

**Pattern Applied:**
- All array key accesses use isset checks with default values
- File uploads validated with `is_uploaded_file()` before processing
- Database synchronization between related tables when needed

---

**Additional Admin Panel Fixes:**
- `modules/Comment/admin.php` (line 238)
  - Fixed undefined variable `$cid` in `module_com()` function
  - Removed unnecessary hidden input field (leftover from `edit_com()` function)
  
- `modules/Forum/admin.php` (line 938)
  - Fixed undefined variable `$checked2` when `forum_rank_team` is not "on"
  - Initialized `$checked1 = ""` and `$checked2 = ""` at start of `main_pref()` function
  - Both variables now always defined before use

- `modules/Wars/admin.php` (lines 108, 143, 146)
  - Fixed undefined variable `$status` used in "add" branch (only defined in "edit" branch)
  - Fixed undefined array key `$_REQUEST['nbr']` without isset check
  - Initialized `$status = 0` and `$nbr = 0` at start of `nk_match()` function
  - Added isset check: `$nbr = isset($_REQUEST['nbr']) ? (int)$_REQUEST['nbr'] : 0;`

**Pattern Applied:**
- All `$_REQUEST['p']` checks: `if (!isset($_REQUEST['p']) || !$_REQUEST['p'])` or `isset($_REQUEST['p']) ? (int)$_REQUEST['p'] : 1`
- All `$_REQUEST['orderby']` checks: `isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : ''`
- Type casting for pagination: `(int)$_REQUEST['p']` to prevent non-numeric warnings
- Default values provided for all undefined array keys
- Variables initialized at function start when used in multiple code paths

---

## Files Modified Summary

### Core Files (5 files)
- `index.php` - mysqli_compat include, error handling, theme/language safety checks, microtime fixes, user array checks
- `globals.php` - Fixed magic quotes, QUERY_STRING check
- `nuked.php` - Fixed strftime, utf8_encode, session_gc conflict, user array checks, GET array checks
- `Includes/mysqli_compat.php` - NEW: Complete MySQLi compatibility layer
- `Includes/fatal_errors.php` - Fixed isset() on expressions, undefined variables

### Installer Files (8 files)
- `INSTALL/index.php` - Added mysqli_compat include, HTTP_HOST check
- `INSTALL/includes/autoload.php` - Fixed HTTP_ACCEPT_LANGUAGE check
- `INSTALL/includes/class/process.class.php` - Fixed get_class() on null, MySQL check, parameter order, curly braces
- `INSTALL/includes/class/dbTable.class.php` - Fixed parameter order
- `INSTALL/tables/*.php` - Updated function calls (28 files)
- `INSTALL/media/js/setConfig.js` - Added i18n fallback
- `INSTALL/media/js/runProcess.js` - Added i18n and language fallback
- `INSTALL/views/fullPage.php` - Added cache-busting

### Theme & Block Files (6 files)
- `themes/Impact_Nk/theme.php` - Fixed array key checks, titre constant
- `themes/Impact_Nk/blocks/test.php` - Fixed array key checks
- `Includes/blocks/block_login.php` - Fixed array key checks, explode() fixes
- `Includes/blocks/block_menu.php` - Fixed user array checks
- `modules/Stats/blok.php` - Fixed counter initialization
- `modules/News/index.php` - Fixed REQUEST array checks, type casting

### Admin Panel Files (18+ files)
- `modules/Wars/admin.php` - Fixed match() reserved keyword (FATAL ERROR), undefined variables ($status, $nbr), REQUEST array checks
- `modules/Admin/phpinfo.php` - Fixed REQUEST array checks
- `modules/Admin/user.php` - Fixed REQUEST array checks, orderby handling, pagination
- `modules/Admin/setting.php` - Fixed REQUEST array checks
- `modules/Admin/modules.php` - Fixed undefined variable
- `themes/Impact_Nk/admin.php` - Fixed REQUEST array checks
- `Includes/nkStats.php` - Fixed undefined variables ($server_ip, $timediff)
- `modules/Comment/admin.php` - Fixed pagination, undefined variable ($cid)
- `modules/Download/admin.php` - Fixed pagination and sorting
- `modules/Gallery/admin.php` - Fixed pagination and sorting
- `modules/Guestbook/admin.php` - Fixed pagination
- `modules/News/admin.php` - Fixed pagination and sorting
- `modules/Sections/admin.php` - Fixed pagination and sorting
- `modules/Textbox/admin.php` - Fixed pagination
- `modules/Links/admin.php` - Fixed pagination and sorting
- `modules/Forum/admin.php` - Fixed undefined variables ($checked1, $checked2)

### Theme and User Module Files (2 files)
- `themes/Impact_Nk/theme.php` - Fixed undefined array keys (User, News), undefined constant (titre), all display functions
- `modules/User/index.php` - Fixed undefined array keys, file upload handling, avatar synchronization between tables

**Total Files Modified:** 67+ files (updated from 65+)

---

## Testing Checklist

- [x] Installer loads without errors
- [x] Database connection test works
- [x] All database tables created
- [x] Admin account created
- [x] Configuration file generated
- [x] Website frontend loads
- [x] Admin panel accessible
- [x] Admin settings page loads without errors
- [x] Admin user management page loads without errors
- [x] Admin modules page loads without errors
- [x] Admin theme management loads without errors
- [x] All module admin pages functional (News, Download, Gallery, etc.)
- [x] Wars admin page loads (was fatal error, now fixed)
- [x] User profile page loads without errors
- [x] User avatar uploads working correctly
- [x] Theme displays correctly (no undefined array key warnings)
- [x] No PHP errors or warnings
- [x] All modules functional

---

## Testing Commands

**Important:** Always use `php8.0` command to match the website's PHP version:

```bash
# Test with PHP 8.0 (matches website)
sudo -u www-data php8.0 /path/to/file.php

# Check PHP version
php8.0 -v

# Syntax check
php8.0 -l /path/to/file.php
```

**Note:** The default `php` command uses PHP 8.4, which may show different behavior than PHP 8.0 used by the website.

---

## Troubleshooting

### If website shows 500 error:
1. Check PHP error logs: `/var/log/php8.0-fpm.log`
2. Enable error display temporarily in `index.php`
3. Check nginx error logs: `/var/log/nginx/error.log`
4. Verify database connection in `conf.inc.php`
5. Check file permissions

### If installer doesn't work:
1. Verify `mysqli_compat.php` is included
2. Check PHP version matches (8.0)
3. Verify database credentials
4. Check nginx configuration for INSTALL directory

### Common PHP 8.0 Issues:
- **Undefined array keys:** Add `isset()` checks
- **Function redeclaration:** Use `function_exists()` or rename
- **Deprecated functions:** Use compatibility layer or alternatives
- **Type errors:** Add null checks before type-dependent operations
- **Non-numeric values:** Use `microtime(true)` for float values

---

## References

- **Nuked-Klan Official:** http://www.nuked-klan.org
- **PHP 8.0 Migration Guide:** https://www.php.net/manual/en/migration80.php
- **MySQLi Documentation:** https://www.php.net/manual/en/book.mysqli.php

---

**Last Updated:** January 15, 2026  
**Migration Status:** ✅ Complete - Website and Admin Panel fully functional on PHP 8.0
