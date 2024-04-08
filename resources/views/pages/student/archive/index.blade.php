@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Resurslar arxivi
                    </h4>
                    <div class="my-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="search" placeholder=""
                                   aria-describedby="floatingInputHelp">
                            <label for="search">Resurs ataması</label>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resurs ataması</th>
                                <th>Júklengen waqtı</th>
                                <th>Statusı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($files))
                                @foreach($files as $file)
                                    <tr>
                                        <td>#{{ $file->id }}</td>
                                        <td>{{ $file->topic }}</td>
                                        <td>
                                            {{ date('d.m.Y H:i:s', strtotime($file->created_at)) }}
                                        </td>
                                        <td>
                                            @if($file->status == 's')
                                                <div class="badge bg-primary">Jiberilgen</div>
                                            @elseif($file->status == 'a')
                                                <div class="badge bg-success">Qabıllanǵan</div>
                                            @elseif($file->status == 'd')
                                                <div class="badge bg-dark">Biykar etilgen</div>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-danger small" colspan="5">
                                        Házirshe hesh qanday fayl qosılmaǵan!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
