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
                        Roles
                        <hr>
                    </div>
                        <div>
                            <a class="btn-sm btn btn-primary" href="{{ route('roles.create') }}">Create</a>
                        </div>
                    <br>
{{--                    <div class="mt-6 text-gray-500">--}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('roles.edit_permissions', $role->id) }}">Permissions</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        </div>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-link" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
