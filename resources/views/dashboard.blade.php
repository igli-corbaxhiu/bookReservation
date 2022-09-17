@extends('layouts.app')
@section('content')
    <div class="mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col justify-center max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        <table class="border-collapse border-2 border-slate-300 text-xl mt-4">
                            <thead>
                            <tr>
                                <th class="border border-slate-300 px-4">Id</th>
                                <th class="border border-slate-300 px-4">Book Title</th>
                                <th class="border border-slate-300 px-4">Book Author</th>
                                <th class="border border-slate-300 px-4">Year published</th>
                                <th class="border border-slate-300 px-4">Edit Book</th>
                                <th class="border border-slate-300 px-4">Delete Book</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="border border-slate-300">{{$book->id}}</td>
                                    <td class="border border-slate-300">{{$book->title }}</td>
                                    <td class="border border-slate-300">{{$book->author }}</td>
                                    <td class="border border-slate-300">{{$book->year }}</td>
                                    <td class="border border-slate-300"><a href="{{route('books.edit', $book->id)}}">Edit</a></td>
                                    <td class="border border-slate-300">
                                        <form action="{{route('books.destroy', $book->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto justify-between flex lg:px-8 mt-4 gap-4">
                        <div class="flex justify-center p-4 bg-white border-gray-200 border border-4 overflow-hidden shadow-sm sm:rounded-lg w-48">
                            <a href="{{route('books.create')}}">+ ADD Book</a>
                        </div>
                        <div class="flex justify-center p-4 bg-white border-gray-200 border border-4 overflow-hidden shadow-sm sm:rounded-lg w-48">
                            <a href="{{route('reservations.create')}}">+ Reserve a Book</a>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row space-x-6 mt-4 mx-auto sm:px-4 lg:px-6">
                        <div class="flex flex-col">
                            <h1 class="flex justify-center">Reserved Books</h1>
                            <div class="flex justify-center mt-2">
                                <table class="border-collapse border-2 border-slate-300 text-lg mt-2 mb-4">
                                    <thead>
                                    <tr>
                                        <th class="border text-center border-slate-300 px-4">Id</th>
                                        <th class="border text-center border-slate-300 px-4">Book Id</th>
                                        <th class="border text-center border-slate-300 px-4">Start Day</th>
                                        <th class="border text-center border-slate-300 px-4">Return Day</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td class="border text-center border-slate-300">{{$reservation->id}}</td>
                                            <td class="border text-center border-slate-300">{{$reservation->book_id}}</td>
                                            <td class="border text-center border-slate-300">{{$reservation->start_time }}</td>
                                            <td class="border text-center border-slate-300">{{$reservation->return_time }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
