<?php

if($arParams['SPECIALDATE'] == 'Y'){

    // присваиваем дату активности первого элемента к ключу DATE_FIRST_NEWS
    $arResult['DATE_FIRST_NEWS'] = $arResult['ITEMS'][0]['ACTIVE_FROM'];

    // кешируем значение ключа
    $this->__component->SetResultCacheKeys(array('DATE_FIRST_NEWS'));

}
