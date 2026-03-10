@extends('layouts.admin')

@section('content')
<div x-data="{ 
    openTambah: false, 
    openEdit: false, 
    openDelete: false, 
    idHapus: null, 
    outletEdit: {id: '', code: '', name: '', address: '', phone: '', status: ''} 
}">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#003049] tracking-tight">Manajemen Outlet</h1>
            <div class="flex items-center gap-2 mt-1">
                <p class="text-sm text-slate-500 font-medium">
                    Kelola lokasi cabang menggunakan teknik 
                    <span class="font-bold text-slate-700">{{ ($mode ?? 'eloquent') == 'eloquent' ? 'Eloquent ORM' : 'Query Builder' }}</span>.
                </p>
                <span class="px-2 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded border border-orange-200 uppercase tracking-tight">
                    Mode: {{ str_replace('_', ' ', $mode ?? 'eloquent') }}
                </span>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button @click="openTambah = true" class="bg-[#003049] hover:bg-[#002538] text-white px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <i class="ph ph-storefront text-xl"></i> Tambah Outlet
            </button>
        </div>
    </div>

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl shadow-sm">
        <div class="flex items-center gap-2 text-red-700 font-bold text-sm mb-1">
            <i class="ph ph-warning-circle text-lg"></i> Gagal Menyimpan Data:
        </div>
        <ul class="list-disc list-inside text-xs text-red-600 font-medium">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md border-t-[6px] border-[#003049] overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 uppercase text-[11px] font-bold tracking-widest text-slate-500">
                    <th class="px-8 py-5">Kode</th>
                    <th class="px-8 py-5">Nama Outlet</th>
                    <th class="px-8 py-5">Alamat</th>
                    <th class="px-8 py-5 text-center">Telepon</th>
                    <th class="px-8 py-5 text-center">Status</th>
                    <th class="px-8 py-5 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($outlets as $o)
                <tr class="hover:bg-blue-50/40 transition-colors even:bg-slate-50/80">
                    <td class="px-8 py-5 font-mono text-xs font-bold text-[#003049]">{{ $o->code }}</td>
                    <td class="px-8 py-5 font-bold text-slate-700 text-sm">{{ $o->name }}</td>
                    <td class="px-8 py-5 text-slate-500 text-sm italic leading-relaxed">{{ $o->address }}</td>
                    <td class="px-8 py-5 text-center text-slate-600 text-sm font-medium">{{ $o->phone }}</td>
                    <td class="px-8 py-5 text-center">
                        <span class="{{ $o->status == 'Aktif' ? 'bg-emerald-50 text-emerald-700 border-emerald-100' : 'bg-red-50 text-red-700 border-red-100' }} px-3 py-1 rounded-full text-[10px] font-bold uppercase border">
                            ● {{ $o->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end gap-5 text-slate-400">
                            <button @click="openEdit = true; outletEdit = {id: '{{$o->id}}', code: '{{$o->code}}', name: '{{$o->name}}', address: '{{$o->address}}', phone: '{{$o->phone}}', status: '{{$o->status}}'}" class="hover:text-blue-600 transition-transform hover:scale-125">
                                <i class="ph ph-pencil-simple text-xl"></i>
                            </button>
                            <button @click="openDelete = true; idHapus = '{{ $o->id }}'" class="hover:text-red-600 transition-transform hover:scale-125">
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
        <div class="bg-white rounded-3xl p-8 w-[500px] shadow-2xl border-t-[10px] border-[#003049]">
            <h2 class="text-2xl font-bold text-[#003049] mb-6 tracking-tight">Registrasi Outlet Baru</h2>
            <form action="/outlets/store?mode={{ $mode ?? 'eloquent' }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div class="col-span-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kode Outlet</label>
                        <input type="text" name="code" placeholder="OUT-001" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div class="col-span-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">No. Telepon</label>
                        <input type="text" name="phone" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Outlet</label>
                        <input type="text" name="name" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Alamat Lengkap</label>
                        <textarea name="address" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none h-24 transition resize-none"></textarea>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-8">
                    <button type="button" @click="openTambah = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Simpan Outlet</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[500px] shadow-2xl border-t-[10px] border-[#003049]">
            <h2 class="text-2xl font-bold text-[#003049] mb-6 tracking-tight">Edit Informasi Outlet</h2>
            <form :action="'/outlets/update/' + outletEdit.id + '?mode={{ $mode ?? 'eloquent' }}'" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kode</label>
                        <input type="text" name="code" x-model="outletEdit.code" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</label>
                        <select name="status" x-model="outletEdit.status" class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Outlet</label>
                        <input type="text" name="name" x-model="outletEdit.name" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Alamat</label>
                        <textarea name="address" x-model="outletEdit.address" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none h-20 transition resize-none"></textarea>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-8">
                    <button type="button" @click="openEdit = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Update Data</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openDelete" class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[400px] text-center shadow-2xl border border-slate-100">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-100">
                <i class="ph ph-trash text-4xl"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-800 mb-2">Hapus Outlet?</h2>
            <p class="text-slate-500 text-sm mb-8 leading-relaxed">Data outlet ini akan dihapus secara permanen. Lanjutkan?</p>
            <div class="flex gap-3">
                <button @click="openDelete = false" class="flex-1 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-50 transition">Batal</button>
                <a :href="'/outlets/delete/' + idHapus + '?mode={{ $mode ?? 'eloquent' }}'" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-3.5 rounded-xl font-bold shadow-lg flex items-center justify-center transition">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection