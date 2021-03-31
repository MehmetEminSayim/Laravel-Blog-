@extends('master.master')
@section('title', 'Anasayfa')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-6">Kurs Listesi</div>
                    <div class="col-md-6 text-right"><a href=""><button class="btn btn-primary">Ekle</button></a></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Blog Adı</th>
                        <th scope="col">Blog İçerik</th>
                        <th scope="col">Blog Selflink</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>asdfasf</td>
                            <td>asfsadf</td>
                            <td>asfsafasd</td>
                            <td>
                                <a href="">asdf</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
