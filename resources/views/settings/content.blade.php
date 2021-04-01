@extends('master.master')
@section('title', 'Ayarlar')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <?php $rows = verticalTable($data) ?>

            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <form action="{{route('updatesettings')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pen-plus"></i> Settings</legend>
                                <?php foreach ($rows as $type => $grup){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?=$grup->title?>:</label>
                                            <input type="text" class="form-control"  name="smtp[<?=$grup->name?>]"  value="<?=$rows[$grup->name]->value?>" >
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
