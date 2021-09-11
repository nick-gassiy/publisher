<!DOCTYPE HTML>
<html lang="eng">

<head>
  <title>simple_light</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <!-- class="logo_colour", allows you to change the colour of the text -->
        <h1><a href="index.blade.php">simple<span class="logo_colour">_light</span></a></h1>
        <h2>Simple. Contemporary. Website Template.</h2>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
            @if(isset($isEmployee))
            @if(isset($books))
            <li class="selected"><a href={{route('all.books')}}> Книги</a></li>
                @else
            <li><a href={{route('all.books')}}> Книги</a></li>
                @endif


            @if(isset($supplies))
                <li class="selected"><a href={{route('all.supplies')}}>Договора Контрагентов</a></li>
            @else
                <li><a href={{route('all.supplies')}}>Договора Контрагентов</a></li>
            @endif


            @if(isset($authors))
                <li class="selected"><a href={{route('all.authors')}}>Автора</a></li>
            @else
            <li><a href={{route('all.authors')}}>Автора</a></li>
            @endif


            @if(isset($contractors))
                <li class="selected"><a href={{route('all.contractors')}}>Контрагенты</a></li>
            @else
            <li><a href={{route('all.contractors')}}>Контрагенты</a></li>
            @endif
                @endif
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
          <table style="width: inherit ;border-spacing:0;">

          @if(!isset($isEmployee))
              @if(isset($books))
              <tr>
                  <th>Название</th>
                  <th>Автор</th>
                  <th>Жанр</th>
                  <th>Страницы</th>
                  <th>Год издания</th>
                  <th>Редактор</th>
              </tr>
              @foreach($books as $book)
              <tr><td>
                  <a href="{{route('bookDetails',$book->id)}}">
                      {{$book->name}}
                  </a></td>
                  <td>{{$book->author->name . ' '. $book->author->surname}}</td>
                  <td>{{$book->genre->name}}</td>
                  <td>{{$book->page}}</td>
                  <td>{{$book->year}}</td>
                  <td>{{$book->employee->name. ' ' . $book->employee->surname}}</td>
              </tr>
              @endforeach
                  @elseif(isset($supplies))
                      <tr>
                          <th>Книга</th>
                          <th>Типография</th>
                          <th>Дата</th>
                          <th>Цена</th>
                          <th>Количество</th>
                          <th>Стоимость</th>
                      </tr>
                      @foreach($supplies as $supply)
                          <tr>
                              <td>{{$supply->book->name}}</td>
                              <td>{{$supply->contractor->name}}</td>
                              <td>{{$supply->date}}</td>
                              <td>{{$supply->price}}</td>
                              <td>{{$supply->quantity}}</td>
                              <td>{{$supply->price}}</td>
                          </tr>
                      @endforeach
              @endif
              @else
                  <span>&nbsp;</span><input style="float: right;" class="submit" type="submit" name="name" value="Добавить" />

              @if(isset($books))
                      <tr>
                          <th>Название</th>
                          <th>Автор</th>
                          <th>Жанр</th>
                          <th>Страницы</th>
                          <th>Год издания</th>
                          <th>Редактор</th>
                          <th></th>
                          <th></th>
                      </tr>
                      @foreach($books as $book)
                          <tr><td>
                                  <a href="{{route('bookDetails',$book->id)}}">
                                      {{$book->name}}
                                  </a></td>
                              <td>{{$book->author->name . ' '. $book->author->surname}}</td>
                              <td>{{$book->genre->name}}</td>
                              <td>{{$book->page}}</td>
                              <td>{{$book->year}}</td>
                              <td>{{$book->employee->name. ' ' . $book->employee->surname}}</td>
                              <td><a style="color: cornflowerblue">Изменить</a></td>
                              <td><a style="color: red" c>Удалить</a></td>
                          </tr>
                      @endforeach

                  @elseif(isset($supplies))
                      <tr>
                          <th>Книга</th>
                          <th>Типография</th>
                          <th>Дата</th>
                          <th>Цена</th>
                          <th>Количество</th>
                          <th>Стоимость</th>
                          <th></th>
                          <th></th>

                      </tr>
                      @foreach($supplies as $supply)
                          <tr>
                              <td>{{$supply->book->name}}</td>
                              <td>{{$supply->contractor->name}}</td>
                              <td>{{$supply->date}}</td>
                              <td>{{$supply->price}}</td>
                              <td>{{$supply->quantity}}</td>
                              <td>{{$supply->price}}</td>
                              <td><a style="color: cornflowerblue">Изменить</a></td>
                              <td><a style="color: red" href={{route('delete.supply',$supply->id)}}>Удалить</a></td>
                          </tr>
                      @endforeach

                  @elseif(isset($authors))
                      <tr>
                          <th>Имя</th>
                          <th>Фамилия</th>
                          <th>Псевдоним</th>
                          <th>Кол-во книг</th>
                          <th>Тариф</th>
                          <th>Начало тарифа</th>
                          <th>Конец тарифа</th>
                          <th></th>
                          <th></th>

                      </tr>
                      @foreach($authors as $author)
                          <tr>
                              <td>{{$author->name}}</td>
                              <td>{{$author->surname}}</td>
                              <td>{{$author->pseudonym}}</td>
                              <td>{{$author->books->count()}}</td>
                              <td>{{$author->agreement->tariff->name}}</td>
                              <td>{{$author->agreement->begin}}</td>
                              <td>{{$author->agreement->end}}</td>
                              <td><a style="color: cornflowerblue">Изменить</a></td>
                              <td><a style="color: red" href={{route('delete.author',$author->id)}}>Удалить</a></td>
                          </tr>
                      @endforeach

                    @elseif(isset($contractors))
                      <tr>
                          <th>Название</th>
                          <th>Адрес</th>
                          <th>Email</th>
                          <th>Телефон</th>
                          <th></th>
                          <th></th>
                      </tr>
                      @foreach($contractors as $contractor)
                          <tr>
                              <td>{{$contractor->name}}</td>
                              <td>{{$contractor->address}}</td>
                              <td>{{$contractor->email}}</td>
                              <td>{{$contractor->phone}}</td>
                              <td><a style="color: cornflowerblue">Изменить</a></td>
                              <td><a style="color: red" href={{route('delete.contractor',$contractor->id)}}>Удалить</a></td>
                          </tr>
                      @endforeach
                  @endif


              @endif
          </table>

      </div>
    </div>


  </div>
</body>
</html>
