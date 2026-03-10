@extends('layouts.admin')

@section('content')
<div x-data="{ 
    openTambah: false, 
    openEdit: false, 
    openDelete: false, 
    idHapus: null, 
    userEdit: {id: '', name: '', email: '', role: ''} 
}">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#003049] tracking-tight">Manajemen User</h1>
            <div class="flex items-center gap-2 mt-1">
                <p class="text-sm text-slate-500 font-medium">Kelola hak akses dan data pengguna secara tersentralisasi.</p>
                <span class="px-2 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded border border-orange-200 uppercase tracking-tight">
                    Mode: {{ str_replace('_', ' ', $mode ?? 'eloquent') }}
                </span>
            </div>
        </div>
        <button @click="openTambah = true" class="bg-[#003049] hover:bg-[#002538] text-white px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
            <i class="ph ph-user-plus text-xl"></i> Tambah User
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-md border-t-[6px] border-[#003049] overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 uppercase text-[11px] font-bold tracking-widest text-slate-500">
                    <th class="px-8 py-5">Nama Lengkap</th>
                    <th class="px-8 py-5">Email</th>
                    <th class="px-8 py-5 text-center">Jabatan</th>
                    <th class="px-8 py-5 text-center">Status</th>
                    <th class="px-8 py-5 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($users as $user)
                <tr class="hover:bg-blue-50/40 transition-colors even:bg-slate-50/80">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-[#003049] text-white rounded-full flex items-center justify-center font-bold text-xs shadow-md">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <span class="font-bold text-slate-700 text-sm">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-slate-500 text-sm font-medium">{{ $user->email }}</td>
                    <td class="px-8 py-5 text-center">
                        <span class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-[10px] font-black uppercase border border-blue-200">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold border border-emerald-100">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                            {{ $user->status }}
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end gap-5 text-slate-400">
                            <button @click="openEdit = true; userEdit = {id: '{{$user->id}}', name: '{{$user->name}}', email: '{{$user->email}}', role: '{{$user->role}}'}" class="hover:text-blue-600 transition-transform hover:scale-125">
                                <i class="ph ph-pencil-simple text-xl"></i>
                            </button>
                            <button @click="openDelete = true; idHapus = '{{ $user->id }}'" class="hover:text-red-600 transition-transform hover:scale-125">
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
            <h2 class="text-2xl font-bold text-[#003049] mb-6">Tambah User Baru</h2>
            <form action="/users/store" method="POST">
                @csrf
                <div class="space-y-4 text-left">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Lengkap</label>
                        <input type="text" name="name" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email Perusahaan</label>
                        <input type="email" name="email" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Role Jabatan</label>
                        <select name="role" class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                            <option value="ADMIN">ADMIN</option>
                            <option value="EDITOR">EDITOR</option>
                            <option value="VIEWER">VIEWER</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-10">
                    <button type="button" @click="openTambah = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Simpan User</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[450px] shadow-2xl border-t-[10px] border-[#003049]">
            <h2 class="text-2xl font-bold text-[#003049] mb-6">Edit Data User</h2>
            <form :action="'/users/update/' + userEdit.id" method="POST">
                @csrf
                <div class="space-y-4 text-left">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Lengkap</label>
                        <input type="text" name="name" x-model="userEdit.name" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</label>
                        <input type="email" name="email" x-model="userEdit.email" required class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Role</label>
                        <select name="role" x-model="userEdit.role" class="w-full border-2 border-slate-100 rounded-xl p-3 mt-1 focus:border-[#003049] outline-none transition">
                            <option value="ADMIN">ADMIN</option>
                            <option value="EDITOR">EDITOR</option>
                            <option value="VIEWER">VIEWER</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-10">
                    <button type="button" @click="openEdit = false" class="font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="bg-[#003049] text-white px-8 py-3 rounded-xl font-bold shadow-lg">Perbarui Data</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="openDelete" class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm" x-cloak x-transition>
        <div class="bg-white rounded-3xl p-8 w-[400px] text-center shadow-2xl border border-slate-100">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm border border-red-100">
                <i class="ph ph-warning-octagon text-4xl"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-800 mb-2">Hapus User?</h2>
            <p class="text-slate-500 text-sm mb-8 leading-relaxed">Tindakan ini tidak dapat dibatalkan. Data user ini akan dihapus permanen dari database.</p>
            
            <div class="flex gap-3">
                <button @click="openDelete = false" class="flex-1 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-50 transition">Batal</button>
                <a :href="'/users/delete/' + idHapus" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-red-200 transition text-center flex items-center justify-center">Ya, Hapus</a>
            </div>
        </div>
    </div>

</div>
@endsection