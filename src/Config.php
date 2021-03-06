<?php

namespace PHLAK\Twine;

class Config
{
    const UC_ALL = 'strtoupper';
    const UC_FIRST = 'ucfirst';
    const UC_WORDS = 'ucwords';

    const LC_ALL = 'strtolower';
    const LC_FIRST = 'lcfirst';
    const LC_WORDS = 'lcwords';

    const TRIM_MASK = " \t\n\r\0\x0B";
    const TRIM_BOTH = 'trim';
    const TRIM_LEFT = 'ltrim';
    const TRIM_RIGHT = 'rtrim';

    const WRAP_SOFT = false;
    const WRAP_HARD = true;

    const PAD_RIGHT = STR_PAD_RIGHT;
    const PAD_LEFT = STR_PAD_LEFT;
    const PAD_BOTH = STR_PAD_BOTH;

    const BASE64_ENCODE = 'base64_encode';
    const BASE64_DECODE = 'base64_decode';

    const EQ_EXACT = 'strcmp';
    const EQ_CASE_INSENSITIVE = 'strcasecmp';
}
