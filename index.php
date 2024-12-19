<?php
// Nama Pengantin 
$namaPengantin = array(
    array("Adam", "Hawa"),
    array("Adam Fadlan", "Hawa Saidah"),
    array("Ridwan", "Romlan") //Nama Ortu Mempelai
);

// Tanggal Undangan
$tanggalUndangan = array(
    "12 Maret 2024",
    "13 Maret 2024"
);
$hariUndangan = array(
    "Ahad",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
);
$waktuUndangan = array(
    "09.00 WIB",
    "15.00 WIB"
);
$lokasi = array(
    "Jl. Raya Bungur, RT.001/RW.024, Pejuang, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17131",
    "Jl. Harapan Indah Boulevard No.10-12, RT.004/RW.030, Medan Satria, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17131"
);

// Nama Tujuan Undangan
$receiver = "Budi";

// Surah
$ayat = array("وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا لِّتَسْكُنُوْٓا اِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَّوَدَّةً وَّرَحْمَةًۗ اِنَّ فِيْ ذٰلِكَ لَاٰيٰتٍ لِّقَوْمٍ يَّتَفَكَّرُوْنَ۝٢١", "Di antara tanda-tanda (kebesaran)-Nya ialah bahwa Dia menciptakan pasangan-pasangan untukmu dari
(jenis) dirimu sendiri agar kamu merasa tenteram kepadanya. Dia menjadikan di antaramu rasa
cinta dan kasih sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda
(kebesaran Allah) bagi kaum yang berpikir.");




//assets
//Video
$video = "assets/video/anime-video.mp4";

//Audio
$audio = "assets/audio/golden-hour-beautiful-piano-music-203835.mp3";

//images
$images = array(
    //Foto Pengantin
    array(
        "assets/image/pengantinPria.jpg",
        "assets/image/pengantinWanita.jpg"
    ),
    //Texture background
    array(
        "assets/image/texture1.jpg",
        "assets/image/texture2.jpg",
        "assets/image/texture3.jpg",
        "assets/image/texture4.jpg",
        "assets/image/texture5.jpg",
        "assets/image/texture6.jpg",
        "assets/image/texture7.jpg",
        "assets/image/texture8.jpg",
        "assets/image/texture9.jpg",

    ),
    //Foto Pengantin
    array(
        "assets/image/wedding-photo.jpeg",
        "assets/image/ring.jpg"
    ),
    //Elemen
    array(
        "assets/image/elemen1.png",
        "assets/image/elemen2.png",
        "assets/image/elemen3.png",
        "assets/image/elemen4.png",
        "assets/image/elemen5.png",
        "assets/image/elemen6.png",
        "assets/image/elemen7.png",
        "assets/image/elemen8.png",
        "assets/image/elemen9.png",
        "assets/image/elemen10.png",
        "assets/image/elemen11.png",
        "assets/image/elemen12.png",
    ),
    //Nav Icon
    array(
        "assets/image/navIcon1.png",
        "assets/image/navIcon2.png",
        "assets/image/navIcon3.png",
        "assets/image/navIcon4.png",
        "assets/image/navIcon5.png",
    )
);

//RSVP
include 'service/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $attendance = htmlspecialchars($_POST["attendance"]);
    $food = htmlspecialchars($_POST["food"]);
    $requests = htmlspecialchars($_POST["requests"]);
    $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO rsvp (name, email, phone, attendance, food, requests, subscribe) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone, $attendance, $food, $requests, $subscribe);

    if ($stmt->execute()) {
        echo "<p style='color: green; position: absolute; left: 50%; transform: translate(-50%, -50%);'>Your RSVP has been recorded successfully.</p>";
    } else {
        echo "<h2>Error:</h2><p>There was an error saving your RSVP. Please try again.</p>";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
}

//Mengganti Nama tujuan undangan dari URL
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $receiver = $value;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lavishly+Yours&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lavishly+Yours&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lavishly+Yours&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+AT:ital,wght@0,100..400;1,100..400&family=Playwrite+CU:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Lavishly+Yours&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/png" href="assets/image/facIcon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Wedding</title>
</head>

<body>
    <!--Cover-->
    <header>
        <div class="cover" style="background-image: url('assets/image/texture1.jpg');">
            <div class="cover-content-title">
                <div class="" width="100%" height="100%">
                    <div class="floating-container">
                        <div class="floating-element float-1"><img src="assets/image/elemen11.png" alt="" width="30px"></div>
                        <div class="floating-element float-2"><img src="assets/image/elemen11.png" alt="" width="40px"></div>
                        <div class="floating-element float-3"><img src="assets/image/elemen11.png" alt="" width="40px"></div>
                    </div>
                    <div class="couple">
                        <img src="assets/image/coupleIlustration.png" alt="" width="70%" height="100%">
                        <div class="main-text">
                            <h1> <?= $namaPengantin[0][0] ?> & <?= $namaPengantin[0][1] ?></h1>
                            <h3><?= $hariUndangan[1], ", ", $tanggalUndangan[0] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="invitation cover-content-1">
                    <div class="btn">
                        <button class="button" onclick="bukaundangan()" id="open-invitation-btn">Open
                            Invitation</button>
                    </div>
                    <div class="box">
                        <p>Dear : <br><?= $receiver ?> dan Keluarga</p>
                    </div>
                </div>
            </div>
            <div class="footer-cover">
                <img src=<?= $images[3][0] ?> alt="element">
                <img src=<?= $images[3][8] ?> alt="element">
            </div>
        </div>
    </header>
    <!--EndCover-->

    <!-- StartContent -->
    <div class="content">
        <!-- Audio -->
        <audio id="audioPlayer" controls>
            <source src="assets/audio/golden-hour-beautiful-piano-music-203835.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="music-player" id="musicPlayer">
            <button id="playButton" onclick="toggleMusic()">
                <i class="fa-solid fa-volume-xmark"></i>
            </button>
        </div>
        <!-- EndAudio -->

        <!--Navbar-->
        <div class="footer-navbar">
            <nav>
                <ul>
                    <li><a href="#about"><img src=<?= $images[4][2] ?> alt=""></a></li>
                    <li><a href="#date-location"><img src=<?= $images[4][1] ?> alt=""></a></li>
                    <li><a href="#gallery"><img src=<?= $images[4][0] ?> alt="Galeri"></a></li>
                    <li><a href="#rsvp"><img src=<?= $images[4][4] ?> alt=""></a></li>
                    <li><a href="#pesan"><img src=<?= $images[4][3] ?> alt=""></a></li>
                </ul>
            </nav>
        </div>
        <!-- End NavBar -->

        <!--MainContent-->
        <main>
            <!-- First Page -->
            <div class="main-photo">
                <img src=<?= $images[2][0] ?> alt="wedding-photo">
                <!-- Main Text in Content -->
                <div class="mainText1">
                    <h3>The Wedding of</h3>
                    <h2><?= $namaPengantin[0][0] ?> & <?= $namaPengantin[0][1] ?></h2>
                </div>
            </div>

            <div class="floating-container">
                <div class="floating-element float-1"><img src=<?= $images[3][10] ?> alt="" width="30px"></div>
                <div class="floating-element float-2"><img src=<?= $images[3][10] ?> alt="" width="40px"></div>
                <div class="floating-element float-3"><img src=<?= $images[3][10] ?> alt="" width="40px"></div>
            </div>

            <!-- Ayat -->
            <center>
                <section id="quotes">
                    <img data-aos="zoom-in-up" src=<?= $images[3][1] ?> alt="" style="margin-top: 50px;">
                    <div class="ayat">
                        <br>
                        <h3 style="font-weight: 300;" data-aos="zoom-in-up">
                            <?= $ayat[0] ?>
                        </h3>
                        <br>
                        <p data-aos="zoom-in">
                            <?= $ayat[1] ?>
                        </p>
                        <br>
                    </div>
                    <img data-aos="zoom-in-down" src=<?= $images[3][1] ?> alt=""
                        style="transform: rotate(180deg);">
                </section>
            </center>
            <!-- End Ayat -->

            <!--Profile Pengantin-->
            <section id="about" class="section2">
                <!-- Profile Pria -->
                <div id="profilPria" class="profil" data-aos="zoom-in">
                    <img src=<?= $images[0][0] ?> alt="">
                    <h2 class="nama"><?= $namaPengantin[1][0] ?> <br>Putra dari Bapak <?= $namaPengantin[2][0] ?></h2>
                    <div class="sosmed">
                        <img src="assets/image/instagramIcon.png" alt="" style="height: 20px; width: 20px;">
                        <a href="">Instagram</a>
                    </div>
                </div>
                <img src="assets/image/element1.png" class="element1" id="E-3" alt="" data-aos="zoom-in">
                <img data-aos="zoom-in-left" src="assets/image/plus1.png" class="plus1 left" alt="">
                <!-- Profile Wanita -->
                <div id="profilWanita" class="profil" data-aos="zoom-in">
                    <img src=<?= $images[0][1] ?> alt="">
                    <h2 class="nama">Hawa Saidah <br>Putri pertama dari Bapak Romlan</h2>
                    <div class="sosmed">
                        <img src="assets/image/logoInstagram.png" alt="" style="height: 20px; width: 20px;">
                        <a href="">Instagram</a>
                    </div>
                </div>
            </section>
            <!-- End Profile Pengantin -->

            <div class="element2" data-aos="fade-up">
                <img src=<?= $images[3][2] ?> alt="">
                <p style="font-weight: 500;
                        font-size: large;
                        color: #fff;">SAVE THE DATE...</p>
            </div>

            <!--Date and Location-->
            <center>
                <section id="date-location" class="center-DL">
                    <div id="date" data-aos="fade-in">
                        <h3 data-aos="zoom-in-up">Akad Nikah</h3>
                        <hr>
                        <br>
                        <p data-aos="zoom-in"><?= $hariUndangan[1], ", ", $tanggalUndangan[0] ?> <br>Pukul <?= $waktuUndangan[0] ?> - Selesai</p>
                        <br>
                        <div data-aos="fade-in">
                            <i class="fa-solid fa-location-dot"></i>
                            <a href=""><?= $lokasi[0] ?></a>
                        </div>
                        <hr>
                        <h3 data-aos="zoom-in-up">Resepsi</h3>
                        <hr>
                        <br>
                        <p data-aos="zoom-in-up"><?= $hariUndangan[2], ", ", $tanggalUndangan[1] ?> <br>Pukul <?= $waktuUndangan[1] ?> - Selesai</p>
                        <br>
                        <div data-aos="fade-in">
                            <i class="fa-solid fa-location-dot"></i>
                            <a href=""><?= $lokasi[1] ?></a>
                        </div>
                        <hr>
                    </div>
                    <center>
                        <div id="location" data-aos="zoom-in-up">
                            <div class="maps">
                                <h3 data-aos="fade-up">Maps</h3>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.385986464702!2d106.95786892811738!3d-6.184720815907664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698bbbc7f869a9%3A0xd3a2ab12449e6cf1!2sHotel%20Santika%20Premiere%20Kota%20Harapan%20Indah!5e0!3m2!1sid!2sid!4v1725862340344!5m2!1sid!2sid"
                                    width="100%" height="320px" style="border:0; border-radius: 15px;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </center>
                </section>
                <div class="element">
                    <img style="width: 500px;" src=<?= $images[3][4] ?> alt="">
                </div>
            </center>

            <!-- End Date and Location -->

            <!-- Gallery -->
            <center>
                <section id="gallery">
                    <div class="gallery-text">
                        <img src=<?= $images[3][10] ?> alt="" width="50px" height="50px" data-aos="zoom-in-right">
                        <h3 data-aos="fade-in">Gallery</h3>
                        <img src=<?= $images[3][10] ?> alt="" width="50px" height="50px" data-aos="zoom-in-left">
                    </div>
                    <div class="gallery-content">
                        <div class="video">
                            <div>
                                <video src="assets/video/anime-video.mp4" controls></video>
                                <iframe width="340" height="340"
                                    style="border-radius: 30px;"
                                    src="https://www.youtube.com/embed/9Nm9tU93BZo?si=SluRmJ3Y69pa9UDt"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>
                            </div>
                            <!-- <div>
                            </div> -->
                        </div>
                    </div>
                    <center>
                        <div class="gallery">
                            <div class="gallery-track">
                                <div data-aos="zoom-in" class="gallery-item"><img src="assets/image/empty-image.jpg"
                                        alt="Gambar 1">
                                </div>
                                <div data-aos="zoom-in" class="gallery-item"><img src="assets/image/empty-image.jpg"
                                        alt="Gambar 2">
                                </div>
                                <div data-aos="zoom-in" class="gallery-item"><img src="assets/image/empty-image.jpg"
                                        alt="Gambar 3">
                                </div>
                                <div data-aos="zoom-in" class="gallery-item"><img src="assets/image/empty-image.jpg"
                                        alt="Gambar 4">
                                </div>
                            </div>
                        </div>x
                    </center>
                </section>
            </center>
            <!-- End Gallery -->

            <!-- Story -->
            <section id="story">
                <h3 data-aos="zoom-in">Our Story</h3>
                <div class="story-container">
                    <button class="prev-button">&#10094;</button> <!-- Tombol kiri -->

                    <div class="story-track">
                        <div class="story-slide">
                            <img src="assets/image/empty-image.jpg" alt="Gambar 1">
                            <p class="description">Ini adalah cerita singkat untuk gambar pertama.</p>
                        </div>
                        <div class="story-slide">
                            <img src="assets/image/empty-image.jpg" alt="Gambar 2">
                            <p class="description">Ini adalah cerita singkat untuk gambar kedua.</p>
                        </div>
                        <div class="story-slide">
                            <img src="assets/image/empty-image.jpg" alt="Gambar 3">
                            <p class="description">Ini adalah cerita singkat untuk gambar ketiga.</p>
                        </div>
                        <div class="story-slide">
                            <img src="assets/image/empty-image.jpg" alt="Gambar 4">
                            <p class="description">Ini adalah cerita singkat untuk gambar keempat.</p>
                        </div>
                    </div>

                    <button class="next-button">&#10095;</button> <!-- Tombol kanan -->
                </div>
            </section>
            <!-- End Story -->

            <!-- Tamu -->
            <img class="center" src="assets/image/elemen2.png" alt="" style="transform: rotate(180deg);"
                data-aos="zoom-in-up">
            <section id="Tamu">
                <table data-aos="zoom-in-up">
                    <caption data-aos="zoom-in">Daftar Tamu Khusus</caption>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="2">Keterangan</th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>Hubungan</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dr. Ahmad Doel</td>
                        <td>Dokter Spesialis</td>
                        <td>Senior</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Prof. Jane Smith</td>
                        <td rowspan="2">Dosen Fakultas Kedokteran</td>
                        <td>Dosen Matkul Ilmu Bedah</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mr. Robert Brown</td>
                        <td>Dosen Matkul Anatomi</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Teman Mahasiswa Universitas</td>
                        <td>Mahasiswa Fakultas Kedokteran</td>
                        <td>Teman</td>
                    </tr>
                </table>
            </section>
            </center>
            <!-- End Tamu -->

            <!-- RSVP -->
            <div id="rsvp" style="text-align: center; margin-top: 50px;">
                <button onclick="openModal()" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Open RSVP Form
                </button>
            </div>

            <img data-aos="zoom-in-left" src="assets/image/plus1.png" class="plus1 left" alt="">
            <div class="modal-overlay" id="modalOverlay">
                <div class="modal-box">
                    <div class="modal-header">
                        <h4>RSVP Confirmation</h4>
                        <button class="close-button" onclick="closeModal()">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Kedatangan</label>
                                <div class="radio-group">
                                    <input type="radio" id="datang" name="attendance" value="Datang" required>
                                    <label for="datang">Datang :)</label>
                                    <input type="radio" id="tidak_datang" name="attendance" value="Tidak Datang" required>
                                    <label for="tidak_datang">Tidak Datang :(</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="food">Preferred food:</label>
                                <select id="food" name="food" required>
                                    <option value="Chicken">Chicken</option>
                                    <option value="Beef">Beef</option>
                                    <option value="Vegetarian">Vegetarian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="requests">Special Requests:</label>
                                <textarea id="requests" name="requests" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="subscribe" name="subscribe">
                                <label for="subscribe">Subscribe to updates</label>
                            </div>
                            <button type="submit" class="submit-button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hadiah -->
            <section data-aos="zoom-in-up" id="gift">
                <center>
                    <h5 data-aos="zoom-in-up">Kirim Hadiah</h5>
                    <div class="gift-container">
                        <div class="qr-section">
                            <h2>Transfer melalui QR Code</h2>
                            <img src="assets/image/qr_code.jpg" alt="Kode QR untuk transfer" class="qr-image">
                        </div>

                        <div class="bank-info">
                            <h2>BCA</h2>
                            <p id="rekeningText">1234-5678-91011</p>
                            <button class="copy-button" onclick="copyText()">Salin Nomor Rekening</button>
                        </div>
                    </div>
                </center>
            </section>
            <!-- End Hadiah -->

            <!-- Pesan -->
            <center>
                <section id="pesan">
                    <div class="message-container">
                        <div id="notification" class="notification">
                            Terimakasih atas pesan nya!
                        </div>
                        <h2 data-aos="zoom-in">Pesan & Doa untuk Pengantin</h2>
                        <form id="messageForm">
                            <!-- Textbox for the Message -->
                            <label for="message">Tulis Pesan/Doa:</label>
                            <textarea id="message" name="message" rows="4"
                                placeholder="Tulis pesan atau doa Anda di sini..." required></textarea>

                            <!-- Format Text Option -->
                            <label for="format">Pilih Format Pesan:</label>
                            <select id="format" name="format" required>
                                <option value="text">Teks Biasa</option>
                                <option value="list">Daftar (List)</option>
                            </select>

                            <!-- Submit Button -->
                            <button type="submit" onclick="sendMessage()">Kirim Pesan</button>
                        </form>
                    </div>
                </section>
            </center>
            <!-- End Pesan -->
            <br>
            <hr>
            <!-- Ucapan TerimaKasih -->
            <footer data-aos="fade-up">
                <div class="element">
                    <img class="sidePic left" src=<?= $images[3][5] ?> alt="">
                    <img class="sidePic right" src=<?= $images[3][5] ?> alt="">
                </div>
                <h3>Kami pihak yang berbahagia Mengharapkan kehadiran Ibu, Bapak, Saudara/i untuk hadir pada acara kami
                </h3>
                <h2>Terima Kasih</h2>
            </footer>
            <!-- <audio style="display: none;" id="wedding-audio" src="Audio/golden-hour-beautiful-piano-music-203835.mp3" volume="0.5" controls></audio> -->
        </main>
    </div>


    <!-- Script -->
    <script src="https://kit.fontawesome.com/d6979c3635.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="script.js"></script>
</body>

</html>