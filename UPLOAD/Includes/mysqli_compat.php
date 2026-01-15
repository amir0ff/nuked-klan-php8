<?php
// -------------------------------------------------------------------------//
// MySQLi Compatibility Layer for Nuked-Klan                                //
// This file provides mysql_* function compatibility using mysqli_*         //
// -------------------------------------------------------------------------//

if (!function_exists('mysql_connect')) {
    // Global mysqli connection resource
    global $nk_mysqli_link;
    $nk_mysqli_link = null;

    /**
     * mysql_connect() compatibility function
     */
    function mysql_connect($host = null, $username = null, $password = null, $new_link = false, $client_flags = 0) {
        global $nk_mysqli_link;
        
        if ($nk_mysqli_link !== null && !$new_link) {
            return $nk_mysqli_link;
        }
        
        $nk_mysqli_link = @mysqli_connect($host, $username, $password);
        
        if (!$nk_mysqli_link) {
            return false;
        }
        
        return $nk_mysqli_link;
    }

    /**
     * mysql_select_db() compatibility function
     */
    function mysql_select_db($database_name, $link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_select_db($link_identifier, $database_name);
        }
        
        return false;
    }

    /**
     * mysql_query() compatibility function
     */
    function mysql_query($query, $link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_query($link_identifier, $query);
        }
        
        return false;
    }

    /**
     * mysql_fetch_array() compatibility function
     */
    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH) {
        if ($result instanceof mysqli_result) {
            $type_map = array(
                MYSQLI_ASSOC => MYSQLI_ASSOC,
                MYSQLI_NUM => MYSQLI_NUM,
                MYSQLI_BOTH => MYSQLI_BOTH
            );
            
            $type = isset($type_map[$result_type]) ? $type_map[$result_type] : MYSQLI_BOTH;
            return mysqli_fetch_array($result, $type);
        }
        
        return false;
    }

    /**
     * mysql_fetch_assoc() compatibility function
     */
    function mysql_fetch_assoc($result) {
        if ($result instanceof mysqli_result) {
            return mysqli_fetch_assoc($result);
        }
        return false;
    }

    /**
     * mysql_fetch_row() compatibility function
     */
    function mysql_fetch_row($result) {
        if ($result instanceof mysqli_result) {
            return mysqli_fetch_row($result);
        }
        return false;
    }

    /**
     * mysql_num_rows() compatibility function
     */
    function mysql_num_rows($result) {
        if ($result instanceof mysqli_result) {
            return mysqli_num_rows($result);
        }
        return 0;
    }

    /**
     * mysql_affected_rows() compatibility function
     */
    function mysql_affected_rows($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_affected_rows($link_identifier);
        }
        
        return 0;
    }

    /**
     * mysql_result() compatibility function
     */
    function mysql_result($result, $row, $field = 0) {
        if ($result instanceof mysqli_result) {
            mysqli_data_seek($result, $row);
            $row_data = mysqli_fetch_array($result, MYSQLI_NUM);
            
            if ($row_data && isset($row_data[$field])) {
                return $row_data[$field];
            }
        }
        
        return false;
    }

    /**
     * mysql_real_escape_string() compatibility function
     */
    function mysql_real_escape_string($unescaped_string, $link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_real_escape_string($link_identifier, $unescaped_string);
        }
        
        // Fallback to addslashes if no connection available
        return addslashes($unescaped_string);
    }

    /**
     * mysql_escape_string() compatibility function (deprecated, but used in old code)
     */
    function mysql_escape_string($unescaped_string) {
        return mysql_real_escape_string($unescaped_string);
    }

    /**
     * mysql_error() compatibility function
     */
    function mysql_error($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_error($link_identifier);
        }
        
        return '';
    }

    /**
     * mysql_errno() compatibility function
     */
    function mysql_errno($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_errno($link_identifier);
        }
        
        return 0;
    }

    /**
     * mysql_close() compatibility function
     */
    function mysql_close($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            mysqli_close($link_identifier);
            if ($link_identifier === $nk_mysqli_link) {
                $nk_mysqli_link = null;
            }
            return true;
        }
        
        return false;
    }

    /**
     * mysql_insert_id() compatibility function
     */
    function mysql_insert_id($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_insert_id($link_identifier);
        }
        
        return 0;
    }

    /**
     * mysql_free_result() compatibility function
     */
    function mysql_free_result($result) {
        if ($result instanceof mysqli_result) {
            return mysqli_free_result($result);
        }
        return false;
    }

    /**
     * mysql_data_seek() compatibility function
     */
    function mysql_data_seek($result, $row_number) {
        if ($result instanceof mysqli_result) {
            return mysqli_data_seek($result, $row_number);
        }
        return false;
    }

    /**
     * mysql_set_charset() compatibility function
     */
    function mysql_set_charset($charset, $link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_set_charset($link_identifier, $charset);
        }
        
        return false;
    }

    /**
     * mysql_get_server_info() compatibility function
     */
    function mysql_get_server_info($link_identifier = null) {
        global $nk_mysqli_link;
        
        if ($link_identifier === null) {
            $link_identifier = $nk_mysqli_link;
        }
        
        if ($link_identifier instanceof mysqli) {
            return mysqli_get_server_info($link_identifier);
        }
        
        return '';
    }

    // Define constants for backward compatibility
    if (!defined('MYSQLI_ASSOC')) {
        define('MYSQLI_ASSOC', 1);
    }
    if (!defined('MYSQLI_NUM')) {
        define('MYSQLI_NUM', 2);
    }
    if (!defined('MYSQLI_BOTH')) {
        define('MYSQLI_BOTH', 3);
    }
}

?>