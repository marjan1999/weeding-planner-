<?php

    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

        :root{
            --green:#27ae60;
            --black:#192a56;
        }

        *{
            font-family: 'Nunito', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            text-decoration: none;
            outline: none; border:none;
            text-transform: capitalize;
            transition: all .2s linear;
        }

        *::selection{
            background:var(--green);
            color:#fff;
        }

        html{
            font-size: 68.5%;
            overflow-x: hidden;
            scroll-padding-top: 5.5rem;
            scroll-behavior: smooth;
        }

        .heading{
            text-align: center;
            color:var(--black);
            text-transform: uppercase;
            padding:1rem;
            font-size: 3.5rem;
            padding-bottom: 2rem;
        }

        section{
            padding:2rem 9%;
        }

        .sub-heading{
            text-align: center;
            color:var(--green);
            font-size: 3rem;
            padding-top: 1rem;
        }

        .order form{
            max-width:90rem;
            border-radius: .5rem;
            border:.1rem solid rgba(0,0,0,.2);
            background:#fff;
            padding:1.5rem;
            margin:0 auto;
        }

        .order form .inputBox{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .order form .inputBox .input{
            width:49%;
        }

        .order form .inputBox .input span{
            display:block;
            padding:.5rem 0;
            font-size: 1.5rem;
            color:var(--light-color);
        }

        .order form .inputBox .input input,
        .order form .inputBox .input textarea{
            background:#eee;
            border-radius: .5rem;
            padding:1rem;
            font-size: 1.6rem;
            color:var(--black);
            text-transform: none;
            margin-bottom: 1rem;
            width:100%;
        }

        .order form .inputBox .input input:focus,
        .order form .inputBox .input textarea:focus{
            border:.1rem solid var(--green);
        }

        .order form .inputBox .input textarea{
            height:20rem;
            resize: none;
        }

        .order form .btn{
            margin-top: 0;
        }

        .btn{
            margin-top: 1rem;
            display: inline-block;
            font-size: 1.7rem;
            color:#fff;
            background: var(--green);
            border-radius: .5rem;
            cursor: pointer;
            padding:.8rem 3rem;
        }
    </style>

</head>
<body>

<!-- order section -->

<section class="order" id="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>

    <form action="order.php" method="POST">

        <div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" placeholder="enter your name" name="name" required>
            </div>
            <div class="input">
                <span>your number</span>
                <input type="number" placeholder="enter your number" name="number" required>
            </div>
        </div>


        <div class="inputBox">
            <div class="input">
                <span>your order</span>
                <input type="text" placeholder="enter product name"name="itemName" required>
            </div>
            <div class="input">
                <span>additional item</span>
                <input type="test" placeholder="extra with item" name="addItem" required>
            </div>
        </div>


        <div class="inputBox">
            <div class="input">
                <span>how much</span>
                <input type="number" placeholder="how many orders" name="howMuch" required>
            </div>
            <div class="input">
                <span>date and time</span>
                <input type="datetime-local" name="date" required>
            </div>
        </div>


        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="address" placeholder="enter your address" cols="30" rows="10" required></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="message" placeholder="enter your message" cols="30" rows="10"></textarea>
            </div>
        </div>

        <input type="submit" value="order now" class="btn" name="sub">

    </form>
    <section>

    <?php

    if(isset($_POST['sub'])) {

        $name = $_POST['name'];
        $number = $_POST['number'];
        $itemName= $_POST['itemName'];
        $exItem = $_POST['addItem'];
        $howMuch = $_POST['howMuch'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $message = $_POST['message'];

        $insertion = "insert into orderTable(name, number, product, additional_item, how_much, date_time, address, message) values('$name', '$number', '$itemName', '$exItem', '$howMuch', '$date', '$address', '$message') ";
        $run = mysqli_query($con, $insertion);

        if($run) {

            echo"
            <script>

            alert('You are Successfully Registered');
            window.location.href='index.html';
            </script>
            ";
        } else {
             echo"
             <script>

             alert('Connection Failed');
             window.location.href='signup.php';
             </script>
             ";
        }
    }

    ?>

</body>
</html>