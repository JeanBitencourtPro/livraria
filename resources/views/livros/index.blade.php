@extends('layouts.app')

@section('content')
<div class="container">
    <x-breadcrumb />

    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-sm-10">
                        <div class="m-b-30">
                            <h4 class="m-t-0 header-title"><b>{{ Route::currentRouteName() }}</b></h4>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="m-b-30">
                            <a href="{{ route('Novo Livro') }}">
                                <button style="float: right;" class="btn btn-primary btn-rounded waves-effect waves-light">Adicionar <i class="mdi mdi-plus-circle-outline"></i></button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-5">
                        <form action="/livros" method="GET" id="form-busca">
                            <div class="input-group">
                                <input type="text" id="buscar" name="buscar" class="form-control" value="{{ request()->get('buscar') }}" placeholder="Pesquisar Título...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Pesquisar</button>
                                    @if(request()->get('buscar'))
                                        <button type="text" class="btn waves-effect waves-light btn-default" id="limpar-busca">Limpar</button>
                                    @endif
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <table id="datatable-fixed-col" class="table table-striped m-0 table-colored table-inverse">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Nº Páginas</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($livros as $livro)
                            <tr>
                                <td>{{ $livro->titulo }}</td>
                                <td>{{ $livro->autor }}</td>
                                <td>{{ $livro->numero_paginas }}</td>
                                <td>{{ $livro->descricao }}</td>
                                <td>
                                    <a href="/livro/{{ $livro->id }}">
                                        <button type="button" class="btn btn-icon btn-sm btn-primary" title="Editar" style="font-size: 12px !important;"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    </a>
                                    <button type="button" class="btn btn-icon btn-sm btn-danger delete" data-id="{{ $livro->id }}" data-toggle="modal" data-target=".bs-example-modal-sm" title="Excluir" style="font-size: 12px !important;"><i class="fa fa-trash" aria-hidden="true" title="Excluir"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    Sem registros
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $livros->links('pagination::simple-bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Aviso:</h4>
                </div>
                <div class="modal-body">
                    Você deseja excluir o registro?
                </div>
                <input type="hidden" class="csrf-token" value="{{ csrf_token() }}">
                <input type="hidden" id="delete-row" name="delete" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-success submit waves-effect delete-row" data-dismiss="modal">Sim</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal" aria-hidden="true">Não</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Modal-Effect -->
<script src="{{ asset('plugins/custombox/js/custombox.min.js') }}"></script>
<script src="{{ asset('plugins/custombox/js/legacy.min.js') }}"></script>
<script src="{{ asset('assets/js/livros/script.js') }}"></script>

@endsection