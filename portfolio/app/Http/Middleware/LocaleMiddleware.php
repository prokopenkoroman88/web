<?php

namespace App\Http\Middleware;

use Closure;
use App;//+
use Request;//+

class LocaleMiddleware
{

    public static $mainLanguage = 'en'; //основной язык, который не должен отображаться в URl
    
    //public static $languages = ['en', 'ru', 'uk']; // Указываем, какие языки будем использовать в приложении. 
    public static $languages = [
    'en'=>["&#127468&#127463 🏴󠁧󠁢󠁥󠁮󠁧󠁿",'English'], 
    'ru'=>["&#127479&#127482",'Русский'], 
    'uk'=>["&#127482&#127462",'Українська'],
    ]; // Указываем, какие языки будем использовать в   приложении. 


        
    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale($showMain=false)
    {
        $uri = Request::path(); //получаем URI 


        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"

        $sLang = $segmentsURI[0+1] ?? null; // 'en'

        //Проверяем метку языка  - есть ли она среди доступных языков
        //if (!empty($sLang) && in_array($sLang, self::$languages)) {
        if (!empty($sLang) && isset( self::$languages[$sLang] )) {

            if ($showMain || $sLang != self::$mainLanguage) return $sLang; 

        }
        return null; 
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale(true);
        App::setLocale($locale);

        //пропускаем дальше - передаем в следующий посредник
        return $next($request);
    }
}
