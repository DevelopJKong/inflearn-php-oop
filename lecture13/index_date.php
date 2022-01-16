<?php

/**
 *  DataTime
 */

$dt = new DateTime('now',new DateTimeZone('Asia/Seoul'));
//$dt = DateTime::createFromFormat('Y/m/d','now',new DateTimeZone('Asia/Seoul'));

$dt->modify('+2 days');
$dt->modify('+2 days');

//var_dump($dt->format('h:i:s Y/m/D'));

/**
 * DateTimeZone
 */
$dz = new DateTimeZone('Asia/Seoul');
//var_dump(DateTimeZone::listIdentifiers(),$dz->getLocation(),$dz->getName());

$dt2 = new DateTime('now',new DateTimeZone('Asiz/Seoul'));
//var_dump($dt2->diff($dt));

$di = new DateInterval('P1Y2M2D');
$di2 = DateInterval::createFromDateString('+2 days');

//var_dump($di2);

/**
 * DatePeriod
 *
 * 이렇게 사용하는 경우는 게시판에 며칠전 며철전 이렇게 나오게 만들때 사용을한다
 */


$dt3 = new DateTime('2019-12-31');
$dt4 = new DateTime('2020-12-31');
$di3 = DateInterval::createFromDateString('+5 days');

$dp = new DatePeriod($dt3,$di3,$dt4);
var_dump($dp);
