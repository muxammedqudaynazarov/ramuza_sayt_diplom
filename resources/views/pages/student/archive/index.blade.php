@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4>
                        @if($status == 's')
                            Jibergen fayllarım
                        @elseif($status == 'a')
                            Qabillangan fayllarım
                        @elseif($status == 'd')
                            Biykar etilgen fayllarım
                        @endif
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resurs ataması</th>
                                <th>Qosımsha maǵlıwmatlar</th>
                                <th>Resurs</th>
                                <th>Júklengen waqtı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($files))
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>{{ $file->topic }}</td>
                                        <td style="text-align: left">
                                            <div class="small">
                                                <div>
                                                    Qabıllawshınıń
                                                    F.A.Áa.: {{ json_decode($file->information)->teacher }}
                                                </div>
                                                <div>
                                                    Qabıllaw sánesi: {{ json_decode($file->information)->date }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('/storage/' . $file->url) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="bx bx-link"></i>
                                                Resurs
                                            </a>
                                        </td>
                                        <td>
                                            {{ date('d.m.Y H:i:s', strtotime($file->created_at)) }}
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
