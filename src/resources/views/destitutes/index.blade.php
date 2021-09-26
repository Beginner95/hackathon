@extends('layouts/contentLayoutMaster')

@section('title', 'Список нуждающихся')

@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Список всех нуждающихся</h4>
                    <a href="{{ route('destitute.create') }}" class="btn btn-primary pull-right">Добавить</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ф.И.О.</th>
                                <th>Телефон</th>
                                <th>Адрес</th>
                                <th>Дата добавления</th>
                                <th>Дата удаления</th>
                                <th>В списке СОНКО</th>
                                <th>Кол-во в семье</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destitutes as $destitute)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $destitute->full_name }}</span>
                                    </td>
                                    <td>{{ $destitute->phone }}</td>
                                    <td>{{ $destitute->address }}</td>
                                    <td>{{ $destitute->added_at }}</td>
                                    <td>{{ $destitute->deleted_at }}</td>
                                    <td>{{ $destitute->sonko->title }}</td>
                                    <td>{{ $destitute->family_counts }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('destitute.edit', $destitute->id) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('destitute.destroy', $destitute->id) }}" method="post" class="float-left">
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
