<x-app-layout>
    <section class="bg-white dark:bg-gray-900 min-h-screen sm:pl-72 sm:pr-24 lg:pl-40">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-white dark:text-white">Edit Buku</h2>
            <form action="{{ route('books.update', $booksy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="judul_buku" class="block mb-2 text-sm font-medium text-white dark:text-white">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" value="{{ old('judul_buku', $booksy->judul_buku) }}" placeholder="Judul Buku">
                        @error('judul_buku')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="penulis" class="block mb-2 text-sm font-medium text-white dark:text-white">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" value="{{ old('penulis', $booksy->penulis) }}" placeholder="Penulis">
                        @error('penulis')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="kategori" class="block mb-2 text-sm font-medium text-white dark:text-white">Kategori</label>
                        <select name="kategori" id="kategori" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                            <option value="Novel" @selected(old('kategori', $booksy->kategori) == 'Novel')>Novel</option>
                            <option value="Fiksi" @selected(old('kategori', $booksy->kategori) == 'Fiksi')>Fiksi</option>
                            <option value="Pendidikan" @selected(old('kategori', $booksy->kategori) == 'Pendidikan')>Pendidikan</option>
                            <option value="Sejarah" @selected(old('kategori', $booksy->kategori) == 'Sejarah')>Sejarah</option>
                            <option value="Biografi" @selected(old('kategori', $booksy->kategori) == 'Biografi')>Biografi</option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-white dark:text-white">Status</label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                            <option value="1" @selected(old('status', $booksy->status) == 1)>Tersedia</option>
                            <option value="0" @selected(old('status', $booksy->status) == 0)>Tidak Tersedia</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-white dark:text-white">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" value="{{ old('tahun_terbit', $booksy->tahun_terbit) }}" placeholder="Tahun Terbit Buku">
                        @error('tahun_terbit')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="jumlah_stok" class="block mb-2 text-sm font-medium text-white dark:text-white">Jumlah Stok</label>
                        <input type="number" name="jumlah_stok" id="jumlah_stok" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" value="{{ old('jumlah_stok', $booksy->jumlah_stok) }}" placeholder="Jumlah stok">
                        @error('jumlah_stok')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-white dark:text-white">Deskripsi Buku</label>
                        <textarea id="deskripsi" name="deskripsi" class="block p-2.5 w-full text-sm text-white bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600" placeholder="Isi Deskripsi atau Sinopsis Buku">{{ old('deskripsi', $booksy->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-5 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan buku
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
