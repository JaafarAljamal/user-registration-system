<h1>Login Page</h1>

<form method="POST" action="/login">
@csrf
<label for="email">Email</label>
<input type="email" id="email" name="email" required>

<label for="password">Passowrd</label>
<input type="password" id="password" name="password" required>

<button type="submit">Login</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
