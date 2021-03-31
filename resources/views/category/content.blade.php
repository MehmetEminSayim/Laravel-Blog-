@extends('master.master')
@section('title', 'Kategori')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Tüm Kategoriler</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="{{route('kategori_form')}}"><button class="btn btn-outline-warning">Ekle</button></a>
                    </div>
                </div>
            </div>

            @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Kategori ID</th>
                    <th>Kategori Adı</th>
                    <th>Selflink</th>
                    <th>Tarih</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="#">{{ $item->name }}</a></td>
                    <td>{{ $item->slug }}</td>
                    <td> {{ $item->created_at ->formatLocalized(' %d %B %Y') }} </td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('kategoriduzenle',['id'=>$item->id])}}" class="dropdown-item"><i class="icon-pen-plus"></i> Düzenle</a>
                                    <a href="{{route('kategorisil',['id'=>$item->id])}}" class="dropdown-item"><i class="icon-trash"></i> Sil</a>
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
