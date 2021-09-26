@extends('layouts/contentLayoutMaster')

@section('title', 'Добавление нового мало имущего')


@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
    <!-- Tooltip validations start -->
    <section class="tooltip-validations" id="tooltip-validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="post" action="{{ route('destitute.store') }}">
                            @csrf
                            <div class="row g-1">
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01">Ф.И.О.</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationTooltip01"
                                        placeholder="Ф.И.О."
                                        value="{{ old('full_name') }}"
                                        required
                                        name="full_name"
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
                                            value="{{ old('phone') }}"
                                        />
                                    </div>
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
                                    <label class="form-label" for="validationTooltip02">Кол-во в семье</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationTooltip02"
                                        placeholder="Кол-во в семье"
                                        value="{{ old('family_counts') }}"
                                        required
                                        name="family_counts"
                                    />
                                    <div class="valid-tooltip">Данные заполнены корректно!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <!-- Flatpickr Starts -->
                                    <section id="flatpickr">
                                        <label class="form-label" for="fp-date-time">Дата добавления</label>
                                        <input
                                            type="text"
                                            id="fp-date-time"
                                            class="form-control flatpickr-date-time"
                                            placeholder="YYYY-MM-DD HH:MM"
                                            value="{{ old('added_at') }}"
                                            name="added_at"
                                        />
                                    </section>
                                    <!-- Flatpickr Ends-->
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <!-- Flatpickr Starts -->
                                    <section id="flatpickr">
                                        <label class="form-label" for="fp-date-time">Дата Удаления</label>
                                        <input
                                            type="text"
                                            id="fp-date-time"
                                            class="form-control flatpickr-date-time"
                                            placeholder="YYYY-MM-DD HH:MM"
                                            value="{{ old('deleted_at') }}"
                                            name="deleted_at"
                                        />
                                    </section>
                                    <!-- Flatpickr Ends-->
                                </div>
                                <!-- Select2 Start  -->
                                <section class="basic-select2">
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label" for="select2-basic">СОНКО</label>
                                        <select class="select2 form-select" id="select2-basic" name="sonko_id">
                                            @foreach($sonkos as $sonko)
                                                <option value="{{ $sonko->id }}">{{ $sonko->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </section>
                                <!-- Select2 End -->
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

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js'))}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection

