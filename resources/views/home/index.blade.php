@extends('layouts.app')

@section('content')
    <div class="container">
        <x-breadcrumb />

        <div class="row">
            <div class="col-md-6 btn-previsao-tempo">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Previsão do tempo</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card-box widget-box-two widget-two-purple">
                    <i class="fa fa-book widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Statistics">Livros Cadastrados</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $totalLivros }}</span></h2>
                        <p class="text-white m-0">Todos livros cadastrados</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-box widget-box-two widget-two-info">
                    <i class="fa fa-users widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="User Today">Usuários</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $totalUsuarios }}</span></h2>
                        <p class="text-white m-0">Todos usuários cadastrados</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="m-b-30">
                                <h4 class="m-t-0 header-title"><b>Recém chegados</b></h4>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped m-0 table-colored table-inverse">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Nº Páginas</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($livros as $livro)
                                <tr>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->autor }}</td>
                                    <td>{{ $livro->numero_paginas }}</td>
                                    <td>{{ $livro->descricao }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        Sem registros
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Previsão do tempo</h4>
                </div>
                <div class="modal-body">
                    @include('clima.index')
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal-Effect -->
    <script src="{{ asset('plugins/custombox/js/custombox.min.js') }}"></script>
    <script src="{{ asset('plugins/custombox/js/legacy.min.js') }}"></script>
@endsection