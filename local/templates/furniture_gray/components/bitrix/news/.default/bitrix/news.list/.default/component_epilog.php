<?php

if(!empty($arResult['DATE_FIRST_NEWS'])){

    //меняем значение свойсва specialdate на DATE_FIRST_NEWS
    $APPLICATION->SetPageProperty('specialdate',$arResult['DATE_FIRST_NEWS']);
}