
# ![alt text](http://sizeait.com/ajaxCom/img/logo.png)  ajaxCom

Demo: http://sizeait.com/ajaxCom/

---

## What is ajaxCom 
**ajaxCom provides server-side javascript controls.**

A simple way to manage the browser as a result of the Ajax process by the PHP server.

It's not enough for us to check the form entries on the browser side, and we check the data on the server side. Then we can only control the server and manage the browser.

### Front End Ajax Request Code Example
```javascript
ajaxCom(url, method, data, progressCallbackOrDOM).then( json => {
    
    /* The Ajax process was successfully completed and 
    PHP requests were forwarded to the browser.
    The browser performed these commands. 
    Now you can write what you want to do except for server commands. */

    if(json.status === false){
        //Do something negative..
        return false;
    }
    
    //Do something positive..

}).catch(e => { }).finally(() => { });
```

### Back End Response of Ajax PHP Code Example
```php
require 'ajaxCom.php';

//Set javascript process for ajax response
ajaxCom::innerHTML('#elmID', 'Html and text string');
ajaxCom::addClass('#elmID', 'is-valid');

//Positive Ajax Response with Alert
ajaxCom::true('statusCode', 'alert message', 'data');
```

### Available Back End Methods
```php
//DOM Process
ajaxCom::innerHtml('selector', 'html or text string');

ajaxCom::addClass('selector', 'className');
ajaxCom::removeClass('selector', 'className');

ajaxCom::setAttr('selector', 'attrName', 'attrValue');
ajaxCom::removeAttr('selector', 'attrName');
 
//Assign 'is-valid' class name to the inputSelector and put the helperText into the helperSelector
ajaxCom::isValidDOM('inputSelector', 'helperSelector', 'helperText');
ajaxCom::isInvalidDOM('inputSelector', 'helperSelector');


//Browser Forwarding
ajaxCom::direct('urlAdress');


//Ajax Response With JSON
ajaxCom::true('statusCode', 'msg', data); //Positive ajax response with alert
ajaxCom::quietTrue('statusCode', 'msg', data); //Positive ajax response without alert

ajaxCom::false('statusCode', 'msg', data); //Negative ajax response with alert
ajaxCom::quietFalse('statusCode', 'msg', data); //Negative ajax response without alert
```

**More information will be added.**