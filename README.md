
# Sistem Informasi Penyakit Menular

Sistem Informasi Penyakit Menular Kota Baubau

![alt text](https://github.com/thegenzo/sistem-informasi-penyakit-menular/blob/main/image.png?raw=true)

# Fitur
<li>Display peta persebaran penyakit menular dengan Leaflet.js</li>
<li>CRUD Data Penyakit</li>
<li>CRUD Data Kecamatan</li>
<li>CRUD Data FASKES</li>
<li>CRUD Data Kasus</li>

## Instalasi

Install project ini dengan melakukan perintah
``` composer install ```

Setup database anda di file ```.env```

Jalankan perintah 
``` php artisan migrate --seed ```

## Run

Dari direktori utama project ini, jalankan perintah
``` php artisan serve ```

Buka browser anda dan masuk di url ```localhost:8000```
<br>
<br>
Login:
<br>
admin@gmail.com
<br>
admin123

## Special thanks to

Stisla Admin Dashboard by <a href="https://github.com/nauvalazhar">Nauval Azhar</a>

Map library by <a href="https://github.com/Leaflet/Leaflet">Leaflet</a>
