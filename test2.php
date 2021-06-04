<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    body {
        margin: 0;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 200px);
        justify-content: center;
        align-content: center;
        grid-gap: 10px;
        height: 100vh;
    }

    .grid img {
        width: 200px;
        height: 200px;
        cursor: pointer;
    }

    #lightbox {
        position: fixed;
        z-index: 1000;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .8);
        display: none;
    }

    #lightbox.active {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #lightbox img {
        max-width: 90%;
        max-height: 80%;
        padding: 4px;
        background-color: black;
        border: 2px solid white;
    }
    </style>

    <title>Lightbox</title>
</head>

<body>
    <div class="grid">
        <img src="https://source.unsplash.com/400x400?mountain">
        <img src="https://source.unsplash.com/400x400?nature">
        <img src="https://source.unsplash.com/400x400?valley">
        <img src="https://source.unsplash.com/400x400?beach">
        <img src="https://source.unsplash.com/400x400?ocean">
        <img src="https://source.unsplash.com/400x400?water">
        <img src="https://source.unsplash.com/400x400?trees">
        <img src="https://source.unsplash.com/400x400?lake">
        <img src="https://source.unsplash.com/400x400?cliff">
    </div>
    <script>
    const lightbox = document.createElement('div')
    lightbox.id = 'lightbox'
    document.body.appendChild(lightbox)

    const images = document.querySelectorAll('img')
    images.forEach(image => {
        image.addEventListener('click', e => {
            lightbox.classList.add('active')
            const img = document.createElement('img')
            img.src = image.src
            while (lightbox.firstChild) {
                lightbox.removeChild(lightbox.firstChild)
            }
            lightbox.appendChild(img)
        })
    })

    lightbox.addEventListener('click', e => {
        if (e.target !== e.currentTarget) return
        lightbox.classList.remove('active')
    })
    </script>
</body>

</html>