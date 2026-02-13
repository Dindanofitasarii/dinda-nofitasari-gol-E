@extends('app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-maroon mb-6 border-b-2 border-maroon pb-2">Projek Portofolio CV</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 shadow rounded border-t-4 border-maroon">
            <h3 class="font-bold text-lg text-maroon">Project Laravel Membuat CV</h3>
            <p class="text-gray-600">Deskripsi singkat projek pertama kamu.</p>
        </div>
        <div class="bg-white p-6 shadow rounded border-t-4 border-maroon">
            <h3 class="font-bold text-lg text-maroon">Project Laravel 02</h3>
            <p class="text-gray-600">Deskripsi singkat projek kedua kamu.</p>
        </div>
    </div>
    <div class="mt-8">
        <a href="{{ url('/') }}" class="text-maroon font-bold hover:underline">← Kembali ke Beranda</a>
    </div>
</div>
@endsection