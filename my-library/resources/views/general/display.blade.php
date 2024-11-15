<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('books')" :active="request()->routeIs('books')">
            {{ __('Books') }}
        </x-nav-link>
        <x-nav-link :href="route('cds')" :active="request()->routeIs('cds')">
            {{ __('CDs') }}
        </x-nav-link>
        <x-nav-link :href="route('newspapers')" :active="request()->routeIs('newspapers')">
            {{ __('Newspapers') }}
        </x-nav-link>
        <x-nav-link :href="route('journals')" :active="request()->routeIs('journals')">
            {{ __('Journals') }}
        </x-nav-link>
        <x-nav-link :href="route('final_year_projects')" :active="request()->routeIs('final_year_projects')">
            {{ __('Final Year Projects') }}
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <h1>Daftar {{ $type }}
            <x-nav-link :href="'/'.$location.'/'.($sort == 'asc' ? 'desc' : 'asc')">
                {{ __('(Change Order)') }}
            </x-nav-link>
        </h1>
        <table>
            <thead>
                <tr>
                    @foreach ($fields as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                    @if($type == 'Buku')
                        <th>Jenis Buku</th>
                        <th>Link Akses</th>
                        <th>Status Peminjaman</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        @foreach ($fields as $field)
                            <td>{{ $data->{strtolower(implode('_', explode(' ', $field)))} }}</td>
                        @endforeach
                        @if($type == 'Buku')
                        <td>{{ $data->isEbook ? "E-Book" : "Physical Book" }}</td>
                        <td><x-nav-link :href="$data->ebookLink">
                            {{ __($data->ebookLink) }}
                        </x-nav-link></td>
                        <td>{{ $data->isBorrowed ? "Dipinjam" : "Tersedia" }}</td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
