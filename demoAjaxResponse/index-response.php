<?php

require '../dist/ajaxCom.php';

//Set json data
//ajaxCom::innerHtml('#ajaxCom-send-btn', 'Done');
ajaxCom::innerHtml('#msg', 'When printing this message;<br />the PHP server selected the element and told the browser to write this message into the element!');


//Echo json
ajaxCom::quietTrue('anyTrueCode');
//ajaxCom::true('anyTrueCode', 'Ajax is success!');