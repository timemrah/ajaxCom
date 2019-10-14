
# ![alt text](http://sizeait.com/ajaxCom/img/logo.png)  ajaxCom

Demo: http://sizeait.com/ajaxCom/

---

## What is ajaxCom 
**ajaxCom provides server-side javascript controls.**

A simple way to manage the browser as a result of the Ajax process by the PHP server.

It's not enough for us to check the form entries on the browser side, and we check the data on the server side. Then we can only control the server and manage the browser.

### Code Example
    ajaxCom(url, method, data, progressCallback or DOM).then( json => {
        
        /* The Ajax process was successfully completed and 
        PHP requests were forwarded to the browser.
        The browser performed these commands. 
        Now you can write what you want to do except for server commands. */
                        
    }).catch(e => { }).finally(() => { });

**More information will be added.**

---

## ajaxCom Nedir?
**ajaxCom sunucu tarafında javascript kontrolleri sağlar.**

Ajax işlemleri sonucunda PHP sunucusu ile tarayıcıyı yönetmenin basit bir yolu.

Tarayıcı tarafında form girişlerini kontrol etmemiz yeterli gelmiyor ve sunucu tarafında da bu verileri kontrol ediyoruz. O zaman sadece sunucu ile kontrol sağlayıp tarayıcıyı yönetebiliriz.

### Kod Örneği
    ajaxCom(url, method, data, progressCallback or DOM).then( json => {
        
        /* Ajax işlemi başarıyla tamamlandı ve PHP istekleri 
        tarayıcıya iletildi. Tarayıcı bu komutları yerine getirdi. 
        Artık sunucu komutları dışında ne yapmak istediğinizi
        yazabilirsiniz. */
                        
    }).catch(e => { }).finally(() => { });
    
**Daha falza bilgi eklenecektir.**