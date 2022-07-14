<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use App\Models\EventFestival;
use App\Models\TourPackage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        EventFestival::create([
            'judul' => 'Upacara Adat Jawa Timur Kebo-keboan',
            'lokasi' => 'Banyuwangi, Jawa Timur',
            'gambar' => '1649682948Kebo-keboan.jpg',
            'excerpt' => 'Pada saat setiap tahun masyarakat daerah Banyuwangi berusaha untuk menjaga sebuah tradisi kemurnian dan juga kesakralan budaya mereka. Asal-usul tradisi kebo-keboan ini berasal karena banyaknya sebuah...',
            'deskripsi' => '<p>Pada saat setiap tahun masyarakat daerah Banyuwangi berusaha untuk menjaga sebuah tradisi kemurnian dan juga kesakralan budaya mereka. Asal-usul tradisi kebo-keboan ini berasal karena banyaknya sebuah musibah pageblok.</p><p>Pada saat waktu itu masyarakat terkena wabah penyakit dan juga tanaman yang dapat merugikan warga daerah tersebut. Banyak dari warga yang meninggal dan juga kelaparan akibat adanya penyakit misterius tersebut.</p><p>Nah, pada saat terjadi bencana wabah tersebut, salah satu dari sesepuh bernama mbah Karti mendapat wangsit atau mimpi dari semedinya di sebuah bukit untuk melakukan kebo-keboan dan juga mengangungkan Dewi Sri</p><p>Singkat cerita ada sebuah keajaiban yang tak disangka muncul ketika waga sekitar melaksanakan ritual Kebo-Keboan. Banyak dari warga yang sakit mendadak menjadi sehat, juga hama yang menyerang tanaman warga hilang tidak tau kemana. Akhirnya mulai saat itu ritual kebo-keboan terus dilestarikan oleh masyarakat daerah itu, kemudian muncul perasaan resah dan juga takut jika tidak melakukan tradisi kebo-keboan tersebut.</p>'
        ]);
        
        EventFestival::create([
            'judul' => 'Upacara Adat Jawa Timur Labuh Sesaji',
            'lokasi' => 'Magetan, Jawa Timur',
            'gambar' => '1649683031Labuh-Sesaji.jpg',
            'excerpt' => 'Labuh sesaji adalah salah satu kebiasaan tahunan yang telah digelar di Telaga Sarangan, Magetan. Waktu untuk melaksanakan tradisi Labuh Sesaji ini pada bulan Ruwah, hari Jum’at Pon. Tujuan dari upacara...',
            'deskripsi' => '<p>Labuh sesaji adalah salah satu kebiasaan tahunan yang telah digelar di Telaga Sarangan, Magetan. Waktu untuk melaksanakan tradisi Labuh Sesaji ini pada bulan Ruwah, hari Jum’at Pon.</p><p>Tujuan dari upacara Labuh sesaji ini sebagai tanda terima kasih dari masyarakat kepada Tuhan Yang Maha Esa. Masyarakat menganggap bahwa Telaga Sarangan adalah sebuah hadiah dari Tuhan, Telaga Sarangan dianggap dapat mendatangkan kemakmuran bagi masyarakat Magetan dan juga Masyarakat Indonesia.</p>'
        ]);

        EventFestival::create([
            'judul' => 'Upacara Adat Jawa Timur Larung Sesaji',
            'lokasi' => 'Jawa Timur',
            'gambar' => '1649683104Larung-Sesaji.jpg',
            'excerpt' => 'Upacara adat Larung sesaji berbeda dengan upacara adat Labuh sesaji. Larung sesaji adalah sebuah tradisi upacara adat yang dilakukan oleh masyarakat Jawa Timur yang berada di daerah pesisir pantai uta...',
            'deskripsi' => '<p>Upacara adat Larung sesaji berbeda dengan upacara adat Labuh sesaji. Larung sesaji adalah sebuah tradisi upacara adat yang dilakukan oleh masyarakat Jawa Timur yang berada di daerah pesisir pantai utaran dan pantai selatan.</p><p>Upacara ini dapat dilakukan dengan cara menghanyutkan sesajen ke laut dalam rangka sebagai tanda rasa syukur dari hasil tangkapan ikan selama mereka melaut. Upacara larung sesaji ini umumnya dilaksanakan pada tanggal 1 muharram atau satu suro.</p>'
        ]);

        EventFestival::create([
            'judul' => 'Upacara Adat Jawa Timur Grebegan',
            'lokasi' => 'Jawa Timur',
            'gambar' => '1649683175Grebegan.jpg',
            'excerpt' => 'Grebegan adalah salah satu tradisi upacara adat yang memiliki sifat kesyukuran, dilakukan bersama-sama oleh masyarakat suku Jawa dengan tokoh utamanya yaitu seorang raja. Upacara adat Grebegan ini dil...',
            'deskripsi' => '<p>Grebegan adalah salah satu tradisi upacara adat yang memiliki sifat kesyukuran, dilakukan bersama-sama oleh masyarakat suku Jawa dengan tokoh utamanya yaitu seorang raja. Upacara adat Grebegan ini dilaksanakan selama tiga kali dalam datu tahun, diantaranya yaitu pada tanggal 12 Mulud, 1 Syawal, dan juga tanggal 10 bulan ke-12 Masehi.</p><p>Pada saat upacara grebegan ini raja mengeluarkan sedekahnya berupa hasil alam seperti sayuran dan juga sejenisnya, umumnya sedekah ini dibentuk seperti bidang kerucut seperti gunung, yang akan di rebutkan oleh masyakat.</p>'
        ]);

        TourPackage::create([
            'nama' => 'Bali Travel',
            'nama_paket' => 'Keliling Bali Selatan dan Bali Barat',
            'email' => 'rizky.royal@gmail.com',
            'nomor_telepon' => '081938713808',
            'alamat' => 'Desa Sukawati, Gianyar',
            'excerpt' => 'Paket travel ini sangat cocok bagi anda yang ingin mengeksplorasi Bali selatan dengan keindahan pantai nya yang sangat-sangat luar biasa. Selain itu, paket travel ini juga sangat cocok buat anda yang...',
            'kegiatan_wisata' => '<ul><li>Mengunjungi Pura Uluwatu</li><li>Mengunjungi Pantai Kuta</li><li>Mengunjungi Pantai Dreamland</li><li>Mengunjungi Pantai Pandawa</li><li>Mengunjungi Krisna Oleh-Oleh Bali</li></ul>',
            'gambar' => '1649672768gambar bali.jpg',
            'deskripsi' => '<div>Paket travel ini sangat cocok bagi anda yang ingin mengeksplorasi Bali selatan dengan keindahan pantai nya yang sangat-sangat luar biasa. Selain itu, paket travel ini juga sangat cocok buat anda yang ingin menikmati sunset yang indah di pantai kuta. Dan untuk kalian yang ingin membawa oleh-oleh khas Bali yang tentunya sangat-sangat keren, paket travel ini juga menawarkan kunjungan ke Krisna Oleh-Oleh Bali, salah satu pusat oleh oleh terkenal di bali</div>',
            'durasi' => '3 Hari',
            'pelayanan' => '<ul><li>Makan 3 kali sehari</li><li>Mobil bisa pilih</li><li>Hotel mewah</li><li>Free es kelapa muda di pantai kuta</li><li>Bisa extend sampe jam 12 malam (Harga disesuaikan)</li></ul>',
            'harga' => 750000,
        ]);

        TourPackage::create([
            'nama' => 'Wayan Travel',
            'nama_paket' => 'Keliling Bali Utara dan Bali Timur',
            'email' => 'rizky.royal@gmail.com',
            'nomor_telepon' => '081938713808',
            'alamat' => 'Desa Munduk, Tabanan',
            'excerpt' => 'Paket wisata ini sangat cocok bagi kalian yang sangat sumpek dengan pekerjaan duniawi. Pada paket wisata ini, kita akan mengeksplor Bali bagian utara dengan keindahan alam nya dan kesejukan gunung-gun...',
            'kegiatan_wisata' => '<ul><li>Berwisata ke kebun raya Bedugul</li><li>Berwisata ke pantai Buleleng</li><li>Berwisata ke Kintamani (include kopi)</li><li>Mengunjungi hutan pinus</li><li>Mengunjungi pedesaan di Bali Utara</li></ul>',
            'gambar' => '1649673385kintamani.jpg',
            'deskripsi' => '<div>Paket wisata ini sangat cocok bagi kalian yang sangat sumpek dengan pekerjaan duniawi. Pada paket wisata ini, kita akan mengeksplor Bali bagian utara dengan keindahan alam nya dan kesejukan gunung-gunung nya. Pada paket wisata ini, kita juga akan mengunjungi desa-desa kuno yang ada di Bali utara. Selain itu, kita juga akan melakukan <em>chill&nbsp;</em>di coffee shop yang ada di daerah Kintamani, tentu saja disini kalian juga bisa berswafoto dengan latar gunung batur yang sangat cantik dan menawan. Dan tidak kalah penting, pada paket wisata ini kita juga mengunjungi salah satu kebun raya terbesar yang ada di Bali.</div>',
            'durasi' => '4 Hari',
            'pelayanan' => '<ul><li>Makan 3 kali sehari</li><li>Mobil avanza atau kijang innova</li><li>Hotel bintang 5</li><li>Free refill di coffee shop Kintamani</li><li>Free ticket di kebun raya untuk 2 orang</li></ul>',
            'harga' => 800000,
        ]);

        Destination::create([
            'judul' => 'Desan Sade',
            'lokasi' => 'Lombok, NTT',
            'gambar' => '1650081312desa-sade-lombok.jpg',
            'excerpt' => 'Lombok memiliki ragam destinasi wisata kelas dunia yang menakjubkan. Tak sekadar pesona alam dan keelokan panorama laut semata....',
            'deskripsi' => '<p>Lombok memiliki ragam destinasi wisata kelas dunia yang menakjubkan. Tak sekadar pesona alam dan keelokan panorama laut semata. Namun, kearifan lokal masyarakat adat yang masih terjaga memiliki daya pikat tersendir salah satunya ialah Desa Sasak Sade.</p><p>Desa Sade menampilkan suasana perkampungan pribumi. Bangunan atap rumah warga masih terbuat dari ijuk, kuda-kuda atapnya memakai bambu tanpa paku, tembok dari anyaman bambu, dan langsung beralaskan tanah. Orang Sasak Sade menamakan bangunan itu bale. Berfoto bersama suku asli dengan keramahan nan khas menja.</p>'
        ]);
        
        Destination::create([
            'judul' => 'Desa Warebo',
            'lokasi' => 'Flores, NTT',
            'gambar' => '1650081325warebo.jpeg',
            'excerpt' => 'Rekomendasi destinasi wisata yang wajib kamu kunjungi adalah Desa Wisata Waerebo yang berada di Kabupaten Manggarai, Nusa Tenggara Timur...',
            'deskripsi' => '<p>Rekomendasi destinasi wisata yang wajib kamu kunjungi adalah Desa Wisata Waerebo yang berada di Kabupaten Manggarai, Nusa Tenggara Timur. Desa Waerebo ini sangat cocok bagi Anda pencinta alam dan menyukai tantangan.</p><p>Pasalnya, Desa Waerebo tertelatak pada ketinggian 1.200 meter di atas permukaan laut berada di barat daya kota Ruteng. Untuk sampai ke tempatnya memerlukan tenaga ekstra. Namun, tenaga yang sudah dikeluarkan bakal terbayarkan dengan hamparan pemandangan bukit yang hijau, sejuk, dan asri.</p><p>Desa Waerebo juga menjadi salah satu desa yang masih mempertahankan kearifan lokal dan memiliki keunikan, baik dari segi adat istiadatnya, struktur bangunan, cara hidup dan juga kesehariannya. Tidak hanya itu, Desa Wae Rebo juga menawarkan pemandangan unik rumah adatnya juga pemandangan alam dan keseharian masyarakatnya.</p>'
        ]);
        Destination::create([
            'judul' => 'Desan Argosari',
            'lokasi' => 'Lumajang, Jawa Timur',
            'gambar' => '1650083400desa-argosari-lumajang.jpg',
            'excerpt' => 'Desa Argosari merupakan pintu masuk sebelum mendaki ke puncak B29 dan B30. Wisata yang ditawarkan begitu memanjakan mata Anda yaitu melihat pemandangan keindahan dari sisi yang berbeda Gunung Bromo.....',
            'deskripsi' => '<p>Desa Argosari merupakan pintu masuk sebelum mendaki ke puncak B29 dan B30. Wisata yang ditawarkan begitu memanjakan mata Anda yaitu melihat pemandangan keindahan dari sisi yang berbeda Gunung Bromo.</p><p>Lokasinya berada di Kecamatan Senduro, Kabupaten Lumajang, Jawa Timur. Desa ini juga dikenal dengan negeri di atas awan. Selain itu ada titik-titik tertentu yang jika beruntung akan dapat melihat Kota Pisang ini dari ketinggian.</p><p>JIka malam tiba, desa ini cocook untuk dijadikan spot foto Milky Way selain di puncak B29. Destinasi ini sangat jauh dari hiruk pikuk ibukota serta udaranya masih segar dan sejuk, sangat cocok untuk menjadi obat jenuh dan stress.</p>'
        ]);

        Destination::create([
            'judul' => 'Desan Penglipuran',
            'lokasi' => 'Bangli, Bali',
            'gambar' => '1650083416Desa-Penglipuran-Bangli-Bali.jpg',
            'excerpt' => 'Bali tidak hanya menyajikan beragam keindahan pantai yang mempesona, tetapi juga bisa sebagai objek wisata edukasi yang mempelajari kebudayaan dan adat yang khas, seperti salah satunya ialah....',
            'deskripsi' => '<p>Bali tidak hanya menyajikan beragam keindahan pantai yang mempesona, tetapi juga bisa sebagai objek wisata edukasi yang mempelajari kebudayaan dan adat yang khas, seperti salah satunya ialah di Desa Penglipuran.</p><p>Desa Penglipuran sebuah desa yang masih mempertahankan kebudayaan dan adat istiadat yang masih sangat kental. Lokasinya berada di Desa Kubu, Kabupaten Bangli, Pravinsi Bali berada di ketinggian sekitar 600 hingga 700 meter diatas permukaan laut.</p><p>Daya tarik yang ditawarkan Desa Penglipuran ini diantaranya ialah pemandangan yang asri dan udara yang masih segar karena banyaknya tanaman hijau yang terhampar sejauh mata memandang. Selain itu, pastinya jauh dari polusi dan kebersihan yang selalu terjaga.</p><p>Pasalnya, untuk memasuki wilayah desa ini, pengunjung dilarang untuk membawa kendaraan apapun dan dilarang membuang sampah sembarangan, sehingga kualitas udara dan kebersihan lingkungan tetap terjaga.</p>'
        ]);
    }
}
