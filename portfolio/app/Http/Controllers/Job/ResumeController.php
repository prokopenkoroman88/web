<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \PhpOffice\PhpWord\PhpWord;
use App\Classes\WordDoc;
//use App\Classes\PHPDoc;

use Session;// like Shop Cart.php

class ResumeController extends Controller
{
    //

    public const DATA = [

        'person'=>[
            'name'=>'Прокопенко Роман Викторович',
            'city'=>'г. Запорожье',
            'place'=>'мкр. Осипенковский',
            'phone'=>'+38-093-137-41-52',
            'viber'=>'+38-093-137-41-52',
            'skype'=>'prokopenkoroman1988',//1988?????
            'email'=>[
                'roman.prokop@mail.zp.ua',
                'prokopenkoroman88@gmail.com',
            ],

        ],//person


        'summary'=>'',


        'languages'=>[
            [
                'kind'=>'web',
                'name'=>'HTML',
                'extend'=>'',

            ],
            [
                'name'=>'JavaScript',
            ],
            [
                'name'=>'CSS',
            ],
            [
                'name'=>'MySQL',
            ],
            [
                'name'=>'PostgreSQL',//???
            ],
            [
                'name'=>'PHP',
            ],
            [
                'name'=>'C++',
            ],
            [
                'name'=>'Delphi',
            ],
        ],//languages

        'frameworks'=>[
            [
                'name'=>'Bootstrap',
                'language'=>'HTML',

            ],
            [
                'name'=>'jQuery',
                'language'=>'JavaScript',
            ],
            [
                'name'=>'Ajax',
                'language'=>'JavaScript',
            ],
            [
                'name'=>'NodeJS',
                'language'=>'JavaScript',
            ],
            [
                'name'=>'React',
                'language'=>'JavaScript',
            ],

            [
                'name'=>'SASS',
                'language'=>'CSS',
            ],
            [
                'name'=>'Laravel',
                'language'=>'PHP',
            ],
            [
                'name'=>'WordPress',
                'language'=>'PHP',
            ],
            [
                'name'=>'Magento2',
                'language'=>'PHP',
            ],
            [
                'name'=>'',
            ],
            [
                'name'=>'',
            ],
            [
                'name'=>'',
            ],

        ],//frameworks

        'portfolio'=>[
            [
                'href'=>'http://softtaxi.com.ua/',
                'descr'=>'Сопровождение сайта',
            ],
            [
                'href'=>'http://diplom.ho.ua/',
                'descr'=>'Дипломный проект на Laravel',
            ],
            [
                'href'=>'http://q93137de.beget.tech/',
                'descr'=>'Курсовой проект (HTML CSS)',
            ],
            [
                'href'=>'http://komfortno.net',
                'descr'=>'Сайт продажи кондиционеров с нуля',
            ],
            [
                'href'=>'https://github.com/prokopenkoroman88/web',
                'descr'=>'мой GitHub',
            ],
            [
                'href'=>'',
                'descr'=>'',
            ],



        ],//portfolio


        'education'=>[

            [
                'beg'=>'09 2005',
                'end'=>'12 2009',
                'kind'=>'высшее полное',
                'at'=>'Классический Приватный Университет',
                'spec'=>'Программное обеспечение автоматизированных систем',
                'diplom'=>'(красный диплом магистра, тема «Автоматизированная система синтеза нейро-нечетких сетей», проект написан на C++)',
                'mark'=>''
            ],

            [
                'beg'=>'06 2011',
                'end'=>'08 2011',
                'at'=>'ЗЭТК',
                'kind'=>'курсы',
                'spec'=>'курсы по ремонту компьютеров',
                'mark'=>''
            ],


            [
                'beg'=>'04 2019',
                'end'=>'05 2020',
                'kind'=>'курсы',
                'at'=>'КА ШАГ',
                'spec'=>'Разработка и продвижение web-проектов',//«»
                'mark'=>''
            ],

            //Лущенко Александр


        ],//education


        'expirience'=>[//опыт работы
            [
                'beg'=>'02 2007',
                'end'=>'02 2007',
                'kind'=>'практика',
                'at'=>'ООО “Будиндустрия ЛТД"',
                'work'=>[
                    'создал базу данных для хранения нормативной документации',
                ],
            ],

            [
                'beg'=>'03 2011',
                'end'=>'03 2011',
                'kind'=>'неофициально',
                'at'=>'УкрПромСервис2000',
                'staff'=>'web-программистом',
                'work'=>[
                    'сопровождал внутренний сайт организации (порядка 10 php-страниц связанных с базой mysql) при помощи Денwера',
                ],


 



            ],

            [
                'beg'=>'10 2011',
                'end'=>'0? 2015',
                'at'=>'Компания «СофтТАКСИ»',
                'staff'=>'инженер-программист',
                'work'=>[
                    'Использую языки MySQL и Delphi',
                    'Сопровождаю программу для поддержки бизнеса «Раджа»',
                    'Выкладываю обновления программы на сайт с помощью FileZilla',
                    'Применяю новшества web-разработки для улучшения кода сайта',
                    'Пишу сложные? запросы на MySQL',
                    'Иногда программирую выгрузку данных в XML, Excel',
                ],                
            ],






        ],//expirience

        'hard-skills'=>[//Профессиональные навыки



/*
-Администрирование сайта на PHPmyAdmin,
-Выкладывание страниц на сайт с помощью FileZilla,
-Управление PHP-проектом вручную и с помощью консоли,
-Применение объектно-ориентированного программирования,
-Model-View-Controller,
-Чтение технической документации,
-Знание Microsoft Office: (Word, Excel, Access), MathCAD.
*/
        ],//hard-skills


        'soft-skills'=>[

        ],//soft-skills



    ];





    public function index()
    {
        $resume = new WordDoc('');//$fileName
        Session::put('resume',$resume);
        $data = self::DATA;
        return view('job.resume', compact('resume','data'));
    }

    //Ajax?
    public function resume(){
        $resume = Session::get('resume');
        return ['resume', $resume];
    }
}