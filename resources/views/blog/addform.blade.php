@extends('master.master')
@section('title', 'Blog Ekle')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <a href="{{ route('blog') }}"><button type="button" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon"><i class="icon-backward2"></i>Geri</button></a>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <form action="{{route('blogekle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pen-plus"></i> Blog Add</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Başlık:</label>
                                            <input  required name="title" type="text" placeholder="Blog title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>İmage:</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>İçerik:</label>
                                            <textarea class="form-control" name="text" id="" cols="30" rows="3" placeholder="Blog content"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Kaydet<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /basic datatable -->
    </div>

@endsection
