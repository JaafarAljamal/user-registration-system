<h1>Register</h1>

<form method="POST" action="/register">
    @csrf

    <label for="username">Name</label>
    <input type="text" id="username" name="username">

    <label for="email">Email</label>
    <input type="email" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" id="password" name="password">

    <button type="submit">Register</button>
</form>