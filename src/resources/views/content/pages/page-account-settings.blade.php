@extends('layouts/contentLayoutMaster')

@section('title', 'Account Settings')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<!-- account setting page -->
<section id="page-account-settings">
  <div class="row">
    <!-- left menu section -->
    <div class="col-md-3 mb-2 mb-md-0">
      <ul class="nav nav-pills flex-column nav-left">
        <!-- general -->
        <li class="nav-item">
          <a
            class="nav-link active"
            id="account-pill-general"
            data-bs-toggle="pill"
            href="#account-vertical-general"
            aria-expanded="true"
          >
            <i data-feather="user" class="font-medium-3 me-1"></i>
            <span class="fw-bold">General</span>
          </a>
        </li>
        <!-- change password -->
        <li class="nav-item">
          <a
            class="nav-link"
            id="account-pill-password"
            data-bs-toggle="pill"
            href="#account-vertical-password"
            aria-expanded="false"
          >
            <i data-feather="lock" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Change Password</span>
          </a>
        </li>
        <!-- information -->
        <li class="nav-item">
          <a
            class="nav-link"
            id="account-pill-info"
            data-bs-toggle="pill"
            href="#account-vertical-info"
            aria-expanded="false"
          >
            <i data-feather="info" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Information</span>
          </a>
        </li>
        <!-- social -->
        <li class="nav-item">
          <a
            class="nav-link"
            id="account-pill-social"
            data-bs-toggle="pill"
            href="#account-vertical-social"
            aria-expanded="false"
          >
            <i data-feather="link" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Social</span>
          </a>
        </li>
      </ul>
    </div>
    <!--/ left menu section -->

    <!-- right content section -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <!-- general tab -->
            <div
              role="tabpanel"
              class="tab-pane active"
              id="account-vertical-general"
              aria-labelledby="account-pill-general"
              aria-expanded="true"
            >
              <!-- header section -->
              <div class="d-flex">
                <a href="#" class="me-25">
                  <img
                    src="{{ $user->avatar }}"
                    id="account-upload-img"
                    class="rounded me-50"
                    alt="profile image"
                    height="80"
                    width="80"
                  />
                </a>
                <!-- upload and reset button -->
                <div class="mt-75 ms-1">
                  <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                  <input type="file" id="account-upload" hidden accept="image/*" />
                  <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                  <p>Разрешены форматы JPG, GIF or PNG. максимальный размер 1 мб</p>
                </div>
                <!--/ upload and reset button -->
              </div>
              <!--/ header section -->

              <!-- form -->
              <form class="validate-form mt-2" method="post" action="{{ route('account.general.save') }}">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-username">Логин</label>
                      <input
                        type="text"
                        class="form-control"
                        id="account-username"
                        name="username"
                        placeholder="Логин"
                        value="{{ $user->name }}"
                      />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-name">Ф.И.О.</label>
                      <input
                        type="text"
                        class="form-control"
                        id="account-name"
                        name="name"
                        placeholder="Ф.И.О."
                        value="{{ $user->full_name }}"
                      />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-e-mail">E-mail</label>
                      <input
                        type="email"
                        class="form-control"
                        id="account-e-mail"
                        name="email"
                        placeholder="Email"
                        value="{{ $user->email }}"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-2 me-1">Сохранить изменения</button>
                    <button type="reset" class="btn btn-outline-secondary mt-2">Отмена</button>
                  </div>
                </div>
              </form>
              <!--/ form -->
            </div>
            <!--/ general tab -->

            <!-- change password -->
            <div
              class="tab-pane fade"
              id="account-vertical-password"
              role="tabpanel"
              aria-labelledby="account-pill-password"
              aria-expanded="false"
            >
              <!-- form -->
              <form class="validate-form">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-old-password">Old Password</label>
                      <div class="input-group form-password-toggle input-group-merge">
                        <input
                          type="password"
                          class="form-control"
                          id="account-old-password"
                          name="password"
                          placeholder="Old Password"
                        />
                        <div class="input-group-text cursor-pointer">
                          <i data-feather="eye"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-new-password">New Password</label>
                      <div class="input-group form-password-toggle input-group-merge">
                        <input
                          type="password"
                          id="account-new-password"
                          name="new-password"
                          class="form-control"
                          placeholder="New Password"
                        />
                        <div class="input-group-text cursor-pointer">
                          <i data-feather="eye"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                      <div class="input-group form-password-toggle input-group-merge">
                        <input
                          type="password"
                          class="form-control"
                          id="account-retype-new-password"
                          name="confirm-new-password"
                          placeholder="New Password"
                        />
                        <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                  </div>
                </div>
              </form>
              <!--/ form -->
            </div>
            <!--/ change password -->

            <!-- information -->
            <div
              class="tab-pane fade"
              id="account-vertical-info"
              role="tabpanel"
              aria-labelledby="account-pill-info"
              aria-expanded="false"
            >
              <!-- form -->
              <form class="validate-form">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="accountTextarea">Bio</label>
                      <textarea
                        class="form-control"
                        id="accountTextarea"
                        rows="4"
                        placeholder="Your Bio data here..."
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-birth-date">Birth date</label>
                      <input
                        type="text"
                        class="form-control flatpickr"
                        placeholder="Birth date"
                        id="account-birth-date"
                        name="dob"
                      />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="accountSelect">Country</label>
                      <select class="form-select" id="accountSelect">
                        <option>USA</option>
                        <option>India</option>
                        <option>Canada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-website">Website</label>
                      <input
                        type="text"
                        class="form-control"
                        name="website"
                        id="account-website"
                        placeholder="Website address"
                      />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-phone">Phone</label>
                      <input
                        type="text"
                        class="form-control"
                        id="account-phone"
                        placeholder="Phone number"
                        value="(+656) 254 2568"
                        name="phone"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                  </div>
                </div>
              </form>

              <!--/ form -->
            </div>
            <!--/ information -->

            <!-- social -->
            <div
              class="tab-pane fade"
              id="account-vertical-social"
              role="tabpanel"
              aria-labelledby="account-pill-social"
              aria-expanded="false"
            >
              <!-- form -->
              <form class="validate-form">
                <div class="row">
                  <!-- social header -->
                  <div class="col-12">
                    <div class="d-flex align-items-center mb-2">
                      <i data-feather="link" class="font-medium-3"></i>
                      <h4 class="mb-0 ms-75">Social Links</h4>
                    </div>
                  </div>
                  <!-- twitter link input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-twitter">Twitter</label>
                      <input
                        type="text"
                        id="account-twitter"
                        class="form-control"
                        placeholder="Add link"
                        value="https://www.twitter.com"
                      />
                    </div>
                  </div>
                  <!-- facebook link input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-facebook">Facebook</label>
                      <input type="text" id="account-facebook" class="form-control" placeholder="Add link" />
                    </div>
                  </div>
                  <!-- google plus input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-google">Google+</label>
                      <input type="text" id="account-google" class="form-control" placeholder="Add link" />
                    </div>
                  </div>
                  <!-- linkedin link input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-linkedin">LinkedIn</label>
                      <input
                        type="text"
                        id="account-linkedin"
                        class="form-control"
                        placeholder="Add link"
                        value="https://www.linkedin.com"
                      />
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-instagram">Instagram</label>
                      <input type="text" id="account-instagram" class="form-control" placeholder="Add link" />
                    </div>
                  </div>
                  <!-- Quora link input -->
                  <div class="col-12 col-sm-6">
                    <div class="mb-1">
                      <label class="form-label" for="account-quora">Quora</label>
                      <input type="text" id="account-quora" class="form-control" placeholder="Add link" />
                    </div>
                  </div>
                  <div class="col-12">
                    <!-- submit and cancel button -->
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                  </div>
                </div>
              </form>
              <!--/ form -->
            </div>
            <!--/ social -->
          </div>
        </div>
      </div>
    </div>
    <!--/ right content section -->
  </div>
</section>
<!-- / account setting page -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/page-account-settings.js')) }}"></script>
@endsection
