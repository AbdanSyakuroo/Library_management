<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen p-3 sm:pl-72 sm:p-5 lg:pl-64">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 py-8">
            <!-- Start coding here -->
            <h1 class="font-bold text-3xl text-white mb-8">Tabel Riwayat Peminjaman Buku</h1>

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="py-2 px-4 text-left">Judul Buku</th>
                                <th class="py-2 px-4 text-left">Penulis</th>
                                <th class="py-2 px-4 text-left">Tanggal Pinjam</th>
                                <th class="py-2 px-4 text-left">Tanggal Kembali</th>
                                <th class="py-2 px-4 text-left">Status</th>
                                <th class="py-2 px-4 text-left">Pengingat</th>
                            </tr>
                        </thead>
                        @foreach ($riwayat as $isi)
                            <tbody>
                                {{-- @if ($isi->status === 'borrowed') --}}
                                    <!-- Cek jika statusnya 'borrowed' -->
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="py-2 px-4">{{ $isi->book->judul_buku }}</td>
                                        <td class="py-2 px-4">{{ $isi->book->penulis }}</td>
                                        <td class="py-2 px-4">
                                            {{ \Carbon\Carbon::parse($isi->tanggal_pinjam)->format('d/m/Y') }}</td>
                                        <td class="py-2 px-4">
                                            {{ \Carbon\Carbon::parse($isi->tanggal_kembali)->format('d/m/Y') }}</td>
                                        <td class="py-5 px-4"> <span
                                                class="px-3 py-2 text-xs font-medium rounded-full {{ $isi->status === 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">{{ Str::ucfirst($isi->status) }}</span>
                                        </td>
                                        @if($isi->status === 'borrowed')
                                        <td class="px-6 py-4">
                                            @php
                                            $hariIni = \Carbon\Carbon::now()->startOfDay();
                                            $tanggalKembali = \Carbon\Carbon::parse($isi->tanggal_kembali)->startOfDay();
                                            $sisaHari = $hariIni->diffInDays($tanggalKembali, false); // False untuk mempertahankan arah
                                        @endphp
                                        
                                        @if($sisaHari == 0)
                                            <span class="text-yellow-600 dark:text-yellow-400">Hari terakhir pengembalian</span>
                                        @elseif($sisaHari > 0)
                                            <span class="text-green-600 dark:text-green-400">Sisa {{ sprintf("%02d", $sisaHari) }} hari</span>
                                        @elseif($sisaHari < 0)
                                            <span class="text-red-600 dark:text-red-400">Terlambat {{ abs($sisaHari) }} hari</span>
                                        @endif
                                        </td>
                                        @endif
                                    </tr>
                                {{-- @endif --}}

                                {{-- <div id="modal-{{ $isi->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Isi terlebih dahulu form peminjaman buku
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="modal-{{ $isi->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form class="p-4 md:p-5" action="{{ route('books.update', $isi->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="book_id" value="{{ $isi->id }}">
                                                    <div class=" mb-4">
                                                        <div class="sm:col-span-2">
                                                            <label for="status"
                                                                class="block mb-2 text-sm font-medium text-white dark:text-white">Status</label>
                                                            <select name="status" id="status"
                                                                class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                                                                <option value="1" @selected(old('status', $isi->status) == 'borrowed')>
                                                                    Borrowed</option>
                                                                <option value="0" @selected(old('status', $isi->status) == 'available')>
                                                                    Available</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit"
                                                            class=" px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                                            Pinjam Buku
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
