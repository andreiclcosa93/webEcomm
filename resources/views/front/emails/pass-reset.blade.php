<style>

.container {
    margin: 20px auto;
    padding: 15px 10px;
    border: 1px solid grey;
    border-radius: 5px;
    max-width: 600px;
    overflow-wrap: break-word;
}

.container h1 {
    font-size: 1.7em;
    text-align: center;
    line-height: 2em;
}

.container p {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 1em;
    line-height: 1.2em;
    color: rgb(41, 44, 46);
}

.container a.link {
    display: block;
    padding: 3px 6px;
    width: 80%;
    margin: 5px auto;
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1.4em;
    background-color: rgb(66, 56, 75);
    color: white;
}

</style>

<div class="container">
    <h1>Resset Password</h1>

    <p>You are receiving this email because we received a password reset request for your account.</p><br />

    <a href="{{ $url }}"  class="link">Reset password</a><br />

    <p>This password reset link will expire in 60 minutes.<br />

        If you did not request a password reset, no further action is required.</p><br />

    <p>
        If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
        <span style="color:blue; ">{{ $url }}</span>
    </p>

</div>
