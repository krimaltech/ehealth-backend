<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GharGharMa Doctor | Register</title>
    <link rel="icon" type="image/x-icon" href="/images/blue-logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="/global_assets/countrycode/css/intlTelInput.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/isValidNumber.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/prism.css">
    <style>
        * {
            font-family: Poppins, 'sans-serif';
        }

        p {
            margin-bottom: 0;
        }

        .nav-link {
            color: #067ee6;
        }

        .registerBtn.btn {
            background-color: #067ee6;
            color: white;
            border: 1px solid #067ee6;
        }

        .registerBtn.btn:hover {
            border: 1px solid #067ee6;
            background-color: transparent;
            color: #067ee6;
        }

        .heading::after {
            content: "";
            border-bottom: 5px solid #067ee6;
            ;
            width: 8%;
            display: block;
            padding-bottom: 10px;
        }

        .row .side-one {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }

        .logo {
            display: none;
        }

        .login.btn {
            font-size: 14px;
        }

        .login.btn:hover {
            color: #067ee6;
        }

        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        @media (max-width: 767.98px) {
            .row .side-one {
                display: none !important;
            }

            .logo {
                display: inline-block;
            }

            .heading::after {
                content: "";
                border-bottom: 5px solid #067ee6;
                width: 15%;
                display: block;
                padding-bottom: 10px;
            }

            .heading {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid register">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center justify-content-center side-one "
                style="background-image: linear-gradient(180deg, #0259a7 ,#57c7f7);height:100vh;">
                <div class="text-center my-5">
                    <img src="/images/white-logo.png" alt="" style="height: 300px" />
                    <h5 class="mt-5 text-white" style="word-spacing: 3px">JOIN WITH US</h5>
                    <p style="font-size:14px;color:#e2e2ed;">If you already have an account ? <a
                            href="{{ route('login') }}" class="ms-1 btn btn-outline-light login">Login</a></p>
                </div>
            </div>
            <div class="col-md-8 offset-md-4 offset-sm-0">
                <h4 class="my-5 mx-3 heading"><span class="logo"><img src="/images/blue-logo.png" alt=""
                            style="height: 40px"> </span> Register Your Account</h4>
                {{-- <ul class="nav nav-tabs mx-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user"
                            type="button" role="tab" aria-controls="user" aria-selected="true">User
                            Register</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="doctor-tab" data-bs-toggle="tab" data-bs-target="#doctor"
                            type="button" role="tab" aria-controls="doctor" aria-selected="false">Doctor
                            Register</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nurse-tab" data-bs-toggle="tab" data-bs-target="#nurse"
                            type="button" role="tab" aria-controls="nurse" aria-selected="false">Nurse
                            Register</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor"
                            type="button" role="tab" aria-controls="vendor" aria-selected="false">Vendor
                            Register</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="driver-tab" data-bs-toggle="tab" data-bs-target="#driver"
                            type="button" role="tab" aria-controls="driver" aria-selected="true">Driver
                            Register</button>
                    </li>
                </ul> --}}
                <div class="tab-content mx-3 m-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                        aria-labelledby="user-tab">
                        <form method="POST" action="{{ route('register') }}" id="userRegister"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>User Registration</h5>
                            <p style="font-size: 14px;" class="text-muted mb-5">Please fill below information to
                                register your account.</p>
                            <input type="hidden" name="role" value="6">
                            <input type="hidden" name="is_verified" value="0">
                            <div class="row g-3 ">
                                <div class="col-md-12">
                                    <label class="form-label">Full Name</label>
                                    <div class="col-md-8">
                                        <input type="text"
                                            class="form-control @error('phone') is-invalid @enderror" required
                                            name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror" required
                                            name="email" value="{{ old('email') }}">
                                        <div class="alert alert-danger email-error" style="display: none">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Phone</label>
                                    <div class="col-md-8">
                                        <input type="tel" id="phone1"
                                            class="form-control @error('phone') is-invalid @enderror" required
                                            name="phone" value="{{ old('phone') }}">
                                        <span id="valid-msg1" class="hide valid">✓ Valid</span>
                                        <span id="error-msg1" class="hide error"></span>
                                        <div class="alert alert-danger phone-error" style="display: none">
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Password</label>
                                    <div class="col-md-8">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Must contain min 8 character with upper,lower and special character" required>
                                        <div class="alert alert-danger password-error" style="display: none">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control " name="password_confirmation"
                                        placeholder="Must contain min 8 character with upper,lower and special character"   required>
                                    </div>
                                </div>
                                <div class="col-12 mt-5 mb-3">
                                    <button class="btn px-5 registerBtn" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                        <form method="POST" action="{{ route('register') }}" id="doctorRegister"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>Doctor Registration</h5>
                            <p style="font-size: 14px;" class="text-muted mb-5">Please fill below information to
                                register your doctor account.</p>
                            <input type="hidden" name="role" value="4">
                            <input type="hidden" name="is_verified" value="0">
                            <div class="row g-3 ">
                                <div class="col-lg-12">
                                    <label class="form-label">NMC/NAMC/NHPC Number</label>
                                    <input type="number" class="form-control" name="nmc_no"
                                        value="{{ old('nmc_no') }}" required>
                                    @error('nmc_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Salutation</label>
                                    <select class="form-select" name="salutation" required>
                                        <option value="" selected disabled>--select--</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Asst. Prof.">Asst. Prof.</option>
                                        <option value="Prof.">Prof.</option>
                                    </select>
                                    @error('salutation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    <div class="alert alert-danger email-error" style="display: none">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <div class="col-md-12">
                                        <input type="tel" id="phone2"
                                            class="form-control @error('phone') is-invalid @enderror" required
                                            name="phone" value="{{ old('phone') }}">
                                        <span id="valid-msg2" class="hide valid">✓ Valid</span>
                                        <span id="error-msg2" class="hide error"></span>
                                        <div class="alert alert-danger phone-error" style="display: none">
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" required>
                                        <option value="" selected disabled>--select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Department</label>
                                    <select class="form-select" name="department" required>
                                        <option value="" selected disabled>--select--</option>
                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->department }}</option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" class="form-control" name="qualification"
                                        value="{{ old('qualification') }}" required>
                                    @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Years Practiced</label>
                                    <input type="number" class="form-control" name="year_practiced"
                                        value="{{ old('year_practiced') }}" required>
                                    @error('year_practiced')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Specialization</label>
                                    <input type="text" class="form-control" name="specialization"
                                        value="{{ old('specialization') }}" required>
                                    @error('specialization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Must contain min 8 character with upper,lower and special character" required>
                                    <div class="alert alert-danger password-error" style="display: none">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " name="password_confirmation"
                                    placeholder="Must contain min 8 character with upper,lower and special character"  required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Your Photo</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">File</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <div class="col-12 mt-5 mb-3">
                                    <button class="btn px-5 registerBtn" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    {{-- <div class="tab-pane fade" id="nurse" role="tabpanel" aria-labelledby="nurse-tab">
                        <form method="POST" action="{{ route('register') }}" id="nurseRegister"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>Nurse Registration</h5>
                            <p style="font-size: 14px;" class="text-muted mb-5">Please fill below information to
                                register your nurse account.</p>
                            <input type="hidden" name="role" value="7">
                            <input type="hidden" name="is_verified" value="0">
                            <div class="row g-3 ">
                                <div class="col-lg-6">
                                    <label class="form-label">NNC Number</label>
                                    <input type="number" class="form-control" name="nnc_no"
                                        value="{{ old('nnc_no') }}" required>
                                    @error('nnc_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    <div class="alert alert-danger email-error" style="display: none">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <div class="col-md-12">
                                        <input type="tel" id="phone4"
                                            class="form-control @error('phone') is-invalid @enderror" required
                                            name="phone" value="{{ old('phone') }}">
                                        <span id="valid-msg4" class="hide valid">✓ Valid</span>
                                        <span id="error-msg4" class="hide error"></span>
                                        <div class="alert alert-danger phone-error" style="display: none">
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" required>
                                        <option value="" selected disabled>--select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" class="form-control" name="qualification"
                                        value="{{ old('qualification') }}" required>
                                    @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Years Practiced</label>
                                    <input type="number" class="form-control" name="year_practiced"
                                        value="{{ old('year_practiced') }}" required>
                                    @error('year_practiced')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Must contain min 8 character with upper,lower and special character"  required>
                                    <div class="alert alert-danger password-error" style="display: none">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " name="password_confirmation"
                                    placeholder="Must contain min 8 character with upper,lower and special character" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Your Photo</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">File</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <div class="col-12 mt-5 mb-3">
                                    <button class="btn px-5 registerBtn" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="driver-tab">
                        <form method="POST" action="{{ route('register') }}" id="DriverRegister"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>Driver Registration</h5>
                            <p style="font-size: 14px;" class="text-muted mb-5">Please fill below information to
                                register your account.</p>
                            <input type="hidden" name="role" value="9">
                            <input type="hidden" name="is_verified" value="0">
                            <div class="row g-3 ">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        name="email" value="{{ old('email') }}">
                                    <div class="alert alert-danger email-error" style="display: none">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" id="phone6"
                                        class="form-control @error('phone') is-invalid @enderror" required
                                        name="phone" value="{{ old('phone') }}">
                                    <span id="valid-msg6" class="hide valid">✓ Valid</span>
                                    <span id="error-msg6" class="hide error"></span>
                                    <div class="alert alert-danger phone-error" style="display: none">
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Must contain min 8 character with upper,lower and special character"  required>
                                    <div class="alert alert-danger password-error" style="display: none">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " name="password_confirmation"
                                    placeholder="Must contain min 8 character with upper,lower and special character"  required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Your Photo</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">License Photo</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <div class="col-12 mt-5 mb-3">
                                    <button class="btn px-5 registerBtn" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                        <form method="POST" action="{{ route('vendor.store') }}" id="appointment_form"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>Vendor Registration</h5>
                            <p style="font-size: 14px;" class="text-muted mb-5">Please fill below information to
                                register your vendor account.</p>
                            <input type="hidden" name="role" value="5">
                            <input type="hidden" name="is_verified" value="0">
                            <div class="row g-3 ">
                                {{-- <div class="col-lg-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    <div class="alert alert-danger email-error" style="display: none">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <div class="col-md-12">
                                        <input type="tel" id="phone3"
                                            class="form-control @error('phone') is-invalid @enderror" required
                                            name="phone" value="{{ old('phone') }}">
                                        <span id="valid-msg3" class="hide valid">✓ Valid</span>
                                        <span id="error-msg3" class="hide error"></span>
                                        <div class="alert alert-danger phone-error" style="display: none">
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="vendor_type" required>
                                        <option value="" selected disabled>--select--</option>
                                        @foreach ($vendors as $item)
                                            <option value="{{ $item->id }}">{{ $item->vendor_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('vendor_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Must contain min 8 character with upper,lower and special character" required>
                                    <div class="alert alert-danger password-error" style="display: none">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " name="password_confirmation"
                                    placeholder="Must contain min 8 character with upper,lower and special character" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Your Logo</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">File</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <div class="col-12 mt-5 mb-3">
                                    <button class="btn px-5 registerBtn" id="register" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="/global_assets/js/main/jquery.min.js"></script>
    <script>
        $('#userRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#userRegister")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location = response.route;
                },
                error: function(response) {
                    if (response.responseJSON.errors.email != undefined) {
                        $("#userRegister .email-error").css('display', 'block');
                        $("#userRegister .email-error").text(response.responseJSON.errors.email);
                    } else {
                        $("#userRegister .email-error").css('display', 'none');
                    }
                    if (response.responseJSON.errors.phone != undefined) {
                        $("#userRegister .phone-error").css('display', 'block');
                        $("#userRegister .phone-error").text(response.responseJSON.errors.phone);
                    } else {
                        $("#userRegister .phone-error").css('display', 'none');
                    }
                    if (response.responseJSON.errors.password != undefined) {
                        $("#userRegister .password-error").css('display', 'block');
                        $("#userRegister .password-error").text(response.responseJSON.errors.password);
                    } else {
                        $("#userRegister .password-error").css('display', 'none');
                    }
                }
            });
        });

        $('#doctorRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#doctorRegister")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location = response.route;
                },
                error: function(response) {
                    if (response.responseJSON.errors.email != undefined) {
                        $("#doctorRegister .email-error").css('display', 'block');
                        $("#doctorRegister .email-error").text(response.responseJSON.errors.email);
                    } else {
                        $("#doctorRegister .email-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.phone != undefined) {
                        $("#doctorRegister .phone-error").css('display', 'block');
                        $("#doctorRegister .phone-error").text(response.responseJSON.errors.phone);
                    } else {
                        $("#doctorRegister .phone-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.password != undefined) {
                        $("#doctorRegister .password-error").css('display', 'block');
                        $("#doctorRegister .password-error").text(response.responseJSON.errors
                            .password);
                    } else {
                        $("#doctorRegister .password-error").css('display', 'none');
                    }
                }
            });
        });
        $('#vendorRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#vendorRegister")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location = response.route;
                },
                error: function(response) {
                    if (response.responseJSON.errors.email != undefined) {
                        $("#vendorRegister .email-error").css('display', 'block');
                        $("#vendorRegister .email-error").text(response.responseJSON.errors.email);
                    } else {
                        $("#vendorRegister .email-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.phone != undefined) {
                        $("#vendorRegister .phone-error").css('display', 'block');
                        $("#vendorRegister .phone-error").text(response.responseJSON.errors.phone);
                    } else {
                        $("#vendorRegister .phone-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.password != undefined) {
                        $("#vendorRegister .password-error").css('display', 'block');
                        $("#vendorRegister .password-error").text(response.responseJSON.errors
                            .password);
                    } else {
                        $("#vendorRegister .password-error").css('display', 'none');
                    }
                }
            });
        });

        $('#nurseRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#nurseRegister")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location = response.route;
                },
                error: function(response) {
                    if (response.responseJSON.errors.email != undefined) {
                        $("#nurseRegister .email-error").css('display', 'block');
                        $("#nurseRegister .email-error").text(response.responseJSON.errors.email);
                    } else {
                        $("#nurseRegister .email-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.phone != undefined) {
                        $("#nurseRegister .phone-error").css('display', 'block');
                        $("#nurseRegister .phone-error").text(response.responseJSON.errors.phone);
                    } else {
                        $("#nurseRegister .phone-error").css('display', 'none');
                    }

                    if (response.responseJSON.errors.password != undefined) {
                        $("#nurseRegister .password-error").css('display', 'block');
                        $("#nurseRegister .password-error").text(response.responseJSON.errors.password);
                    } else {
                        $("#nurseRegister .password-error").css('display', 'none');
                    }
                }
            });
        });

        $('#DriverRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#DriverRegister")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location = response.route;
                },
                error: function(response) {
                    console.log(response);
                    if (response.responseJSON.errors.email != undefined) {
                        $("#DriverRegister .email-error").css('display', 'block');
                        $("#DriverRegister .email-error").text(response.responseJSON.errors.email);
                    } else {
                        $("#DriverRegister .email-error").css('display', 'none');
                    }
                    if (response.responseJSON.errors.phone != undefined) {
                        $("#DriverRegister .phone-error").css('display', 'block');
                        $("#DriverRegister .phone-error").text(response.responseJSON.errors.phone);
                    } else {
                        $("#DriverRegister .phone-error").css('display', 'none');
                    }
                    if (response.responseJSON.errors.password != undefined) {
                        $("#DriverRegister .password-error").css('display', 'block');
                        $("#DriverRegister .password-error").text(response.responseJSON.errors
                            .password);
                    } else {
                        $("#DriverRegister .password-error").css('display', 'none');
                    }
                }
            });
        });
    </script>
    <script src="/global_assets/countrycode/js/intlTelInput.js"></script>
    <script src="/global_assets/countrycode/js/isValidNumber.js"></script>
    <script src="/global_assets/countrycode/js/prism.js"></script>
    <script></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#appointment_form').on('submit', function() {
                $('#register').attr('disabled', 'true');
            });
        });
    </script>
</body>

</html>
