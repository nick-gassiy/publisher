<!DOCTYPE HTML>
<html>

<head>
  <title>simple_light - examples</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.blade.php">simple<span class="logo_colour">_light</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
                @if(isset($books) || isset($book))
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
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
          @if(isset($book))
                <h2>{{$book->name}}</h2>
                <p>{{$book->description}}</p>
              <table style="width:100%">
                  <tr>
                      <th>Автор</th>
                      <td>{{$book->author->name . ' ' . $book->author->surname}}</td>
                  </tr>
                  <tr>
                      <th>Год издания</th>
                      <td>{{$book->year}}</td>
                  </tr>
                  <tr>
                      <th>Жанр</th>
                      <td>{{$book->genre->name}}</td>
                  </tr>
                      <th>Количество страниц</th>
                      <td>{{$book->page}}</td>
                  </tr>
                      <th>Редактор</th>
                      <td>{{$book->employee->name . ' ' . $book->employee->surname}}</td>
                  </tr>
              </table>

          @endif

      </div>
    </div>
    <div id="footer">
      <p><a href="index.blade.php">Home</a> | <a href="examples.blade.php">Examples</a> | <a href="page.blade.php">A Page</a> | <a href="another_page.blade.php">Another Page</a> | <a href="contact.blade.php">Contact Us</a></p>
      <p>Copyright &copy; simple_light | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  </div>
</body>
</html>
