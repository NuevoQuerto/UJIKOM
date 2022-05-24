<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Pinjam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<!-- Validation Errors -->
					<x-validation-errors class="mb-4" :errors="$errors" />
				
					@if (isset($pinjam))
						<form action="{{ route('pinjams.update', ['pinjam' => $pinjam->No_Pinjam]) }}" method="POST">
							@method('PATCH')
							@csrf
						
							<div class="mb-6">
								<label for="nomor_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Pinjam</label>
								<input type="text" id="nomor_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $pinjam->No_Pinjam }}" required="" name="No_Pinjam" disabled>
							</div>
							
							<div class="mb-6">
								<label for="nomor_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Anggota</label>
								<input type="text" id="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $pinjam->No_Anggota }}" required="" name="No_Anggota">
							</div>
							
							<div class="mb-6">
								<label for="jumlah_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Pinjam</label>
								<input type="number" id="jumlah_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $pinjam->JmlPinjam }}" required="" name="JmlPinjam">
							</div>
							
							<div class="mb-6">
								<label for="kode_kasir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kode Kasir</label>
								<input type="text" id="kode_kasir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $pinjam->KodeKsr }}" required="" name="KodeKsr">
							</div>
							
							<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
						</form>
					@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
