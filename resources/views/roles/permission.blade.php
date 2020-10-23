<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-10 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Role {{ $role->name }}
{{--                        <hr>--}}
                    </div>

                    <br>
                    {{--                    <div class="mt-6 text-gray-500">--}}
                    <form action="{{ route('roles.update_permissions', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input {{ $permission->role_id != $role->id ?: 'checked' }} type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                </td>
                                <td><p>{{ $permission->name }}</p></td>
                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                    <div>
                        <input class="btn btn-primary" type="submit" value="save">
                    </div>
                    </form>
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
