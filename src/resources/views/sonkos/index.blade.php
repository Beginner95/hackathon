@extends('layouts/contentLayoutMaster')

@section('title', 'СОНКО')

@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Список всех СОНКО</h4>
                    <a href="{{ route('sonko.create') }}" class="btn btn-primary pull-right">Добавить</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>ИНН</th>
                                <th>ОГРН</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Адрес</th>
                                <th>Руководитель</th>
                                <th>Кол-во работников</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sonkos as $sonko)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $sonko->title }}</span>
                                    </td>
                                    <td>{{ $sonko->inn }}</td>
                                    <td>{{ $sonko->ogrn }}</td>
                                    <td>{{ $sonko->phone }}</td>
                                    <td>{{ $sonko->email }}</td>
                                    <td>{{ $sonko->address }}</td>
                                    <td>{{ $sonko->head }}</td>
                                    <td>{{ $sonko->workers }}</td>
                                    <td><span class="badge rounded-pill badge-light-primary me-1">{{ $sonko->status }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('sonko.edit', $sonko->id) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('sonko.destroy', $sonko->id) }}" method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
