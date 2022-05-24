<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Simpan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<a href="{{ route('simpans.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+ Tambah Data</a><br><br>
					
					@if (count($simpans) >= 1)
						<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
							<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
									<tr>
										<th scope="col" class="px-6 py-3">
											Nomor Simpan
										</th>
										<th scope="col" class="px-6 py-3">
											Nomor Anggota
										</th>
										<th scope="col" class="px-6 py-3">
											Jumlah Simpan
										</th>
										<th scope="col" class="px-6 py-3">
											Kode Kasir
										</th>
										<th scope="col" class="px-6 py-3">
										</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($simpans as $simpan)
									<tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
										<th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
											{{ $simpan->No_Simpan }}
										</th>
										<td class="px-6 py-4">
											{{ $simpan->No_Anggota }}
										</td>
										<td class="px-6 py-4">
											{{ $simpan->JmlSimpan }}
										</td>
										<td class="px-6 py-4">
											{{ $simpan->KodeKsr }}
										</td>
										<td class="px-6 py-4 text-right">
											<a href="{{ route('simpans.edit', ['simpan' => $simpan->No_Simpan]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> | 
											<form action="{{ route('simpans.destroy', ['simpan' => $simpan->No_Simpan]) }}" method="POST">
												@method('DELETE')
												@csrf
												
												<button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
											</form>
										</td>
									</tr>
								@endforeach	
								</tbody>
							</table>
						</div>
					@else
						Tidak Ada Data
					@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
