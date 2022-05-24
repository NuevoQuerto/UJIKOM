<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<!-- Validation Errors -->
					<x-validation-errors class="mb-4" :errors="$errors" />
				
					<form action="{{ route('anggotas.store') }}" method="POST">
						@csrf
					
						<div class="mb-6">
							<label for="nomor_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Anggota</label>
							<input type="text" id="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A01" required="" name="No_Anggota">
						</div>
						
						<div class="mb-6">
							<label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
							<input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" name="Nama">
						</div>
						
						<div class="mb-6">
							<label for="simpanan_wajib" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Simpanan Wajib</label>
							<input type="number" id="simpanan_wajib" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" name="Wajib">
						</div>
						
						<div class="mb-6">
							<label for="simpanan_pokok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Simpanan Pokok</label>
							<input type="number" id="simpanan_pokok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" name="Pokok">
						</div>
						
						<div class="mb-6">
							<label for="saldo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saldo</label>
							<input type="number" id="saldo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" name="Saldo">
						</div>
						
						<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
