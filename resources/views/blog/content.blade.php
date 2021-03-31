@extends('master.master')
@section('title', 'Köşemizdeki Yazılar')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Tüm Yazılar </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="{{route('blogform')}}"><button class="btn btn-outline-warning">Ekle</button></a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Başlık</th>
                    <th>Selflink</th>
                    <th>İçerik</th>
                    <th>Fotograf</th>
                    <th>Tarih</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ limit_text($item->content,5)  }}</td>
                        <td>
                            <img src="{{ asset("/storage/uploads/".$item->img_url) }}" width="40" height="40" alt="">
                        </td>
                        <td>{{ dateTimeFormat( $item->created_at) }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('blogsil',['id'=>$item->id])}}" class="dropdown-item"><i class="icon-file-pdf"></i> Sil</a>
                                        <a href="{{route('blogduzenle',['id'=>$item->id])}}" class="dropdown-item"><i class="icon-file-excel"></i> Düzenle</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
    </div>

@endsection
