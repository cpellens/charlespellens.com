<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Charles Pellens / Web Developer and Designer / Home</title>
    <link rel="stylesheet" href="https://use.typekit.net/hgc0qqn.css">
    <link rel="stylesheet" href="//{{ $_SERVER['HTTP_HOST'] }}/css/app.css">
</head>
<body>
<header>
    <div class="site-width shaded">
        <div id="portrait" class="lax" data-lax-translate-y="0 0, 600 -128">
            <img src="//cdn.charlespellens.com/portfolio/profile-pic.jpg" alt="Portrait of Charles Pellens">
        </div>
        <span id="title" class="lax" data-lax-translate-y="0 0, 600 -128">
            Charles Pellens
        </span>
    </div>
    <span id="php">
        &lt;?PHP
    </span>
</header>
<div id="content">
    <div class="site-width shaded">
        <section class="columns">
            @include ('block.nav')

            <div style="flex: 3;">
                @include ('block.skills')
                <br>
                @include ('block.tools')
                @include ('block.work')

                <br>

                @include ('block.hobbies')
            </div>
        </section>
    </div>
</div>

<footer>
    <div class="site-width shaded">
        <div class="columns">
            <div class="column">
                <h3>Questions? Let's get in touch</h3><br>
                E-Mail: <a href="mailto:contact@charlespellens.com">contact@charlespellens.com</a><br>
                Phone: 989.220.1094<br>
                <hr>
                <p>
                    I look forward to doing what I can do to help you achieve your goals.
                </p>
            </div>
            <div class="column" style="text-align: right;">
                <a href="//linkedin.com/in/cpellens" target="_blank"><img
                            class="soc-link" src="//cdn.charlespellens.com/portfolio/linked-in.png"></a><br>
                <a href="//github.com/cpellens" target="_blank"><img class="soc-link" src="//cdn.charlespellens.com/portfolio/010-github.png" style="max-height: 4vmin"></a>
                <!-- <a href="//instagram.com/cpellens" target="_blank"><img src="//charlespellens.com/img/banner/instagram.png"></a> -->
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="./js/app.js"></script>

</body>
</html>
