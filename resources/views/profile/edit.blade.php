<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}        </h2>



            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
               @if(Auth::user()->role=="entrepreneur") <a href="{{route('entrepreneurs.index')}}"> @else <a href="{{route('investisseurs.index')}}" @endif
                <img src="{{asset('build/imgs/arrow-left-solid.svg')}}" style="height: 25px ; width : 25px; display:inline;"  alt="Arrow left img">

                {{ __("Accueil") }}
            </a>
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
