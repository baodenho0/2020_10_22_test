<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-10 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Orders
                        <hr>
                    </div>
                        <div>
                            <a class="btn-sm btn btn-primary" href="{{ route('orders.create') }}">Create</a>
                        </div>
                    <br>
{{--                    <div class="mt-6 text-gray-500">--}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Created by</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('orders.show', $order->id) }}">View</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                                        </div>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
