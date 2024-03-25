<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="mt-3">
                <a href="{{route('articles.index')}}" class="bg-white p-2 rounded" >article list</a>
                <a href="{{route('products.index')}}" class="text-white p-2 rounded bg-green-500" >product list</a>
            </div>
        </div>
    </div>
</x-app-layout>
