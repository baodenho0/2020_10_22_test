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
                        View
                        <hr>
                    </div>
                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input readonly type="text" class="form-control" name="name" value="{{ $order->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly type="text" class="form-control" name="email" value="{{ $order->email }}">
                        </div>
                        @foreach($order->details as $detail)
                            <hr>
                            <div class="form-group">
                                <label>Service 1</label>
                                <input readonly type="text" class="form-control" name="service_1" value="{{ $detail->service_1 }}">
                            </div>
                            <div class="form-group">
                                <label>Service 2</label>
                                <input readonly type="text" class="form-control" name="service_2" value="{{ $detail->service_2 }}">
                            </div>
                        @endforeach

{{--                        <input type="submit" class="btn btn-primary" value="Save">--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
