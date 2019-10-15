<?php

require '../dist/ajaxCom.php';

ajaxCom::setAttr('#msg-area', 'title', 'Mesaj alanıdır');
ajaxCom::removeClass('#msg-area', 'bg-red');

ajaxCom::quietTrue('trueCode', 'Selam');