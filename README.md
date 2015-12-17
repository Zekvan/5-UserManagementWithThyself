# 5-UserManagementWithThyself
##Sorun:
- [Proje 4](https://github.com/100ProjedeSeniorWebDeveloper/4-User-Management-With-Avatars) te tamamladığımızın üstüne müşterilerimizin kendi müşterilerini ekliyebilmesi için
  - Kayıt sistemi
    - kayıt olan kişi mail aracılığı ile mail adresini onaylayıp sisteme giriş yapmalı
  - Giriş Sistemi
    - Sadece eposta adresini onaylayan kişiler giriş yapabilecek
  - Şifremi Unuttum?
    - Müşteri epostasını girerek bir mail alır
    - Mail onay linkini tıkladıktan sonra şifresini yeniden girer
  - Müşterinin Müşterisi
    - Müşteri bir müşteriyi eklediğinde eklenen müşteriye otomatik olarak bir mail gönderilir
    - Eğer eklenen müşteriye gelen maili müşteri onaylarsa sadece şifre girerek sisteme kayıt olabilir(eposta doğrulaması yok)
    - Eğer bir müşteri daha önceden eklenmiş bir müşterinin epostasını sisteme eklerse sistem sadece müşteriyi ekliyen müşterinin müşterisi olarak atar.
  - Yetkilendirme Sistemi


##Extra
- Kişi ekleme ekranında tür seçerek eklenen kişilere özel roller tanımlanabilir ve bazı kişilerin resimleri eklenebilirken bazılarının eklenmesine greek olmuyabilir. Not rol tanımları için extra tablo gereklidir.
- Rola bağlı çoklu kullanıcı ekleme

##Önemi?
- Many to many rules

##Kaynaklar
php.net

##Not
- Veri tabanı kullanılacaktır
- Sql export dosyası commite eklenmelidir.
- Max 2 tablo kullanma hakkınız var


----
Saygılarımla 

Kemal Kanok
