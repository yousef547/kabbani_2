@extends('layout.auth')
@section('title')
Sing-up
@endsection

@section('contant')
<div class="row m-0">
    <div class="col-12 p-0">
        <div class="login-card">
            <div>
                <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                <div class="login-main">
                    <form class="theme-form" action="{{url('/register')}}" method="post">
                        @csrf
                        @include('inc.massage')
                        <h4>Create your account</h4>
                        <p>Enter your personal details to create account</p>
                        <div class="form-group">
                            <label class="col-form-label pt-0">Your Name</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input class="form-control" type="text" required="" name="first_name" placeholder="First name">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" required="" name="last_name" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email Address</label>
                            <input class="form-control" type="email" required="" name="email" placeholder="Test@gmail.com">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Name stor</label>
                            <input class="form-control" type="text" required="" id="set-name-stor" name="name_domin" placeholder="Name stor">
                        </div>
                        <div class="sub-domian-result doamin-name-validator" id="subdomain">https://<span id="get-name-stor"></span>.zvendostore.com<div id="doamin-name-validator" style="display:inline-block;">
                                <div id="doamin-name-wrong" style="display:inline-block;font-size:30px;color:red">✗</div>
                                <div id="doamin-name-right" style="display:none;font-size:30px;color:green">✔</div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <div class="form-input position-relative">
                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirmation Password</label>
                            <div class="form-input position-relative">
                                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="checkbox p-0">
                                <input id="checkbox1" type="checkbox">
                                <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                            </div>
                            <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                        </div>
                        <h6 class="text-muted mt-4 or">Or signup with</h6>
                        <div class="social mt-4">
                            <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin txt-linkedin">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                        <rect x="2" y="9" width="4" height="12"></rect>
                                        <circle cx="4" cy="4" r="2"></circle>
                                    </svg> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter txt-twitter">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook txt-fb">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>facebook</a></div>
                        </div>
                        <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="{{route('sing-in')}}">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    $('#set-name-stor').on("keyup", function() {
        $('#get-name-stor').text(this.value)
        var domiein = this.value;
        $('#doamin-name-right').css('display', 'none');
        $('#doamin-name-wrong').css('display', 'inline');
        if (domiein.length != 0) {
            $.get(`check-domein/${domiein}`, function(data, status) {
                console.log(data.status)
                if (data.status) {
                    $('#doamin-name-wrong').css('display', 'inline');
                    $('#doamin-name-right').css('display', 'none');
                } else {
                    $('#doamin-name-wrong').css('display', 'none');
                    $('#doamin-name-right').css('display', 'inline');
                }
            });
        }
    })
</script>
@endsection
@endsection

<!-- caE$$$Yg.#Au42T -->