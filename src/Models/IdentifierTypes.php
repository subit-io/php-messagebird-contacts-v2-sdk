<?php


namespace Subit\MessagebirdContactsSdk\Models;


class IdentifierTypes
{
    public const PHONE = 'phonenumber';
    public const EMAIL = 'emailaddress';
    public const FACEBOOK = 'facebook';
    public const WECHAT = 'wechat';
    public const LINE = 'line';
    public const TELEGRAM = 'telegram';
    public const INSTAGRAM = 'instagram';
    public const TWITTER = 'twitter';

    public const TYPES = [
        self::PHONE,
        self::EMAIL,
        self::FACEBOOK,
        self::WECHAT,
        self::LINE,
        self::TELEGRAM,
        self::INSTAGRAM,
        self::TWITTER,
    ];
}