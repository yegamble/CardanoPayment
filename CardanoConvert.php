<?php


namespace App\Marketplace\Utility;


class MoneroConvert
{
    const API_URL = "https://min-api.cryptocompare.com/data/price?fsym=ADA&tsyms=EUR";
    const API_URL_USD = "https://min-api.cryptocompare.com/data/price?fsym=ADA&tsyms=USD";
    const EUR = "EUR";
    const USD = "USD";
    const ADA_TO_PICONERO = 1000000000000;

    public static function adaToEur(float $amount){
        $rate = file_get_contents(self::API_URL);
        $euroRate = json_decode($rate)->EUR;
        return $amount * $euroRate;
    }

    public static function adaToUsd(float $amount){
        $rate = file_get_contents(self::API_URL_USD);
        $usdRate = json_decode($rate)->USD;
        return $amount * $usdRate;
    }

    public static function eurToAda(float $amount) {
        $rate = file_get_contents(self::API_URL);
        $euroRate = json_decode($rate)->EUR;
        return $amount / $euroRate;
    }

    public static function usdToAda(float $amount) {
        $rate = file_get_contents(self::API_URL_USD);
        $euroRate = json_decode($rate)->USD;
        return $amount / $euroRate;
    }
    public static function toPicoNero($ada) {
        return $ada * self::ADA_TO_PICONERO;
    }
    public static function toAda($piconero) {
        return $piconero / self::ADA_TO_PICONERO;
    }
    public static function piconeroToEur($piconero){
        return self::adaToEur( self::toAda($piconero));
    }

    public static function piconeroToUsd($piconero){
        return self::adaToUsd( self::toAda($piconero));
    }
}
