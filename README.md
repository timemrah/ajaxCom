# ajaxCom

#### Nedir?
Ajax işlemleri sonucunda PHP sunucusunun tarayıcı üzerinde basit değişiklikler yapabilmesini sağlar.

#### Bunun için;
* Önce tarayıcı tarafında javascript içerisinde **ajaxCom** ile ajax işlemi başlatılır ve sunucudan **ajaxCom** kuralına uygun cevap bekler. Bu işlemin normal ajax işlemi ile hiç bir farkı yoktur. **ajaxCom** sunucudan kendi kuralına uygun cevabı bekler.
* Sonra ajax işlemine cevap verecek olan sunucudaki PHP sayfasında **ajaxCom** nesnesi ile cevap verilir.
* Sunucu tarafındaki ajaxCom tarayıcı tarafındaki ajaxCom ile anlaşarak ajax sonucunda tarayıcıda basit değişiklikler yapılmasına olanak tanır.

#### Sunucudaki ajaxCom'un tarayıcıda yapabildikleri nelerdir?
###### Ajax işlemi sonucunda; 
* Tarayıcı istenilen adrese yönlendirilebilir.

Backend (PHP) < > frontend(Javascript) ajax communication tool.

A simple way to manage the Ajax process result by the PHP server.

If we already make the necessary form controls on the front-end side, we have to do the same controls with the back-end. Also, we don't just do ajax for the form. We need this structure when we want to manage Ajax results simply on the server side.

Demo: http://sizeait.com/ajaxCom , http://sizeait.com/ajaxCom/index-basic.html

