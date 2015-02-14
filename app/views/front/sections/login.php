<div id="login-account" class="login-ui pull-right account">
    <img id="account-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=36"
    alt="">
    {% if user.isLogged() %}
        <span> {{ user.username }} </span>
        <a href="/logout" rel="nofollow">logout</a>
    {% else %}
        <a class="toggle-form" href="#" rel="nofollow">Login</a>
    {% endif %}
</div>
<div id="login-form" class="login-ui">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">
                Log in to create your answer or
                <a class="toggle-form" href="#" rel="nofollow">close</a>
            </h1>
            <div class="account-wall">
                <h4 class="response"></h4>
                <img id="login-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                alt="">
                <form class="form-signin"  method="POST" action="/login">
                    <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" name="remember-me" value="remember-me">
                        Remember me
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
