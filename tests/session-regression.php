<?php
ob_start(); // Allow the real cookie setters to run before test output is emitted.
// Run with an existing deployment config; all fixture tables are connection-local TEMPORARY tables.
$root = dirname(__DIR__) . '/UPLOAD';
$config = $argv[1] ?? '';
if (!$config || !is_file($config)) {
    fwrite(STDERR, "Usage: php tests/session-regression.php /path/to/conf.inc.php\n");
    exit(2);
}
require $config;
require $root . '/Includes/mysqli_compat.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});
$nk_mysqli_link = new mysqli($global['db_host'], $global['db_user'], $global['db_pass'], $global['db_name']);
$prefix = 'nk_session_test_' . bin2hex(random_bytes(5));
define('TMPSES_TABLE', $prefix . '_tmp');
define('SESSIONS_TABLE', $prefix . '_sessions');
define('USER_TABLE', $prefix . '_users');
define('USERBOX_TABLE', $prefix . '_userbox');
$nk_mysqli_link->query('CREATE TEMPORARY TABLE ' . TMPSES_TABLE . ' (session_id VARCHAR(128) PRIMARY KEY, session_start BIGINT NOT NULL, session_vars MEDIUMTEXT NOT NULL) ENGINE=MyISAM');
$nk_mysqli_link->query('CREATE TEMPORARY TABLE ' . SESSIONS_TABLE . ' (id VARCHAR(32) PRIMARY KEY, user_id VARCHAR(20), date BIGINT, ip VARCHAR(45), last_used BIGINT DEFAULT 0, vars TEXT) ENGINE=MyISAM');
$nk_mysqli_link->query('CREATE TEMPORARY TABLE ' . USER_TABLE . ' (id VARCHAR(20) PRIMARY KEY, niveau INT, pseudo VARCHAR(80)) ENGINE=MyISAM');
$nk_mysqli_link->query('CREATE TEMPORARY TABLE ' . USERBOX_TABLE . ' (mid INT PRIMARY KEY, user_for VARCHAR(20), status INT) ENGINE=MyISAM');

// Load just the real functions under test without bootstrapping the CMS or its session callbacks.
function loadSessionFunction($file, $name) {
    $tokens = token_get_all(file_get_contents($file));
    for ($i = 0; $i < count($tokens); $i++) {
        if (!is_array($tokens[$i]) || $tokens[$i][0] !== T_FUNCTION) continue;
        $j = $i + 1;
        while (isset($tokens[$j]) && is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) $j++;
        if (!isset($tokens[$j]) || !is_array($tokens[$j]) || $tokens[$j][1] !== $name) continue;
        $code = ''; $depth = 0; $opened = false;
        for (; $i < count($tokens); $i++) {
            $token = $tokens[$i];
            $code .= is_array($token) ? $token[1] : $token;
            if ($token === '{') { $depth++; $opened = true; }
            if ($token === '}' && --$depth === 0 && $opened) { eval($code); return; }
        }
    }
    throw new RuntimeException('Session function not found: ' . $name);
}
function connect() { return true; }
function checkSession($condition, $message) { if (!$condition) throw new RuntimeException($message); }
loadSessionFunction($root . '/nuked.php', 'session_read');
loadSessionFunction($root . '/nuked.php', 'session_write');
loadSessionFunction($root . '/Includes/nkSessions.php', 'secure');
loadSessionFunction($root . '/Includes/nkSessions.php', 'init_cookie');
loadSessionFunction($root . '/Includes/nkSessions.php', 'session_new');

$failed = 0;
try {
    checkSession(session_write('repeat-visit', 'first'), 'First session write failed');
    $nk_mysqli_link->query('UPDATE ' . TMPSES_TABLE . ' SET session_start=123 WHERE session_id="repeat-visit"');
    $payload = "quote:' slash:\\ unicode:\xc3\xa9";
    checkSession(session_write('repeat-visit', $payload), 'Repeated session write failed');
    checkSession(session_write('repeat-visit', $payload), 'Unchanged session write failed');
    checkSession(session_read('repeat-visit') === $payload, 'Session data did not round-trip');
    $row = $nk_mysqli_link->query('SELECT COUNT(*) AS n, MIN(session_start) AS started FROM ' . TMPSES_TABLE)->fetch_assoc();
    checkSession((int)$row['n'] === 1 && (int)$row['started'] === 123, 'Repeated writes duplicated the row or reset its start time');
    echo "PASS repeated and unchanged session writes preserve one row, start time and escaped data\n";
} catch (Throwable $error) {
    $failed++;
    echo 'FAIL session persistence: ', get_class($error), ' (', $error->getCode(), ")\n";
}

try {
    $nuked = []; $user_ip = '127.0.0.1'; $time = 1700000000; $timesession = 1800;
    $cookie_visit = 'test_visit'; $cookie_session = 'test_session'; $cookie_userid = 'test_user'; $cookie_forum = 'test_forum';
    $sessionlimit = $time + $timesession; $timelimit = $time + 86400;
    $id = '0123456789abcdef0123456789abcdef';
    $_COOKIE = [$cookie_session=>$id, $cookie_userid=>'fixture-member']; $_REQUEST = [];
    $nk_mysqli_link->query('INSERT INTO ' . SESSIONS_TABLE . " (id,user_id,date,ip,last_used) VALUES ('$id','fixture-member',1699999999,'127.0.0.1',1699999900)");
    $nk_mysqli_link->query('INSERT INTO ' . USER_TABLE . " VALUES ('fixture-member',1,'Fixture Member')");
    $nk_mysqli_link->query('INSERT INTO ' . USERBOX_TABLE . " VALUES (1,'fixture-member',0)");
    $user = secure();
    $row = $nk_mysqli_link->query('SELECT last_used FROM ' . SESSIONS_TABLE . " WHERE id='$id'")->fetch_assoc();
    checkSession($user[0] === 'fixture-member' && (int)$user[1] === 1 && (int)$user[5] === 1, 'Authenticated session was not retained');
    checkSession((int)$row['last_used'] === $time, 'Authenticated activity timestamp was not updated');
    echo "PASS existing authenticated cookie retains membership and updates last activity\n";
} catch (Throwable $error) {
    $failed++;
    echo 'FAIL authenticated session: ', get_class($error), ' (', $error->getCode(), ")\n";
}
try {
    $cookie_theme = 'test_theme'; $cookie_langue = 'test_language';
    $_SERVER['HTTPS'] = 'on'; $_SERVER['SERVER_PORT'] = 443;
    session_new('fixture-member', '');
    $row = $nk_mysqli_link->query('SELECT id, date FROM ' . SESSIONS_TABLE . " WHERE user_id='fixture-member'")->fetch_assoc();
    checkSession($row && $row['id'] !== $id && strlen($row['id']) === 32 && (int)$row['date'] === $time, 'Existing login session was not renewed');
    session_new('fixture-new', 'ok');
    $row = $nk_mysqli_link->query('SELECT COUNT(*) AS n FROM ' . SESSIONS_TABLE . " WHERE user_id='fixture-new'")->fetch_assoc();
    checkSession((int)$row['n'] === 1, 'Fresh login session was not created');
    echo "PASS fresh and renewed login sessions are created with unique IDs\n";
} catch (Throwable $error) {
    $failed++;
    echo 'FAIL login session creation: ', get_class($error), ' (', $error->getCode(), ")\n";
}
$nk_mysqli_link->close(); // MySQL automatically removes only this connection's TEMPORARY tables.
ob_end_flush();
exit($failed ? 1 : 0);
