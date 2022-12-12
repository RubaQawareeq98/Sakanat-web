
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Let Us Know Your Feedback || Learning Robo</title>
    <style>

        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            background: #4e54c8;
            background: -webkit-linear-gradient(to right, #8f94fb, #4e54c8);
            background: linear-gradient(to right, #8f94fb, #4e54c8);
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
            height:100vh;
        }

        .panel-container {
            background-color: #12192c;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            font-size: 90%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 30px;
            max-width: 400px;
            color:#4e54c8;
            margin:10% auto 2% auto;
        }

        .panel-container strong {
            line-height: 20px;
        }

        .ratings-container {
            display: flex;
            margin: 20px 0;
        }

        .rating {
            flex: 1;
            cursor: pointer;
            padding: 20px;
            margin: 10px 5px;
        }

        .rating:hover,
        .rating.active {
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .rating img {
            width: 40px;
        }

        .rating small {
            color: #fff;
            display: inline-block;
            margin: 10px 0 0;
        }

        .rating:hover small,
        .rating.active small {
            color: #8f94fb;
        }

        .btn {
            background-color: #8f94fb;
            color: #000;
            border: 0;
            border-radius: 4px;
            padding: 12px 30px;
            cursor: pointer;
        }

        .btn:focus {
            outline: 0;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .fa-heart {
            color: red;
            font-size: 30px;
            margin-bottom: 10px;
        }


        .credit a{
            text-decoration: none;
            color: #fff;
        }

        .credit {
            text-align: center;
        }


    </style>
</head>
<body>
<div id="panel" class="panel-container">
    <strong>How satisfied are you with our <br /> customer support performance?</strong>
    <div class="ratings-container">
        <div class="rating">
            <img src="https://image.flaticon.com/icons/svg/187/187150.svg" alt="">
            <small>Unhappy</small>
        </div>

        <div class="rating">
            <img src="https://image.flaticon.com/icons/svg/187/187136.svg" alt=""/>
            <small>Neutral</small>
        </div>

        <div class="rating active">
            <img src="https://image.flaticon.com/icons/svg/187/187133.svg" alt=""/>
            <small>Satisfied</small>
        </div>
    </div>
    <button class="btn" id="send">Send Review</button>
</div>
<div class="credit">Made with <span style="color:tomato">❤</span> by <a  href="https://www.learningrobo.com/">Learning Robo</a></div>
<script src="script.js"></script>

</body>
<script>

    const ratings = document.querySelectorAll('.rating')
    const ratingsContainer = document.querySelector('.ratings-container')
    const sendBtn = document.querySelector('#send')
    const panel = document.querySelector('#panel')
    let selectedRating = 'Satisfied'

    ratingsContainer.addEventListener('click', (e) => {
        if(e.target.parentNode.classList.contains('rating')) {
            removeActive()
            e.target.parentNode.classList.add('active')
            selectedRating = e.target.nextElementSibling.innerHTML
        }
        if(e.target.classList.contains('rating')) {
            removeActive()
            e.target.classList.add('active')
            selectedRating = e.target.nextElementSibling.innerHTML
        }

    })

    sendBtn.addEventListener('click', (e) => {
        panel.innerHTML = `

        Thank You!

        Feedback : ${selectedRating}
        We'll use your feedback to improve our customer support
    `
    })

    function removeActive() {
        for(let i = 0; i < ratings.length; i++) {
            ratings[i].classList.remove('active')
        }
    }


</script>
</html>
