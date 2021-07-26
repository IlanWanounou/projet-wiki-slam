<?php

namespace Controller\src\Utilities;

abstract class DateManager
{

    public static function idToMonth($id)
    {
        $id = ltrim($id, '0');
        switch ($id) {
            case '1':
                $month = 'Janvier';
                break;
            case '2':
                $month = 'Février';
                break;
            case '3':
                $month = 'Mars';
                break;
            case '4':
                $month = 'Avril';
                break;
            case '5':
                $month = 'Mai';
                break;
            case '6':
                $month = 'Juin';
                break;
            case '7':
                $month = 'Juillet';
                break;
            case '8':
                $month = 'Août';
                break;
            case '9':
                $month = 'Septembre';
                break;
            case '10':
                $month = 'Octobre';
                break;
            case '11':
                $month = 'Novembre';
                break;
            default:
                $month = 'Décembre';
                break;
        }
        return $month;
    }
}
