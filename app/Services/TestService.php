<?php

namespace App\Services;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

use Illuminate\Support\Str;

class TestService
{

// Список районов
public $areas = array (
		1 => '5-й поселок',
		2 => 'Голиковка',
		3 => 'Древлянка',
		4 => 'Заводская',
		5 => 'Зарека',
		6 => 'Ключевая',
		7 => 'Кукковка',
		8 => 'Новый сайнаволок',
		9 => 'Октябрьский',
		10 => 'Первомайский',
		11 => 'Перевалка',
		12 => 'Сулажгора',
		13 => 'Университетский городок',
		14 => 'Центр',
);

// Близкие районы, связь осуществляется по индентификатору района из массива $areas
public $nearby = array (
		1 => array(12,11),
		2 => array(5,7,6,8),
		3 => array(11,13),
		4 => array(10,9,12),
		5 => array(2,6,7,8),
		6 => array(5,2,7,8),
		7 => array(2,5,6,8),
		8 => array(6,2,7,5),
		9 => array(10,14),
		10 => array(9,14,12),
		11 => array(13,3,1,12),
		12 => array(1,10),
		13 => array(11,1,12),
		14 => array(9,10),
);

// список сотрудников
public $workers = array (
		0 => array (
				'login' => 'login1',
				'area_name' => 'Октябрьский',
		),
		1 => array (
				'login' => 'login2',
				'area_name' => 'Зарека',
		),
		2 => array (
				'login' => 'login3',
				'area_name' => 'Сулажгора',
		),
		3 => array (
				'login' => 'login4',
				'area_name' => 'Древлянка',
		),
		4 => array (
				'login' => 'login5',
				'area_name' => 'Центр',
		),
);

public $list = array (
	'09:00-11:00',
	'11:00-13:00',
	'15:00-16:00',
	'17:00-20:00',
	'20:30-21:30',
	'21:30-22:30',
);

public function findWorker($districtName)
    {
    	$result = [];

    	// получаем ключ массива по значению
        $districtNumber = array_keys($this->areas, $districtName);

        foreach($this->workers as $w) {
        	if($w['area_name'] == $districtName) {
        		return $w['login'];
        	}
        }

        // находим номера/ключи соседних районов
		$nearDistricts = $this->nearby[$districtNumber[0]];
        // соеденим номер исходного района с соседними, в итоге получим полный массив ключей
		// $allDistricts = array_merge($districtNumber , $nearDistricts);

		foreach ($this->workers as $w) {
			foreach($nearDistricts as $d) {
				if($w['area_name'] == $this->areas[$d]) {
        			$result[] = $w['login'];
        		}
			}
		}

		return $result ? $result : null;

    }



public function crossingIntervals($timeInterval)
{
	$result = [];
	
	if($this->timeValid($timeInterval) == false) {return false;}

	$periodA  = $this->intervalFormat($timeInterval);

	foreach($this->list as $interval) {
		$periodB  = $this->intervalFormat($interval);
		$result[$interval] = $this->calculatePeriodsOverlap($periodA, $periodB);
	}

	return $result;

}

// здесь происходит сравнение интервалов и проверка наложения друг на друга
public function calculatePeriodsOverlap(CarbonPeriod $periodA, CarbonPeriod $periodB)
{
    return $periodA->overlaps($periodB) ? 'произошло наложение' : 'наложения нет';
}

// из строки-даты создаем новый экземпляр CarbonPeriod
// в CarbonPeriod есть готовые методы сравнения/наложения интервалов 
public function intervalFormat($timeInterval)
{
	$dateStart = $this->intervalParse($timeInterval)['intervalStart'];
	$dateEnd = $this->intervalParse($timeInterval)['intervalEnd'];
	return CarbonPeriod::create($dateStart , $dateEnd);
}

public function intervalParse($timeInterval)
{
	
	$position = strpos($timeInterval, '-');
    $dateStart = date_create(Str::substr($timeInterval, 0, $position));
	$dateEnd = date_create(Str::substr($timeInterval, $position + 1 ));
	return ['intervalStart' => $dateStart, 'intervalEnd' => $dateEnd];
}

// основная проверка на валидность с помощью библиотеки Carbon - формат, отсутствуе пробелов и прочих символов и т.д.
// при любой ошибке - exception и возврат false
// но не учитывает выход за интервал, т.е. можно передать 25 часов или 70 минут
// это будет восприниматься, как-будто передали 01:10.
// выод за пределы проверяем также на exception во время формирования даты стандартными ср-вами PHP
// вариант когда первое время больше второго не проверяем, при желании можно развернуть   
public function timeValid($timeInterval)
{	
	try {
    	Carbon::createFromFormat('H:i-H:i', $timeInterval);
		$dateStart = $this->intervalParse($timeInterval)['intervalStart'];
		$dateEnd = $this->intervalParse($timeInterval)['intervalEnd'];
		date_format($dateStart, 'H:i');
    	date_format($dateEnd, 'H:i');
    } catch (\Throwable $e) {
    	return false;
    }

    return true;
}
}