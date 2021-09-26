@extends('layouts/contentLayoutMaster')

@section('title', 'Добавление нового СОНКО ')

@section('content')
    <!-- Tooltip validations start -->
    <section class="tooltip-validations" id="tooltip-validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="post" action="{{ route('sonko.store') }}">
                            @csrf
                            <div class="row g-1">
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01">Наименование</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationTooltip01"
                                        placeholder="Наименование"
                                        value="{{ old('title') }}"
                                        required
                                        name="title"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                    <label class="form-label" for="phone-number">Телефон</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">RU (+7)</span>
                                        <input
                                            type="text"
                                            class="form-control phone-number-mask"
                                            placeholder="7 999 888 0000"
                                            id="phone-number"
                                            required
                                            name="phone"
                                            value="{{old('phone') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationTooltip02"
                                        placeholder="Email"
                                        required
                                        value="{{ old('email') }}"
                                        name="email"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">Адрес</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationTooltip02"
                                        placeholder="Адрес"
                                        value="{{ old('address') }}"
                                        required
                                        name="address"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">Руководитель</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationTooltip02"
                                        placeholder="Руководитель"
                                        value="{{ old('head') }}"
                                        required
                                        name="head"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">Количество рабочих</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationTooltip02"
                                        placeholder="Количество рабочих"
                                        value="{{ old('workers') }}"
                                        required
                                        name="workers"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <!-- Basic Textarea start -->
                                <section class="basic-textarea">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Описание</label>
                                                        <textarea
                                                            class="form-control"
                                                            id="exampleFormControlTextarea1"
                                                            rows="3"
                                                            placeholder="Textarea"
                                                            name="description"
                                                        >{{ old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Basic Textarea end -->
                                <!-- Bootstrap Select start -->
                                <section class="bootstrap-select">
                                    <div class="row">
                                        <div class="card-body">
                                            <!-- Basic Select -->
                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Basic Select</label>
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option value="active">Активный</option>
                                                    <option value="inactive">Не активный</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Bootstrap Select end -->
                            </div>
                            <button class="btn btn-primary" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tooltip validations end -->
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js'))}}"></script>
@endsection
