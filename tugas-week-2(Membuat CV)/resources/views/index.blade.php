@extends('app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden border-t-[12px] border-maroon">
    <div class="p-10">
        <div class="text-center mb-8">
            <div class="w-32 h-32 bg-gray-100 rounded-full mx-auto mb-4 border-4 border-maroon flex items-center justify-center shadow-inner overflow-hidden">
                <img src="{{ asset('images/profile.jpeg') }}" 
                    alt="Foto Dinda Nofitasari" 
                    class="w-full h-full object-cover object-center">
            </div>
            <h1 class="text-4xl font-extrabold text-maroon tracking-tight">DINDA NOFITASARI</h1>
            <p class="text-gray-500 font-medium uppercase tracking-widest mt-1">UI/UX & Student</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-maroon border-b-2 border-maroon pb-1 inline-block">Profil Saya</h3>
                <div class="bg-gray-50 p-4 rounded-xl border-l-4 border-maroon">
                    <p class="text-sm text-gray-600 mb-2"><strong>Email:</strong> sarinofitadinda@gmail.com</p>
                    <p class="text-sm text-gray-600 mb-2"><strong>Pendidikan:</strong> Teknik Informatika</p>

                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-xl font-bold text-maroon border-b-2 border-maroon pb-1 inline-block">Keahlian</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-maroon text-white px-3 py-1 rounded-full text-xs">Laravel</span>
                    <span class="bg-maroon text-white px-3 py-1 rounded-full text-xs">Figma</span>
                    <span class="bg-maroon text-white px-3 py-1 rounded-full text-xs">MySQL</span>
                    <span class="bg-maroon text-white px-3 py-1 rounded-full text-xs">PHP</span>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center border-t pt-8">
            <p class="text-gray-400 text-sm mb-4">Ingin melihat karya saya?</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/portfolio') }}" class="bg-maroon text-white px-10 py-3 rounded-lg font-bold hover:bg-red-900 shadow-lg transition-all transform hover:-translate-y-1">
                    Buka Portofolio
                </a>
                
                <a href="mailto:sarinofitadinda@gmail.com" class="border-2 border-maroon text-maroon px-10 py-3 rounded-lg font-bold hover:bg-maroon hover:text-white transition-all shadow-md">
                    Hubungi Saya!
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-10 text-gray-400 text-xs uppercase tracking-tighter">
    Created with Laravel & Maroon Theme © 2026
</footer>
@endsection