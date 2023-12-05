<?php

// ! Regex
define('REGEX_NAME', "^(?:(?=\S)(?:(?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?){1,30})\S)$"); // (?=\S) to be sure I haven't space in early, (?:(?=[a-zA-ZÀ-ÖØ-öø-ÿ'-])\S\s?) to have caracters with the possibly to have 1 space max between them, \S to avoid space at the end
define('REGEX_CAPTCHA', '^2$');
// * personalized Regex for Logins : 
define('REGEX_ANAIS', "^anais03082023essaouira$");
