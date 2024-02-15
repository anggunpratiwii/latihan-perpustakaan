<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full border rounded-md table overlow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4">Nama kategori</th>
                                </tr>
                                </thead>
                                </tbody>
                                    @foreach ($kategori as $k)
                                    <tr class="hover:bg-gray-50">
                                     <td class="py-2 px-4">{{$k->nama_kategori}}</td>
                                 </tr>
                                    @endforeach
                                 </tbody>
                                 </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>