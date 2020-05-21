# RecapHelper
##### Indira Nursyamsina Hazimi - 05111740000082
###### Repository ini merupakan bagian dari tugas EAS mata kuliah PBKK.

### Deskripsi aplikasi
- RecapHelper adalah aplikasi untuk merekap bantuan yang diterima berbasis framework _Phalcon_.
- User pada aplikasi ini merupakan admin yang bertanggung jawab dalam entri informasi bantuan yang diterima.
- User dapat menambah, menghapus, dan melihat data transaksi yang telah dientri.
- User juga dapat melihat rekap data pada halaman utama.

### Overview
#### 1. Homepage
**a. Tampilan awal Homepage**
Homepage aplikasi ini menampilkan rekap data tiap kategori dengan cara menekan tombol kategori yang diinginkan, sehingga data tersebut nantinya akan muncul (not hidden). Tombol kategori-kategori tersebut menggunakan *toggle* sehingga tekan kembali tombol tersebut untuk menyembunyikannya kembali. Halaman ini dapat dikunjungi dengan memilih fitur **Recap** pada sidebar.
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Homepage.PNG" title="Homepage" alt="Homepage">

**b. Homepage Kategori Dana**
Dengan menekan tombol Dana, maka rekap yang awalnya *hidden* akan muncul seperti gambar berikut. Informasi rekap berisi jumlah orang yang memberikan bantuan dana, jumlah dana yang terkumpul dan tabel detail kategori. Jika tombol ditekan lagi, maka seluruh informasi akan kembali *hidden*, sama dengan tampilan awal homepage. 
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Homepage - Dana.PNG" title="Homepage Dana" alt="Homepage Dana">

**c. Homepage Kategori Bahan Makanan**
Dengan menekan tombol Makanan, maka rekap yang awalnya *hidden* akan muncul seperti gambar berikut. Informasi rekap berisi jumlah orang yang memberikan bantuan bahan makanan, nama barang bahan makanan yang terkumpul dan tabel detail kategori. Jika tombol ditekan lagi, maka seluruh informasi akan kembali *hidden*, sama dengan tampilan awal homepage. 
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Homepage - Makanan.PNG" title="Homepage Makanan" alt="Homepage Makanan">

**d. Homepage Kategori Kesehatan**
Dengan menekan tombol Kesehatan, maka rekap yang awalnya *hidden* akan muncul seperti gambar berikut. Informasi rekap berisi jumlah orang yang memberikan bantuan kesehatan, nama barang kesehatan yang terkumpul dan tabel detail kategori. Jika tombol ditekan lagi, maka seluruh informasi akan kembali *hidden*, sama dengan tampilan awal homepage. 
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Homepage - Kesehatan.PNG" title="Homepage Kesehatan" alt="Homepage Kesehatan">

#### 2. List Transaksi
Halaman ini menampilkan semua record data yang telah disimpan. Pada halaman ini juga, dapat dilakukan pengelolaan data, dimana user dapat menambahkan, mengedit dan menghapus data yang ada. Halaman ini dapat dikunjungi dengan memilih fitur **List Bantuan** pada sidebar.
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/List Transaksi.PNG" title="List Transaksi" alt="List Transaksi">

#### 3. Tambah Transaksi
Halaman ini menampilkan formulir penambahan data transaksi dari bantuan yang diterima. User dapat mengisi data sesuai dengan bantuan yang diterima. Jika memilih kategori **Dana**, maka isi jumlah dana. Jika memilih kategori **Bahan Makanan** atau **Kesehatan**, maka isi nama barang. Tekan tombol *Submit* untuk menyimpan data. Halaman ini dapat dikunjungi dengan memilih fitur **Tambah Transaksi** pada sidebar.
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Tambah Transaksi.PNG" title="Tambah Transaksi" alt="Tambah Transaksi">
Tekan tombol *Tambah Bantuan* untuk menambah bantuan.
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Tambah Transaksi - Button.PNG" title="Tambah Transaksi Button" alt="Tambah Transaksi Button">

#### 4. Detail Transaksi
Halaman ini menampilkan detail satu transaksi yang dipilih. Untuk menuju halaman ini, tekan tombol *Detail* pada salah satu baris pada tabel yang berada dalam halaman **List Transaksi**.
<img src="https://github.com/xhazimix/RecapHelper/blob/master/demo/Detail Transaksi.PNG" title="Detail Transaksi" alt="Detail Transaksi">
