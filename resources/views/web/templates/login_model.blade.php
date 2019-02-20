<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="title-default-bold mb-none">Login</div>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if ($errors->login->has('email'))
                            <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->login->first('email') }}
                            </div>
                        @endif

                        <label>Username or email address *</label>
                        <input type="email" placeholder="E-mail" class="{{ $errors->login->has('email') ? ' is-invalid' : '' }}"
                        required autofocus name="email" value="{{ old('email') }}" />


                        <label>Password *</label>
                        <input type="password" placeholder="Password"
                        class="{{ $errors->login->has('password') ? ' is-invalid' : '' }}"
                               name="password" required />


                        <div class="checkbox checkbox-primary">
                            <input id="checkbox1" type="checkbox">
                            <label for="checkbox1">Remember Me</label>
                        </div>


                        <button class="default-big-btn" type="submit" value="Login">Login</button>
                        <button class="default-big-btn form-cancel" type="button" data-dismiss="modal">Cancel</button>

                        <label class="lost-password"><a href="#">Lost your password?</a></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>