<x-app-layout>
    @push('title')
        <title>{{ Auth::user()->name }}</title>
    @endpush
    @auth
        @include('layouts.partial.content')
    @endauth

</x-app-layout>
