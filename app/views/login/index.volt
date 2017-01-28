<div class="container">
    {{ content() }}
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Login</h1>
            <div class="account-wall">
                <img class="profile-img" src="../img/photo.png" alt="">
                {{ form('login/proseslogin', 'role': 'form', 'class':'form-signin') }}
                    {{ text_field("username", "class":"form-control", "placeholder":"User ID", "required":"true", "autofocus":"true") }}
                    {{ password_field("password", "class":"form-control", "placeholder":"Password", "required":"true") }}
                    {{ submit_button("Sign in", "class":"btn btn-lg btn-primary btn-block")}}
                    <a href="#" class="pull-right need-help">Need help? </a>
                    <span class="clearfix"></span>
                {{ end_form() }}
            </div>
        </div>
    </div>
</div>