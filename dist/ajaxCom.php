<?php


class ajaxCom
{



    private static
        $html = null,
        $addClass = null,
        $removeClass = null,
        $direct = null;

    public static $isError = false;


    public static function true($statusCode = null, $msg = null, $data = null){

        echo json_encode([
            'alert'  => true,
            'status' => true,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'addClass' => self::$addClass,
            'removeClass' => self::$removeClass,
            'direct' => self::$direct
        ]);

    }


    public static function quietTrue($statusCode = null, $msg = null, $data = null){

        $json = json_encode([
            'alert'  => false,
            'status' => true,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'addClass' => self::$addClass,
            'removeClass' => self::$removeClass,
            'direct' => self::$direct
        ]);

        echo $json;
    }


    public static function false($statusCode = null, $msg = null, $data = null){

        echo json_encode([
            'alert'  => true,
            'status' => false,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'addClass' => self::$addClass,
            'removeClass' => self::$removeClass,
            'direct' => self::$direct
        ]);

    }


    public static function quietFalse($statusCode = null, $msg = null, $data = null){

        $json = json_encode([
            'alert'  => false,
            'status' => false,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'addClass' => self::$addClass,
            'removeClass' => self::$removeClass,
            'direct' => self::$direct
        ]);

        echo $json;
    }


    public static function addHtml($selector, $html){
        self::$html[$selector] = $html;
    }
    public static function addClass($selector, $class){
        self::$addClass[$selector] = $class;
        unset(self::$removeClass[$selector]);
    }
    public static function removeClass($selector, $class){
        self::$removeClass[$selector] = $class;
        unset(self::$addClass[$selector]);
    }


    public static function clearHtmlRecords(){
        self::$html = [];
    }
    public static function clearAddClassRecords(){
        self::$addClass = [];
    }
    public static function clearRemoveClassRecords(){
        self::$removeClass = [];
    }


    public static function isEmptyHtml(){
        return empty(self::$html);
    }
    public static function isEmptyAddClass(){
        return empty(self::$addClass);
    }
    public static function isEmptyRemoveClass(){
        return empty(self::$removeClass);
    }


    public static function isInvalidDOM($inputSel, $helperSel, $helperText){
        self::addHtml($helperSel, $helperText);
        self::addClass($inputSel, 'is-invalid');
        self::$isError = true;
    }
    public static function isValidDOM($inputSel, $helperSel){
        self::addHtml($helperSel, '');
        self::removeClass($inputSel, 'is-invalid');
    }


    public static function direct($href){
        self::$direct = $href;
        return true;
    }


}