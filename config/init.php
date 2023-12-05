<?php

// ! Regex
define('REGEX_NAME', "^(?:(?=\S)(?:(?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?){1,30})\S)$"); // (?=\S) to be sure I haven't space in early, (?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?) to have caracters with the possibly to have 1 space max between them, \S to avoid space at the end
define('REGEX_IDENTIFIANT', '^[a-zA-Z0-9]{10,30}$');
define('REGEX_CAPTCHA', '^2$');
define('REGEX_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$');