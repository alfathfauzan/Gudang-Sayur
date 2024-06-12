<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/img/Logo cropped.png">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/update.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <title>Profile Settings</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="itemBackground">
                
                
                
                <h1 class="nike">Gudan Sayur</h1>
                <h1 class="LOGOS">Gudang Sayur</h1>
            </div>
            <form action="/profileupdate" method="POST" class="info">
                @csrf
                <div class="itemName">
                    <div>
                        <h1 class="big">UPDATE</h1>
                        <span class="new">Profile</span>
                    </div>
                    <h3 class="small">{{ auth()->user()->fullname }}</h3>
                </div>
                <div class="description">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <input name="name" value="{{ auth()->user()->name }}" type="text" required />
                        <label>name</label>
                        @error('name')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input name="email" value="{{ auth()->user()->email }}" type="text" required />
                        <label>Email</label>
                        @error('email')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input name="address" value="{{ auth()->user()->address }}" type="text" required />
                        <label>Address</label>
                        @error('address')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input name="city" value="{{ auth()->user()->city }}" type="text" required />
                        <label>City</label>
                        @error('city')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input name="state" value="{{ auth()->user()->state }}" type="text" required />
                        <label>State</label>
                        @error('state')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input name="zip_code" value="{{ auth()->user()->zip_code }}" type="text" required />
                        <label>Zip Code</label>
                        @error('zip_code')
                            <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="buy-price">
                    <button href="#" class="buy" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/js/profileupdate.js"></script>
</body>

</html>
