<?php
/**
 * Dostępne statusy dla wypożyczeń
 *
 * @aviliable: anulowano, oczekuje, skompletowano, wypożyczono, zwrócono
 **/

class LoanStatusEnum
{
    const CANCELED = 100;
    const WAITING = 200;
    const COMPLETED = 300;
    const LOANED = 400;
    const RETURNED = 500;
}
