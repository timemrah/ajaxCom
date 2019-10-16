<?php


class ajaxCom
{

    public static
        $html = null,
        $class = null,
        $setAttr = null,
        $removeAttr = null,
        $direct = null,
        $alert  = false,
        $isError = false;


    static function true(string $msg = null, string $statusCode = null, $data = null): void{
        self::echoJson([
            'status'     => true,
            'msg'        => $msg,
            'statusCode' => $statusCode,
            'data'       => $data
        ]);
    }


    static function false(string $msg = null, string $statusCode = null, $data = null): void{
        self::echoJson([
            'status'     => false,
            'msg'        => $msg,
            'statusCode' => $statusCode,
            'data'       => $data
        ]);
    }


    static function alert(bool $status): void{
        self::$alert = $status;
    }


    static function innerHtml(string $selector, string $html): void{
        self::$html[$selector] = $html;
    }
    static function addClass(string $selector, string $class): void{
        self::$class[$selector][$class] = 'add';
    }
    static function removeClass(string $selector, string $class): void{
        self::$class[$selector][$class] = 'remove';
    }
    static function unsetClass(string $selector, string $class): void{
        unset(self::$class[$selector][$class]);
    }
    static function setAttr(string $selector, string $name, string $value): void{
        self::$setAttr[$selector][$name] = $value;
        unset(self::$removeAttr[$selector][$name]);
    }
    static function removeAttr(string $selector, string $name): void{
        self::$removeAttr[$selector][$name] = false;
        unset(self::$setAttr[$selector][$name]);
    }



    static function invalidDOM(string $inputSel, string $helperSel, string $helperText): void{
        self::innerHtml($helperSel, $helperText);
        self::addClass($inputSel, 'is-invalid');
        self::$isError = true;
    }
    static function validDOM(string $inputSel, string $helperSel): void{
        self::removeClass($inputSel, 'is-invalid');
        self::innerHtml($helperSel, '');
    }


    static function direct(string $href): void{
        self::$direct = $href;
    }


    private static function echoJson(array $arr): void{
        echo json_encode([
            'status'     => $arr['status'],
            'statusCode' => $arr['statusCode'],
            'msg'        => $arr['msg'],
            'alert'      => self::$alert,
            'data'       => $arr['data'],
            'html'       => self::$html,
            'class'      => self::$class,
            'setAttr'    => self::$setAttr,
            'removeAttr' => self::$removeAttr,
            'direct'     => self::$direct
        ]);
    }


}