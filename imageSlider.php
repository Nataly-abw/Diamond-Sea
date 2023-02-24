<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Script -->
    <link rel="stylesheet" href="./mainCSS/sliderStyle.css">

    <!-- Js Script -->
    <script src="sliderScript.js" defer></script>
</head>

<body>
    <section aria-label="Newest Photos">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
            <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="slider_images/slide4.png">
                    <div class="slide4BttnBox">
                        <button class="btn slide4Bttn">Discover more</button>
                    </div>
                </li>
                <li class="slide">
                    <img src="slider_images/slide5.png">
                    <div class="slide5BttnBox">
                        <button class="btn slide5Bttn">Discover The Collection</button>
                    </div>
                </li>
                <li class="slide">
                    <img src="slider_images/slide7-2.png">
                </li>
                <li class="slide">
                    <img src="slider_images/slide3.png">
                </li>
            </ul>
        </div>
    </section>
</body>

</html>