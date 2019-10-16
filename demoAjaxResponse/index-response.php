<?php

require '../dist/ajaxCom.php';


//Set javascript process
ajaxCom::innerHtml('#msg',
    'When printing this message;<br />the PHP server '.
    'selected the element and told the browser to write this message into the element!'
);

ajaxCom::innerHtml('#ajaxCom-send-btn', 'Done');
ajaxCom::setAttr('#ajaxCom-send-btn', 'disabled', 'true');

//Json ajax response echo
ajaxCom::true();