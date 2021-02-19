<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="navbar navbar-dark bg-dark box-shadow">
        <div class="container">
            <div class="row">
                <h1>
                    <a href="{{ URL::to('/') }}" class="navbar-brand">Блог</a>
                </h1>
            </div>
        </div>
    </header>

    <div class="container main">
        <div class="row  content">
            <main class="main  col-sm-12  col-md-8">
                @yield('main')
            </main>
            <aside class="aside  col-sm-12 col-md-4">
                <section class="container">
                    <div class="row">
                        <a class="btn btn-secondary btn-add-article" href="{{ route('articles.create') }}">
                            Добавить статью
                        </a>
                    </div>
                </section>
                <section class="tags">
                    <h3 class="heading">Тэги</h3>
                    <p>
                        @foreach ($tags as $tag)
                            <a href="{{ url('/articles') }}?tag={{ $tag }}" class="tag">
                                {{ $tag }}
                            </a>
                        @endforeach
                    </p>
                </section>
            </aside>
        </div>
    </div>


    <script>
        function formatDate(date) {
            const [year, month, day] = date.split('-');
            const utcDate = new Date(Date.UTC(year, month-1, day));
            const formatOptions = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };

            return new Intl.DateTimeFormat('ru-RU', formatOptions)
                .format(utcDate)
                .replace(/\sг\./ig, '');
        }

        document.querySelectorAll('#article-date')
            .forEach(node => {
                node.textContent = formatDate(node.textContent)
            });

    </script>
</body>
</html>
