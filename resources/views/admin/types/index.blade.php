@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-3">Tipologie di progetto</h2>

        <h5>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </h5>

        <div class="row row-cols-2">
            <div class="col">
                <form action="{{ route('admin.types.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Crea una nuova tipologia:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nome della tipologia"
                                aria-label="Nome della tipologia" aria-describedby="name" name="name" id="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name')
                                is-invalid
                                @enderror">
                            <button type="submit" class="btn btn-primary" type="button" id="name">Invia</button>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </div>

            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="w-50">Tipologia</th>
                            <th scope="col" class="w-25">Progetti associati</th>
                            <th scope="col" class="w-25">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>
                                    {{ $type->name }}
                                </td>

                                <td class="text-center">
                                    {{ count($type->projects) }}
                                </td>

                                <td>
                                    <button type=""
                                        class="ms-2 d-inline-block btn btn-danger ms_btn-square-2 rounded-circle">
                                        <i
                                            class="fa-regular fa-trash-can d-flex justify-content-center align-items-center text-light"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
