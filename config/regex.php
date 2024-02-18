<?php


define('REGEX_NAME', "^(?:(?=\S)(?:(?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?){1,30})\S)$"); // (?=\S) to be sure I haven't space in early, (?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?) to have caracters with the possibly to have 1 space max between them, \S to avoid space at the end
define('REGEX_NAME_GALLERIES', '^(?=\S)([a-zA-ZÀ-ÿ0-9|\-\s]){2,20}(?<=\S)$'); // characters with accent, numbers, "-" , "|" and 20 characters
define('REGEX_NAME_PHOTOS', '^[a-zA-Z0-9_-]{2,50}$'); // allows uppercase, lowercase, "-", "_"
define('REGEX_MOBILE', '^0(?:\s?[0-9]){9}$');
define('REGEX_USERNAME', '^[a-zA-Z0-9]{2,30}$');
define('REGEX_CAPTCHA', '^2$');
define('REGEX_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^<>\\w\\d\\s:])([^\s<>]){8,30}$'); // must have one Capitalize letter, lowercase, number, between 8 and 30 characters and exclude < >.
define('REGEX_DATE', '^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$'); // accept date format in YYYY/MM/DD or YYYY-MM-DD
define('REGEX_ISSELECTION', '^(Non|Oui|non|oui)$');
define('REGEX_DESCRIPTION', '^[^<>]{0,1000}$|^$'); // null string or string until 1000 characters
define('REGEX_COMMENT', '^.{5,2000}$');

