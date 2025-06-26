@extends('admin.layouts.main')
@section('content')
    <style>
        /* Стиль для подсвеченного текста */
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6"></div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary col-1 mb-2">Create</a>
                </div>
                <div class="row col-6 pl-0">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Posts Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" id="searchInput" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default" onclick="findWord()">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td><a href="{{ route('admin.post.show', $post->id) }}" class="pl-2"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.post.edit', $post->id) }}" class="pl-2"><i
                                                        class="fas fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="far fa-trash-alt text-danger text-danger pl-2"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        // Функция для поиска и подсветки слов
        function findWord() {
            // Получаем текст из поля ввода
            const searchText = document.getElementById('searchInput').value.trim();
            if (!searchText) {
                alert('Введите слово для поиска!');
                return;
            }

            // Получаем все строки таблицы
            const rows = document.querySelectorAll('.table tbody tr');

            // Создаем регулярное выражение для поиска (регистронезависимый поиск)
            const regex = new RegExp(`(${searchText})`, 'gi');

            // Проходим по каждой строке таблицы
            rows.forEach(row => {
                // Получаем все ячейки строки
                const cells = row.querySelectorAll('td');

                // Проходим по каждой ячейке
                cells.forEach(cell => {
                    // Удаляем предыдущие подсветки
                    let cellContent = cell.innerHTML.replace(/<span class="highlight">|<\/span>/gi, '');

                    // Подсвечиваем найденные слова
                    cellContent = cellContent.replace(regex, '<span class="highlight">$1</span>');

                    // Обновляем содержимое ячейки
                    cell.innerHTML = cellContent;
                });
            });
        }
    </script>
@endsection