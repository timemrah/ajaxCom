<?php

require 'dist/ajaxCom.php';

//Set json data
//ajaxCom::innerHtml('#ajaxCom-send-btn', 'Done');
ajaxCom::innerHtml('#msg', 'Ajax is success!');


//Echo json
ajaxCom::quietTrue('anyTrueCode');
//ajaxCom::true('anyTrueCode', 'Ajax is success!');