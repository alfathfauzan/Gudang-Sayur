<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

            <header>Sign Up</header>
            <form action="/register" method="post">
                @csrf
                <div class="field input">
                    <label for="name">Username</label>
                    <input type="text" class="is-invalid" name="name" id="name" autocomplete="off" required value="{{ old('name') }}">
                    @error('name')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" class="is-invalid" name="email" id="email" autocomplete="off" required value="{{ old('email') }}">
                    @error('email')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    @error('password')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login">Sign In</a>
                </div>
            </form>
        </div>
        
      </div>
</body>
</html>