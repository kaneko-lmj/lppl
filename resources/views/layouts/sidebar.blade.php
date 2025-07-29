
<aside class="w-64 bg-gradient-to-b from-red-700 to-red-900 text-white flex flex-col p-4 min-h-screen">
    <div class="flex items-center space-x-2 mb-8">
        <img src="{{ asset('images/logo-suara.png') }}" alt="Logo" class="w-10">
        <span class="text-xl font-bold">Suara Lumajang</span>
    </div>

    <nav class="space-y-2">
       
        <a href="/admin/dashboard" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
            <i class="fas fa-home mr-2"></i>Dashboard
        </a>
        
        @php $role = Auth::user()->role; @endphp


        @if($role === 'Super Admin')
            <a href="/admin/artikel" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-newspaper mr-2"></i>Artikel
            </a>
        
            <a href="/admin/galeri" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-image mr-2"></i>Galeri
            </a>

            <a href="/admin/informasi" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-image mr-2"></i>Informasi
            </a>
        
            <a href="/admin/talkshow" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-microphone-alt mr-2"></i>Talkshow
            </a>
        
            <a href="/admin/jadwal" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-calendar-alt mr-2"></i>Jadwal
            </a>
        
            <a href="/admin/dokumen" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-folder-open mr-2"></i>Dokumen
            </a>
        
            <a href="/admin/tim" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-user mr-2"></i>Tim
            </a>
        
            <a href="/admin/pengguna" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-users mr-2"></i>Pengguna
            </a>

        @endif


        @if($role === 'Redaktur')
            <a href="/admin/artikel" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-newspaper mr-2"></i>Artikel
            </a>
        
            <a href="/admin/galeri" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-image mr-2"></i>Galeri
            </a>

            <a href="/admin/informasi" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-image mr-2"></i>Informasi
            </a>
        @endif


        @if($role === 'Admin Program')
            <a href="/admin/talkshow" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-microphone-alt mr-2"></i>Talkshow
            </a>
        
            <a href="/admin/jadwal" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-calendar-alt mr-2"></i>Jadwal
            </a>
        @endif


        @if($role === 'Admin Sistem')
            <a href="/admin/dokumen" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-folder-open mr-2"></i>Dokumen
            </a>
            <a href="/admin/tim" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-user mr-2"></i>Tim
            </a>
            <a href="/admin/pengguna" class="flex items-center px-4 py-2 rounded hover:bg-red-800">
                <i class="fas fa-users mr-2"></i>Pengguna
            </a>
        @endif
        
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2 rounded hover:bg-red-800 mt-4">
                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
            </button>
        </form>
    </nav>
</aside>
