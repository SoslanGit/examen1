<?php


IncludeModuleLangFile(__FILE__);
AddEventHandler("main", "OnBeforeEventAdd", array("MyClass", "OnBeforeEventAddHandler"));
class MyClass
{
    static function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
    {
        if ($event == "FEEDBACK_FORM") {
            global $USER;
            // Если пользователь авторизован
            if ($USER->isAuthorized()) {
                $arFields["AUTHOR"] = GetMessage("EX2_51_AUTH_USER", array(
                        "#ID#" => $USER->GetID(),
                        "#LOGIN#" => $USER->GetLogin(),
                        "#NAME#" =>  $USER->GetFullName(),
                        "#NAME_FORM#" => $arFields["AUTHOR"]
                    )
                );
            } else {
                $arFields["AUTHOR"] = GetMessage("EX2_51_NO_AUTH_USER", array(
                        "#NAME_FORM#" => $arFields["AUTHOR"]
                    )
                );
            }

            CEventLog::Add(array(
                "SEVERITY" => "SECURITY",
                "AUDIT_TYPE_ID" => GetMessage("EX2_51_REPLACEMENT"),
                "MODULE_ID" => "main",
                "ITEM_ID" => $event,
                "DESCRIPTION" => GetMessage("EX2_51_REPLACEMENT").'-'.$arFields["AUTHOR"],
            ));
        }
    }
}
