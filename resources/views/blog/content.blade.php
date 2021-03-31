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
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>

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
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->img_url }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
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
