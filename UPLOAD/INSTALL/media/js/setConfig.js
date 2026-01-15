// Ensure i18n object exists (fallback if server i18n script fails to load)
// Define it on window first to ensure it's global
var i18nFallback = {
    db_connect_fail: 'Database connection failed !',
    wait: 'Please wait...',
    db_host_error: 'Please check the server mysql name.',
    db_login_error: 'Please check the username and password.',
    db_name_error: 'Control your database name.',
    db_prefix_error: 'The prefix is incorrect, edit the conf.inc.php file.',
    db_charset_error: 'Your database does not support the required charset'
};

if (typeof window.i18n === 'undefined') {
    window.i18n = i18nFallback;
}
// Create local reference - use fallback if i18n doesn't exist or is empty
var i18n = (typeof window.i18n !== 'undefined' && Object.keys(window.i18n).length > 0) ? window.i18n : i18nFallback;

function addConfigInputError(input, errorMsg) {
    // Ensure i18n is defined
    if (typeof i18n === 'undefined') {
        i18n = window.i18n || {
            db_connect_fail: 'Database connection failed !',
            wait: 'Please wait...',
            db_host_error: 'Please check the server mysql name.',
            db_login_error: 'Please check the username and password.',
            db_name_error: 'Control your database name.',
            db_prefix_error: 'The prefix is incorrect, edit the conf.inc.php file.',
            db_charset_error: 'Your database does not support the required charset'
        };
    }
    $('#loading_img').remove();
    $('#infos').html((i18n.db_connect_fail || 'Database connection failed !') + '<br />' + errorMsg);
    if (input !== null) input.addClass('error');
}

function checkConfigForm() {
    var host        = $('input[name="db_host"]');
    var user        = $('input[name="db_user"]');
    var pass        = $('input[name="db_pass"]');
    var dbname      = $('input[name="db_name"]');
    var prefix      = $('input[name="db_prefix"]');
    var dbError     = null;
    var formErrors  = 0;

    $('input[id]').each(function() {
        if ($(this).attr('type') == 'text' || $(this).attr('type') == 'password') {
            if (($(this).val() == '' && $(this).attr('name') != 'db_pass' && $(this).attr('name') != 'db_prefix')
                || ($(this).attr('name') == 'db_pass' && user.val() != 'root' && $(this).val() == '')
            ) {
                $(this).addClass('error');
                formErrors++;
            }
        }
    });

    if (formErrors != 0) {
        return false;
    }
    else {
        // Ensure i18n is defined before use
        if (typeof i18n === 'undefined') {
            i18n = window.i18n || {
                wait: 'Please wait...',
                db_connect_fail: 'Database connection failed !',
                db_host_error: 'Please check the server mysql name.',
                db_login_error: 'Please check the username and password.',
                db_name_error: 'Control your database name.',
                db_prefix_error: 'The prefix is incorrect, edit the conf.inc.php file.',
                db_charset_error: 'Your database does not support the required charset'
            };
        }
        $('#infos').html('<span style="color:#000;">' + (i18n.wait || 'Please wait...')
            + '</span><img src="media/images/loading.gif" alt="" id="loading_img" />');

        $.ajax({
            async: false,
            type: 'POST',
            url: 'index.php?action=dbConnectTest',
            data: {
                'db_host' : host.val(),
                'db_user' : user.val(),
                'db_pass' : pass.val(),
                'db_name' : dbname.val(),
                'db_prefix' : prefix.val()
            }
        }).done(function(txt) {
            $('#form_config input').removeClass('error');

            if (txt == 'OK') {
                dbError = false;
            }
            else {
                dbError = true;

                if (txt == 'DB_HOST_ERROR') {
                    addConfigInputError(host, i18n.db_host_error);
                }
                else if (txt == 'DB_LOGIN_ERROR') {
                    addConfigInputError(pass, i18n.db_login_error);
                    user.addClass('error');
                }
                else if (txt == 'DB_NAME_ERROR') {
                    addConfigInputError(dbname, i18n.db_name_error);
                }
                else if(txt == 'DB_PREFIX_ERROR') {
                    addConfigInputError(prefix, i18n.db_prefix_error);
                }
                else if(txt == 'DB_CHARSET_ERROR') {
                    addConfigInputError(null, i18n.db_charset_error);
                }
                else {
                    $('#infos').html(txt);
                }
            }
        });

        if (dbError == false)
            $('#form_config').submit();
    }
}

function checkConfigInput(input) {
    if (($(input).val() == '' && $(input).attr('name') != 'db_pass')
        || ($(input).attr('name') == 'db_pass' && $('input[name="db_user"]').val() != 'root' && $(input).val() == '')
    )
        $(input).addClass('error');
    else
        $(input).removeClass('error');
}