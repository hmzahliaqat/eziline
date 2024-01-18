<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

     <!-- quill css -->
     <link href="{{ asset('quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-xl">

<div id="app">
   <task-component></task-component>
</div>

        </div>
    </div>

    <style>

    </style>
</x-app-layout>
