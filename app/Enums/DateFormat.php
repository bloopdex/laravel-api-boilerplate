<?php

namespace App\Enums;

enum DateFormat
{
    const YearMonthDay = 'Y-m-d';
    const DayMonthYear = 'd/m/Y';
    const MonthDayYear = 'm/d/Y';
    const YearMonth = 'Y-m';
    const MonthYear = 'm/Y';
    const DayMonth = 'd/m';
    const MonthDay = 'm/d';
}
