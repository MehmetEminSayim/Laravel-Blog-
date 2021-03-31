@extends('master.master')
@section('title', 'Kategori')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Kategori Ekle</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <button type="button" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon"><i class="icon-backward2"></i></button>
                    </div>
                </div>
            </div>



            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <form id="userform"  action="{{route('kategori_ekle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pen-plus"></i> Category Add</legend>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori:</label>
                                            <input  required name="name" type="text" placeholder="Category name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="kaydetBtn" type="submit" class="btn btn-primary">Kaydet<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /basic datatable -->
    </div>

@endsection
