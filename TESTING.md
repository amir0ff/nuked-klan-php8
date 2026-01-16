# Nuked-Klan PHP 8.0 Migration - Manual Testing Checklist

## Purpose
This is a **testing checklist** for manual testing during the PHP 8.0 migration.

**Documentation Structure:**
- **[MIGRATION.md](MIGRATION.md)** = Complete technical documentation of WHAT was fixed and HOW (historical record)
- **TESTING.md** (this file) = Checklist of WHAT TO TEST (action items for testing)

## Testing Strategy
This checklist helps ensure systematic, thorough testing of all functionality after PHP 8.0 migration.

**Last Updated:** January 16, 2026

---

## Phase 1: Core Functionality ✅

### Homepage & Frontend
- [x] Homepage loads without errors
- [x] No PHP warnings on homepage
- [x] Theme displays correctly
- [x] Navigation menu works
- [x] Footer displays correctly

### Admin Panel Access
- [x] Admin login works
- [x] Admin dashboard loads
- [x] No PHP warnings in admin panel

---

## Phase 2: Admin Modules Testing

### News Module
- [x] Add news category (FIXED: AUTO_INCREMENT issue)
- [x] Edit news category
- [x] Delete news category
- [x] Add news article
- [x] Edit news article
- [x] Delete news article
- [x] View news on frontend
- [ ] News pagination works
- [ ] News sorting works

### Links Module
- [ ] Add link category
- [ ] Edit link category
- [ ] Delete link category
- [ ] Add link
- [ ] Edit link
- [ ] Delete link
- [ ] View links on frontend
- [ ] Broken links checker

### Gallery Module
- [ ] Add gallery category
- [ ] Edit gallery category
- [ ] Delete gallery category
- [ ] Upload image
- [ ] Edit image details
- [ ] Delete image
- [ ] View gallery on frontend
- [ ] Image upload with file

### Download Module
- [ ] Add download category
- [ ] Edit download category
- [ ] Delete download category
- [ ] Add download
- [ ] Upload download file
- [ ] Edit download
- [ ] Delete download
- [ ] View downloads on frontend
- [ ] Download file works

### Forum Module
- [ ] Create forum category
- [ ] Edit forum category
- [ ] Delete forum category
- [ ] Create forum
- [ ] Edit forum
- [ ] Delete forum
- [ ] Add moderator
- [ ] Remove moderator
- [ ] Create rank
- [ ] Edit rank
- [ ] Delete rank
- [ ] Forum frontend works

### Sections Module
- [ ] Add section category
- [ ] Edit section category
- [ ] Delete section category
- [ ] Add section article
- [ ] Edit section article
- [ ] Delete section article
- [ ] View sections on frontend

### Survey Module
- [x] View survey list on frontend (FIXED: Undefined variable $j)
- [ ] Add survey
- [ ] Edit survey
- [ ] Delete survey
- [ ] Add survey options
- [ ] Vote in survey

### Comment Module
- [x] View comments
- [x] Edit comment
- [x] Delete comment
- [x] Configure comment modules
- [x] Comments display on frontend
- [x] Add comment (frontend) - FIXED: Admin session preservation, AJAX response format, auto-increment ID field

### Wars Module
- [ ] Add war match
- [ ] Edit war match
- [ ] Delete war match
- [ ] Upload war screenshots
- [ ] View wars on frontend

### Guestbook Module
- [ ] View guestbook entries
- [ ] Edit guestbook entry
- [ ] Delete guestbook entry
- [ ] Guestbook frontend works
- [ ] Add guestbook entry (frontend)

### Server Module
- [ ] Add server category
- [ ] Edit server category
- [ ] Delete server category
- [ ] Add server
- [ ] Edit server
- [ ] Delete server
- [ ] View servers on frontend

### Other Modules
- [ ] Calendar: Add/edit/delete events
- [ ] Defy: View/manage defies
- [ ] Irc: Add/edit/delete IRC awards
- [ ] Recruit: View/manage recruitment
- [x] Contact: View/manage contact messages (FIXED: Notification clearing issue)
- [x] Contact: Delete contact message (FIXED: Notification now syncs with messages)
- [x] Contact: Send contact message (FIXED: Undefined array key "nom")
- [ ] Textbox: View/edit/delete shoutbox messages

---

## Phase 3: File Uploads Testing

### Image Uploads
- [ ] News category image upload
- [ ] Gallery image upload
- [ ] User avatar upload
- [ ] War screenshot upload
- [ ] Download screenshot upload

### File Uploads
- [ ] Download file upload
- [ ] File size limits respected
- [ ] File type validation works
- [ ] Upload error handling

---

## Phase 4: User Module Testing

### User Management
- [ ] User registration (frontend)
- [ ] User login (frontend)
- [ ] User logout
- [ ] Password reset
- [x] User profile edit (FIXED: Parse error with unexpected "else")
- [x] User theme change (FIXED: Undefined array key "nuked_user_theme")
- [ ] Avatar upload/change
- [ ] User preferences update

### Admin User Management
- [ ] View user list
- [ ] Search users
- [ ] Edit user
- [ ] Delete user
- [ ] Change user level
- [ ] User pagination works
- [ ] User sorting works

---

## Phase 5: Frontend Pages Testing

### Public Pages
- [x] Homepage
- [x] News listing page
- [x] News article page
- [ ] Links page
- [ ] Gallery page
- [ ] Download page
- [ ] Forum index
- [ ] Forum topic view
- [ ] Sections page
- [ ] Survey page
- [ ] User profile page (public)
- [x] Search functionality (FIXED: Undefined variables $z, $_REQUEST['p'], $string in Forum search)

### User Pages (Logged In)
- [ ] User dashboard
- [x] User profile edit (FIXED: Parse error with unexpected "else")
- [ ] User preferences
- [x] User inbox (Userbox module - FIXED: Undefined variables $title and $reply)
- [ ] User statistics

---

## Phase 6: Admin Core Functions

### Settings
- [ ] General settings save
- [ ] Site configuration
- [ ] Email settings
- [ ] Security settings

### Module Management
- [ ] Enable/disable modules
- [ ] Module configuration

### Theme Management
- [x] Change theme (User module - FIXED: Undefined array key "nuked_user_theme")
- [ ] Theme preview
- [ ] Theme configuration

### Block Management
- [ ] Add/edit/delete blocks
- [ ] Block positioning
- [ ] Block visibility

### Menu Management
- [ ] Add/edit/delete menu items
- [ ] Menu ordering

### Smilies Management
- [ ] Add smiley
- [ ] Edit smiley
- [ ] Delete smiley

---

## Phase 7: Error Monitoring

### PHP Error Logs
- [ ] Check `/var/log/php8.0-fpm.log` for errors
- [ ] Check application error logs
- [ ] No undefined array key warnings
- [ ] No deprecated function warnings
- [ ] No type errors
- [ ] No fatal errors

### Browser Console
- [ ] No JavaScript errors
- [ ] No 404 errors for resources
- [ ] No CORS errors

### Database
- [ ] No SQL errors in logs
- [ ] Database queries execute correctly
- [ ] No connection timeouts

---

## Phase 8: Edge Cases & Error Handling

### Form Validation
- [ ] Empty form submissions
- [ ] Invalid data types
- [ ] SQL injection attempts (sanitized)
- [ ] XSS attempts (sanitized)
- [ ] File upload with invalid type
- [ ] File upload exceeding size limit

### Navigation
- [ ] Invalid URLs (404 handling)
- [ ] Direct access to admin without login
- [ ] Access denied pages
- [ ] Session expiration handling

### Database Operations
- [ ] Insert with missing required fields
- [ ] Update non-existent records
- [ ] Delete operations
- [ ] Foreign key constraints

---

## Testing Notes

### Issues Found & Fixed
> **Note:** Detailed technical documentation of all fixes is in [MIGRATION.md](MIGRATION.md). This section only lists brief notes for testing reference.

- ✅ **News Module:** AUTO_INCREMENT issue fixed
- ✅ **Comment Module:** Captcha validation, flood check, SQL injection, AJAX response format, auto-increment ID
- ✅ **Contact Module:** Notification clearing, undefined array key "nom"
- ✅ **Survey Module:** Undefined variable $j
- ✅ **User Module:** Parse error, undefined array key "nuked_user_theme"
- ✅ **Search Module:** Undefined variables ($z, $_REQUEST['p'], $string)
- ✅ **Userbox Module:** Undefined variables $title and $reply
- ✅ **Core HTML Filter:** Undefined array keys in regex matches

### Testing Progress
- **January 16, 2026:** 
  - ✅ **News Module:** Fully tested - All CRUD operations working correctly
  - ✅ **Comment Module:** Fully tested - Comment submission and admin management working
  - ✅ **Contact Module:** Fully tested - Send, view, delete, and notifications working
  - ✅ **Survey Module:** Tested - Survey list display working
  - ✅ **User Module:** Fully tested - Profile editing and theme change working
  - ✅ **Search Module:** Tested - Search functionality working
  - ✅ **Userbox Module:** Tested - User inbox/messaging working
  - ✅ **Core HTML Filter:** Fixed - All undefined array key warnings resolved

**For detailed fix documentation, see [MIGRATION.md](MIGRATION.md).**

### Test Environment
- **PHP Version:** 8.0.30
- **Database:** nuked-klan (main branch deployment)
- **Deployment Path:** `/home/amiroff/htdocs/amiroff.org/samples/nuked-klan`

### Testing Commands
```bash
# Check PHP error logs
sudo tail -f /var/log/php8.0-fpm.log

# Check nginx error logs
sudo tail -f /var/log/nginx/error.log

# Syntax check PHP files
php8.0 -l /path/to/file.php
```

---

## Status Legend
- ✅ = Completed and working
- [ ] = Not yet tested
- ⚠️ = Tested with issues (note in Issues Found section)
- ❌ = Broken (needs fix)

---

## Next Steps After Testing
1. Document any issues found
2. Fix issues in order of severity
3. Re-test fixed functionality
4. Update this checklist as you progress
