<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container-fluid {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .btn-dark {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-dark:hover {
            background-color: #1d2124;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Enter OTP</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- OTP field -->
                    <div class="form-outline my-4">
                        <label for="entered_otp" class="form-label">Enter OTP</label>
                        <input type="number" id="entered_otp" class="form-control" placeholder="Enter the OTP received" 
                            autocomplete="off" required="required" name="entered_otp">
                    </div>
                    <div class="m-2 pt-1">
                        <input type="submit" value="Verify OTP" class="btn btn-dark" name="submit_otp">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
