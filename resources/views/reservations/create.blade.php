@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <div class="w-full max-w-xs sm:px-6 lg:px-8 justify-center">
            <h1 class="underline text-lg mb-4">Reserve a Book</h1>
            <div>
                <label for="book_id" class="block text-gray-700 text-sm font-bold mb-2 mt-2">Book Title</label>
                <select id="book_id" name="book_id"
                        class="shadow appearance-none border rounded w-full py-2
                    px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select a book</option>
                    @foreach($books as $book)
                        @if(isset($book) && $book->status)
                            <option value="{{$book->id}}">{{ $book->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="block text-gray-700 text-sm font-bold mb-2 mt-2">Start Time</label>
                <div id="start_time">
                    <input type="date" class="shadow appearance-none border rounded
                w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
                focus:shadow-outline" id="start_time" name="start_time" required>
                </div>

            </div>
            <div>
                <label for="" class="block text-gray-700 text-sm font-bold mb-2 mt-2">Return Time</label>
                <div id="return_time">
                    <input type="date" class="shadow appearance-none border rounded
                w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
                focus:shadow-outline" id="return_time" name="return_time" required>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <button class="border-2 bg-slate-300 py-2 px-4 rounded mt-2" type="submit">Submit</button>
            </div>
        </div>
    </form>

    @if(session()->has('reason'))
        <div class="mt-4"> {{ session()->get('reason') }}</div>
    @endif

@endsection
