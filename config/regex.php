<?php


define('REGEX_NAME', "^(?:(?=\S)(?:(?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?){1,30})\S)$"); // (?=\S) to be sure I haven't space in early, (?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?) to have caracters with the possibly to have 1 space max between them, \S to avoid space at the end
define('REGEX_NAME_GALLERIES', '/^(?:(?=\S)(?:(?:(?=[a-zA-Z0-9\-|])\S\s?){0,2}[a-zA-Z0-9\-|]){1,20}\S)$/gm'); // same than above but with numbers and "-" , "|" and 20 characters
define('REGEX_MOBILE', '^0(?:\s?[0-9]){9}$');
define('REGEX_IDENTIFIANT', '^[a-zA-Z0-9]{10,30}$');
define('REGEX_CAPTCHA', '^2$');
define('REGEX_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$');
define('REGEX_DATE', '^\d{4}-\d{2}-\d{2}$');