<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Dinda Nofitasari</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f1f5f9;
            color: #333;
        }

        header {
            background-color: #610524;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }

        section {
            max-width: 900px;
            margin: auto;
            padding: 30px 20px;
        }

        h2 {
            color: #0f172a;
            border-bottom: 2px solid #610524;
            padding-bottom: 5px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        footer {
            background-color: #610524;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Dinda Nofitasari</h1>
        <p>Mahasiswa Teknik Informatika</p>
        <p>E41242053 | Golongan E</p>
    </header>

    <!-- Tentang Saya -->
    <section>
        <h2>Tentang Saya</h2>
        <div class="card">
            <p>
                Saya adalah mahasiswa Jurusan Teknologi Informasi, Program Studi Teknik Informatika.
                Saya memiliki ketertarikan pada bidang pemrograman, pengembangan web, dan teknologi informasi.
                Website ini dibuat sebagai portofolio sederhana untuk memperkenalkan diri saya.
            </p>
        </div>
    </section>

    <!-- Data Akademik -->
    <section>
        <h2>Data Akademik</h2>
        <div class="card">
            <ul>
                <li>Jurusan : Teknologi Informasi</li>
                <li>Program Studi : Teknik Informatika</li>
                <li>Golongan : E</li>
            </ul>
        </div>
    </section>

    <!-- Keahlian -->
    <section>
        <h2>Keahlian</h2>
        <div class="card">
            <ul>
                <li>HTML & CSS Dasar</li>
                <li>PHP Dasar</li>
                <li>Laravel Dasar</li>
                <li>Database MySQL</li>
            </ul>
        </div>
    </section>

    <!-- Kontak -->
    <section>
        <h2>Kontak</h2>
        <div class="card">
            <p>Email : dinda@email.com</p>
            <p>Instagram : @dindanofitasari</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} Dinda Nofitasari</p>
    </footer>

</body>
</html>
