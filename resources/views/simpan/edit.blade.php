<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Simpan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<!-- Validation Errors -->
					<x-validation-errors class="mb-4" :errors="$errors" />
				
					@if (isset($simpan))
						<form action="{{ route('simpans.update', ['simpan' => $simpan->No_Simpan]) }}" method="POST">
							@method('PATCH')
							@csrf
						
							<div class="mb-6">
								<label for="nomor_simpan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Simpan</label>
								<input type="text" id="nomor_simpan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $simpan->No_Simpan }}" required="" name="No_Simpan" disabled>
							</div>
							
							<div class="mb-6">
								<label for="nomor_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Anggota</label>
								<input type="text" id="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $simpan->No_Anggota }}" required="" name="No_Anggota">
							</div>
							
							<div class="mb-6">
								<label for="jumlah_simpan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Simpan</label>
								<input type="number" id="jumlah_simpan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $simpan->JmlSimpan }}" required="" name="JmlSimpan">
							</div>
							
							<div class="mb-6">
								<label for="kode_kasir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kode Kasir</label>
								<input type="text" id="kode_kasir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $simpan->KodeKsr }}" required="" name="KodeKsr">
							</div>
							
							<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
						</form>
					@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
