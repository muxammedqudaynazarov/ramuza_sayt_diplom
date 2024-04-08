@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4>
                            Resurs kiritiw
                        </h4>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="topic" name="topic" placeholder="">
                            <label for="topic">Teması</label>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label m-0">Resurs fayl</label>
                            <input class="form-control form-control-lg" type="file" id="formFile" name="formFile">
                        </div>

                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="teacher" name="teacher"
                                           placeholder="">
                                    <label for="teacher">Qabıllawshı F.A.Áa.</label>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <input class="form-control form-control-lg" type="date" value="{{ date('Y-m-d') }}"
                                       id="html5-date-input" name="date">
                            </div>
                        </div>

                        <div style="text-align: right">
                            <button class="btn btn-success" type="submit">
                                <i class="bx bx-check"></i> Jiberiw
                            </button>
                            <a href="{{ route('dash') }}" class="btn btn-primary">Biykarlaw</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
