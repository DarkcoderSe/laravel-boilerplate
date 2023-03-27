<h3>Hello!</h3>
<p>You are receiving this email because we received a password reset request for your account.</p>

<div style="text-align:center; margin: 5% 20%">

<a href="{{ url('customer/reset_password/').'/'.$token }}" class="btn btn-primary">Reset Password</a>
</div>

<p>This password reset link will expire in 60 minutes.</p>

<p>If you did not request a password reset, no further action is required.</p>
<div style="margin-bottom:5%">
<b>Regards, </b>
<p>Laravel</p>
</div>


