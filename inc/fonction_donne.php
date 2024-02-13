<?php

function verify_email($email)
{
    $retour = true;
    $email_verif = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email_verif) {
        $retour = false;
    }
    return $retour;
}
function verify_number($number)
{
    $retour = true;
    if (!is_numeric($number) || $number < 0 || $number > 120) {
        $retour = false;
    }
    return $retour;
}

function verify_text($text)
{
    if (empty($text)) {
        return false;
    }

    if (preg_match('/<[^>]*>/', $text) || preg_match('/(javascript:|onclick|onmouseover|onload)/i', $text)) {
        return false;
    }

    return true;
}
