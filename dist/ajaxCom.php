<?php


class ajaxCom
{



    public static
        $html = null,
        $class = null,
        $setAttr = null,
        $removeAttr = null,
        $direct = null,
        $isError = false;


    static function true($statusCode = null, $msg = null, $data = null){

        echo json_encode([
            'alert'  => true,
            'status' => true,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'class' => self::$class,
            'setAttr' => self::$setAttr,
            'removeAttr' => self::$removeAttr,
            'direct' => self::$direct
        ]);

    }


    static function quietTrue($statusCode = null, $msg = null, $data = null){

        $json = json_encode([
            'alert'  => false,
            'status' => true,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'class' => self::$class,
            'setAttr' => self::$setAttr,
            'removeAttr' => self::$removeAttr,
            'direct' => self::$direct
        ]);

        echo $json;
    }


    static function false($statusCode = null, $msg = null, $data = null){

        echo json_encode([
            'alert'  => true,
            'status' => false,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'class' => self::$class,
            'setAttr' => self::$setAttr,
            'removeAttr' => self::$removeAttr,
            'direct' => self::$direct
        ]);

    }


    static function quietFalse($statusCode = null, $msg = null, $data = null){

        $json = json_encode([
            'alert'  => false,
            'status' => false,
            'code'   => $statusCode,
            'msg'    => $msg,
            'data'   => $data,
            'html'   => self::$html,
            'class' => self::$class,
            'setAttr' => self::$setAttr,
            'removeAttr' => self::$removeAttr,
            'direct' => self::$direct
        ]);

        echo $json;
    }


    static function innerHtml($selector, $html){
        self::$html[$selector] = $html;
    }
    static function addClass($selector, $class){
        self::$class[$selector][$class] = 'add';
    }
    static function removeClass($selector, $class){
        self::$class[$selector][$class] = 'remove';
    }
    static function unsetClass($selector, $class){
        unset(self::$class[$selector][$class]);
    }
    static function setAttr($selector, $name, $value){
        self::$setAttr[$selector][$name] = $value;
        unset(self::$removeAttr[$selector][$name]);
    }
    static function removeAttr($selector, $name){
        self::$removeAttr[$selector][$name] = false;
        unset(self::$setAttr[$selector][$name]);
    }


    static function isInvalidDOM($inputSel, $helperSel, $helperText){
        self::innerHtml($helperSel, $helperText);
        self::addClass($inputSel, 'is-invalid');
        self::$isError = true;
    }
    static function isValidDOM($inputSel, $helperSel){
        self::innerHtml($helperSel, '');
        self::removeClass($inputSel, 'is-invalid');
    }


    static function direct($href){
        self::$direct = $href;
        return true;
    }


}