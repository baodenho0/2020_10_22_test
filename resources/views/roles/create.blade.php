<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-10 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Create
                        <hr>
                    </div>
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" name="name">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
