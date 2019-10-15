
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
    
    

**More information will be added.**

---

## ajaxCom Nedir?
**ajaxCom sunucu tarafında javascript kontrolleri sağlar.**

Ajax işlemleri sonucunda PHP sunucusu ile tarayıcıyı yönetmenin basit bir yolu.

Tarayıcı tarafında form girişlerini kontrol etmemiz yeterli gelmiyor ve sunucu tarafında da bu verileri kontrol ediyoruz. O zaman sadece sunucu ile kontrol sağlayıp tarayıcıyı yönetebiliriz.

### Front End Ajax İsteği Kod Örneği
```javascript
ajaxCom(url, method, data, progressCallbackOrDOM).then( json => {
    
    /* Ajax işlemi başarıyla tamamlandı ve PHP istekleri 
    tarayıcıya iletildi. Tarayıcı bu komutları yerine getirdi. 
    Artık sunucu komutları dışında ne yapmak istediğinizi
    yazabilirsiniz. */
    
    if(json.status === false){
        //Olumsuz durumda birşeyler yap..
        return false;
    }
    
    //Olumlu durumda birşeyler yap..
                    
}).catch(e => { }).finally(() => { });
```

### Back End Ajax Cevabı PHP Kod Örneği
```php
require 'ajaxCom.php';

//Javascript işlemlerini ajax yanıtı için ayarlıyoruz.
ajaxCom::innerHTML('#elmID', 'Html and text string');
ajaxCom::addClass('#elmID', 'is-valid');

//Olumlu Ajax Yanıtı Alert ile Beraber
ajaxCom::true('statusCode', 'alert message', 'data');
```

**Daha falza bilgi eklenecektir.**