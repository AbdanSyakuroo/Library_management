<x-app-layout>

<section class="sm:pl-64 min-h-screen dark:bg-gray-800">

  
<div class="p-10">


<div class="flex flex-col">
    <div class="px-7 py-10 md:p-10 bg-white dark:bg-gray-700 rounded-xl shadow-xl">
        <div class="flex flex-col md:flex-col lg:flex-row items-center justify-center gap-8 p-4">
        <img src="perpus2.png" class='md:max-w-sm max-w-xs' alt="" />
        <div class='flex flex-col justify-center gap-4 w-4/5 lg:w-1/2'>
            
        <h1 class='text-4xl lg:text-left text-center dark:text-white'><span class='font-extrabold '>Selamat Pagi,</span> <span class='font-light'>{{ Auth::user()->name }}</span> </h1>
        <p class='mt-2 mb-2 lg:text-left text-center dark:text-white'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, blanditiis? Pariatur ducimus sit velit dolor ad hic accusantium minus recusandae, deleniti aperiam doloribus magni corrupti ipsa porro praesentium iste magnam.</p>

        <div class='flex justify-center lg:justify-start   mt-2'>
            <a href="#" class='bg-gray-200 text-black rounded-full shadow-lg hover:bg-gray-800 hover:text-white transition duration-200 px-6 py-2.5 text-center'>Baca Buku</a>
            <a href="#" class='bg-[#A78B61] text-white rounded-full hover:bg-yellow-800 hover:text-white transition duration-200 shadow-lg  px-6 py-2.5 ms-5 text-center'>Pinjam Buku</a>
        </div>
        </div>  
        </div> 
    </div>

    <div class='flex flex-col gap-2 lg:flex-row justify-between items-center'>
        <div class="md:py-5 mt-8 dark:text-white">
            <h1 class="text-2xl">Info Dashboard Buku</h1>
            <p class="text-sm md:text-base">Dashboard Informasi buku, total buku dipinjam, buku dikembalikan, Total transaksi peminjaman yang sudah terjadi</p>
        </div>
        
        <a href="{{ route('books.index') }}" class='bg-gray-300 px-6 py-2 rounded-full w-full md:w-full lg:mt-10 lg:mb-0 sm:mb-5 sm:mt-5 lg:w-auto text-center' >Kelola</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7 p-2">
        <div class='text-9xl bg-[#6e987c] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
          <div class='flex items-center justify-between w-full '>
            <h2 class='text-5xl me-2'>{{$buku}}</h2>
          </div>
          <h4 class='text-lg'>Total Buku</h4>
        </div>

        <div class='text-9xl bg-[#22615D] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
          <div class='flex items-center justify-between w-full '>
            <h2 class='text-5xl me-2'>{{$pinjambuku}}</h2>
          </div>
          <h4 class='text-lg'>Buku Dipinjam</h4>
        </div>

        <div class='text-9xl bg-[#cf8739] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
          <div class='flex items-center justify-between w-full '>
            <h2 class='text-5xl me-2'>{{$kembalibuku}}</h2>
          </div>
          <h4 class='text-lg'>Buku Tersedia</h4>
        </div>

        <div class='text-9xl bg-[#AC455E] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
          <div class='flex items-center justify-between w-full '>
            <h2 class='text-5xl me-2'>{{$jumlahminjam}}</h2>
          </div>
          <h4 class='text-lg'>Jumlah Peminjaman</h4>
        </div>
    </div>

  </div>
</div>
</section>
</x-app-layout>