@extends('layouts.app')

@section('content')
    <div class="container">
        <x-breadcrumb />
        
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-30">
                                <h4 class="m-t-0 header-title"><b>{{ Route::currentRouteName() }}</b></h4>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="/livro/salvar" class="form-horizontal" id="form-service" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $livro->id }}" />

                        <div class="form-group">
                            <label class="col-md-1 control-label">Título</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" @error('titulo') style="border-color: red;" @enderror name="titulo" value="{{ $livro->titulo }}">
                                @error('titulo')
                                    <div style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">Autor</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control "@error('titulo') style="border-color: red;" @enderror name="autor" value="{{ $livro->autor }}">
                                @error('autor')
                                    <div style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">Número de Páginas</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" @error('titulo') style="border-color: red;" @enderror name="numero_paginas" value="{{ $livro->numero_paginas }}">
                                @error('numero_paginas')
                                    <div style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">Descrição</label>
                            <div class="col-md-10">
                                <textarea class="form-control" @error('titulo') style="border-color: red;" @enderror rows="10" name="descricao">{{ $livro->descricao }}</textarea>
                                @error('descricao')
                                    <div style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1">
                                <a href="{{ route('Livros') }}">
                                    <button style="float: right;" type="button" class="btn btn-default waves-effect waves-light m-t-20">Voltar</button>
                                </a>
                            </div>
                            <div class="col-md-1 col-md-offset-9 btn-modal-value-changed">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-20" style="float: right;">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection