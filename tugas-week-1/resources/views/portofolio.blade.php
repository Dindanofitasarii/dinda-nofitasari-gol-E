<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | {{ $data->nama }}</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background-color: #f1f5f9; color: #333; }
        header { background-color: #610524; color: #ffffff; padding: 40px 20px; text-align: center; }
        section { max-width: 900px; margin: auto; padding: 30px 20px; }
        h2 { color: #0f172a; border-bottom: 2px solid #610524; padding-bottom: 5px; }
        .card { background-color: #ffffff; padding: 20px; margin-top: 15px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        footer { background-color: #610524; color: #ffffff; text-align: center; padding: 15px; margin-top: 40px; }
    </style>
</head>
<body>

    <header>
        <h1>{{ $data->nama }}</h1>
        <p>Mahasiswa {{ $data->program_studi }}</p>
        <p>{{ $data->nim }} | Golongan {{ $data->golongan }}</p>
    </header>

    <section>
        <h2>Tentang Saya</h2>
        <div class="card">
            <p>{{ $data->tentang_saya }}</p>
        </div>
    </section>

    <section>
        <h2>Data Akademik</h2>
        <div class="card">
            <ul>
                <li>Jurusan : {{ $data->jurusan }}</li>
                <li>Program Studi : {{ $data->program_studi }}</li>
                <li>Golongan : {{ $data->golongan }}</li>
            </ul>
        </div>
    </section>

    <section>
        <h2>Kontak</h2>
        <div class="card">
            <p>Email : {{ $data->email }}</p>
            <p>Instagram : {{ $data->instagram }}</p>
        </div>
    </section>

    <footer>
        <p>© {{ date('Y') }} {{ $data->nama }}</p>
    </footer>

</body>
</html>