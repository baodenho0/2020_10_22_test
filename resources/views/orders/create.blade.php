<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-10 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Create
                        <hr>
                    </div>
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required type="text" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Service 1</label>
                            <input required type="text" class="form-control" name="service1">
                        </div>

                        <div class="form-group">
                            <label>Service 2</label>
                            <input required type="text" class="form-control" name="service2">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
