<?php

if (!defined('PAGINATION_PAGE_DEFAULT')) {
    define('PAGINATION_PAGE_DEFAULT', 20);
}

if (!defined('ROLE_USER_DEFAULT')) {
    define('ROLE_USER_DEFAULT', 1);
}

if (!defined('ROLE_USER_ADMIN')) {
    define('ROLE_USER_ADMIN', 100);
}

if (!defined('NOT_ACTIVE_SHOW')) {
    define('NOT_ACTIVE_SHOW', 0);
}

if (!defined('ACTIVE_SHOW')) {
    define('ACTIVE_SHOW', 1);
}

if (!defined('MAIL_INQUIRY_INFO')) {
    define('MAIL_INQUIRY_INFO', [
        'name' => 'Hion Coding',
        'email' => 'no-reply@hioncoding.com'
    ]);
}
