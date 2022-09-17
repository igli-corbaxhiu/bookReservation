@extends('layouts.app')
@section('content')
    <div class="w-full max-w-xs sm:px-6 lg:px-8">
        @if(isset($book))
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 px-4 mb-4 w-full max-w-sm" method="POST" action="{{ route('books.update', $book) }}">
                @method('PUT')
                @else
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm" method="POST" action="{{ route('books.store') }}">
                        @endif
                        @csrf
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="brand">Book title:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text" id="title" name="title"
                                   value="@if(isset($book->title)){{$book->title}}@endif">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="model">Book author:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text" id="author" name="author"
                                   value="@if(isset($book->author)){{$book->author}}@endif">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="price">Book year:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="number" id="year" name="year"
                                   value="@if(isset($book->year)){{$book->year}}@endif">
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
                    </form>
            </form>
    </div>
@endsection
