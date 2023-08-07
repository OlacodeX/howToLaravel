<?php

namespace App\Enums;

enum Status: int implements Base
{
    case ACTIVE = 0;
    case DRAFT = 1;
    case IN_REVIEW = 2;
    case ARCHIVED = 3;

    public function title(): string
    {
        return match($this){
            self::ACTIVE => 'Active',
            self::DRAFT => 'Draft',
            self::IN_REVIEW => 'In Review',
            self::ARCHIVED => 'Archived',
        };
    }

    public function badge(): string
    {
        return match($this){
            self::ACTIVE => '',
            self::DRAFT => '',
            self::IN_REVIEW => '',
            self::ARCHIVED => '',
        };
    }

    public function icon(): string
    {
        return match($this){
            self::ACTIVE => '',
            self::DRAFT => '',
            self::IN_REVIEW => '',
            self::ARCHIVED => '',
        };
    }
}
