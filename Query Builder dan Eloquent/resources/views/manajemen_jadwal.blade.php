@extends('layouts.admin')

@section('content')
<div x-data="{ 
    openTambah: false, 
    openEdit: false, 
    openDelete: false, 
    idHapus: null, 
    jadwalEdit: {id: '', title: '', start_time: '', location: '', status: ''} 
}">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#003049] tracking-tight">Manajemen Jadwal</h1>
            <div class="flex items-center gap-2 mt-1">
                <p class="text-sm text-slate-500 font-medium">Agenda operasional toko berdasarkan data {{ ($mode ?? 'eloquent') == 'eloquent' ? 'Eloquent ORM' : 'Query Builder' }}.</p>
                <span class="px-2 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded border border-orange-200 uppercase tracking-tight">
                    Mode: {{ str_replace('_', ' ', $mode ?? 'eloquent') }}
                </span>
            </div>
        </div>
        <button @click="openTambah = true" class="bg-[#003049] hover:bg-[#002538] text-white px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
            <i class="ph ph-calendar-plus text-xl"></i> Tambah Jadwal
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-md border-t-[6px] border-[#003049] overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 uppercase text-[11px] font-bold tracking-widest text-slate-500">
                    <th class="px-8 py-5">Kegiatan</th>
                    <th class="px-8 py-5">Waktu Operasional</th>
                    <th class="px-8 py-5 text-center">Lokasi Outlet</th>
                    <th class="px-8 py-5 text-center">Status Agenda</th>
                    <th class="px-8 py-5 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($schedules as $s)
                <tr class="hover:bg-blue-50/40 transition-colors even:bg-slate-50/80">
                    <td class="px-8 py-5 font-bold text-slate-700 italic text-sm">{{ $s->title }}</td>
                    <td class="px-8 py-5">
                        <div class="text-sm font-semibold text-slate-600">{{ date('d F Y', strtotime($s->start_time)) }}</div>
                        <div class="text-[11px] text-slate-400 font-mono">{{ date('H:i', strtotime($s->start_time)) }} WIB</div>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 rounded-lg text-xs font-medium text-slate-600 border border-slate-200">
                            <i class="ph ph-map-pin"></i> {{ $s->location }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-center">
                        @if($s->status == 'Selesai')
                            <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase border border-emerald-100">● {{ $s->status }}</span>
                        @else
                            <span class="bg-orange-50 text-orange-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase border border-orange-100">● {{ $s->status }}</span>
                        @endif
                    </td>
                    <td class="px-8 py-5 text-right text-slate-400">
                        <div class="flex justify-end gap-5">
                            <button @click="openEdit = true; jadwalEdit = {id: '{{$s->id}}', title: '{{$s->title}}', start_time: '{{ date('Y-m-d\TH:i', strtotime($s->start_time)) }}', location: '{{$s->location}}', status: '{{$s->status}}'}" class="hover:text-blue-600 transition-transform hover:scale-125">
                                <i class="ph ph-note-pencil text-xl"></i>
                            </button>
                            <button @click="openDelete = true; idHapus = '{{ $s->id }}'" class="hover:text-red-600 transition-transform hover:scale-125">
                                <i class="ph ph-trash text-xl"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-show="openTambah" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[450px] shadow-2xl border-t-[10px] border-[#003049]">
            <h2 class="text-2xl font-bold text-[#003049] mb-6">Tambah Jadwal</h2>
            <form action="/schedules/store" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Kegiatan</label>
                        <input type="text" name="title" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Waktu Mulai</label>
                        <input type="datetime-local" name="start_time" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Lokasi Outlet</label>
                        <input type="text" name="location" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-10">
                    <button type="button" @click="openTambah = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[450px] shadow-2xl border-t-[10px] border-[#003049]">
            <h2 class="text-2xl font-bold text-[#003049] mb-6">Update Jadwal</h2>
            <form :action="'/schedules/update/' + jadwalEdit.id" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase">Kegiatan</label>
                        <input type="text" name="title" x-model="jadwalEdit.title" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase">Waktu</label>
                        <input type="datetime-local" name="start_time" x-model="jadwalEdit.start_time" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase">Lokasi</label>
                            <input type="text" name="location" x-model="jadwalEdit.location" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase">Status</label>
                            <select name="status" x-model="jadwalEdit.status" class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none">
                                <option value="Mendatang">Mendatang</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-10">
                    <button type="button" @click="openEdit = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openDelete" class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[400px] text-center shadow-2xl border border-slate-100">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-100">
                <i class="ph ph-warning-octagon text-4xl"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-800 mb-2">Hapus Jadwal?</h2>
            <p class="text-slate-500 text-sm mb-8 leading-relaxed">Data agenda ini akan dihapus permanen. Apakah Anda yakin?</p>
            <div class="flex gap-3">
                <button @click="openDelete = false" class="flex-1 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-50 transition">Batal</button>
                <a :href="'/schedules/delete/' + idHapus" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-red-200 transition flex items-center justify-center">Ya, Hapus</a>
            </div>
        </div>
    </div>

</div>
@endsection