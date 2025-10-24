@extends('layouts.default')
<style>
th {
  background-color: #289ADC;
  color: white;
  padding: 5px 40px;
}

tr:nth-child(odd) td {
  background-color: #FFFFFF;
}

td {
  padding: 25px 40px;
  background-color: #EEEEEE;
  text-align: center;
}
</style>
@section('title', 'author.index.blade.php')

@section('content')
<table>
  <tr>
    <th>Author</th>
    <th>Book</th>
    <th>Review</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
    <td>
      @if ($item->books->count() > 0)
        @foreach ($item->books as $book)
          {{ $book->getTitle() }}<br>
        @endforeach
      @else
        <span style="color: gray;">本なし</span>
      @endif
    </td>
    <td>
      @if ($item->reviewedbooks->count() > 0)
        @foreach ($item->reviewedbooks as $book)
          {{ $book->getTitle() }}<br>
        @endforeach
      @else
        <span style="color: gray;">レビューなし</span>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection
