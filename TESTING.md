# Nuked-Klan PHP 8.0 Migration - Manual Testing Checklist

## Purpose
This is a **testing checklist** for manual testing during the PHP 8.0 migration. It's different from `MIGRATION.md`:
- **MIGRATION.md** = Technical documentation of WHAT was fixed and HOW (historical record)
- **TESTING.md** = Checklist of WHAT TO TEST (action items for testing)

## Testing Strategy
This checklist helps ensure systematic, thorough testing of all functionality after PHP 8.0 migration.

**Last Updated:** January 15, 2026

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
- [ ] Edit news category
- [ ] Delete news category
- [ ] Add news article
- [ ] Edit news article
- [ ] Delete news article
- [ ] View news on frontend
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
- [ ] Add survey
- [ ] Edit survey
- [ ] Delete survey
- [ ] Add survey options
- [ ] View survey on frontend
- [ ] Vote in survey

### Comment Module
- [ ] View comments
- [ ] Edit comment
- [ ] Delete comment
- [ ] Configure comment modules
- [ ] Comments display on frontend

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
- [ ] Contact: View/manage contact messages
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
- [ ] User profile edit
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
- [ ] Homepage
- [ ] News listing page
- [ ] News article page
- [ ] Links page
- [ ] Gallery page
- [ ] Download page
- [ ] Forum index
- [ ] Forum topic view
- [ ] Sections page
- [ ] Survey page
- [ ] User profile page (public)
- [ ] Search functionality

### User Pages (Logged In)
- [ ] User dashboard
- [ ] User profile edit
- [ ] User preferences
- [ ] User inbox
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
- [ ] Change theme
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

### Issues Found
- **News Category Insert:** Fixed AUTO_INCREMENT issue - removed `nid` field from INSERT
- **microtime() Warning:** Fixed by using `microtime(true)` instead of `microtime()`
- **Undefined Array Keys:** Fixed with isset() checks in all 18 admin modules

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
