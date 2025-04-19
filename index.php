
#Image Gallery with LightBox
#author : Kirti Karapurkar
#date : 19-04-2025
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Image Gallery with Lightbox</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f8f9fa;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }

    .gallery img {
      width: 100%;
      max-width: 400px;
      height: auto;
      cursor: pointer;
      border: 2px solid #ccc;
      transition: transform 0.3s, box-shadow 0.3s;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .gallery img:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    #lightbox {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .image-content {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      position: relative;
    }

    #lightbox img {
      width: 90%;
      max-width: 500px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(168, 159, 159, 0.3);
    }

    .lightbox-nav {
      position: absolute;
      top: 50%;
      font-size: 50px;
      color: white;
      cursor: pointer;
      padding: 20px;
      user-select: none;
      transform: translateY(-50%);
      z-index: 1200;
    }

    .prev {
      left: 20px;
    }

    .next {
      right: 20px;
    }

    .close {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 35px;
      color: white;
      cursor: pointer;
      z-index: 1200;
    }

    @media (max-width: 600px) {
      .lightbox-nav {
        font-size: 30px;
        padding: 10px;
      }
      #lightbox img {
        max-width: 90%;
      }
    }
  </style>
</head>
<body>

  <h1>Image Gallery with Lightbox</h1>

  <div class="gallery">
    <img src="images/pexels-maximilian-orlowsky-515733-30327991.jpg" alt="City Skyline" />
    <img src="images/pexels-raulling-28518775.jpg" alt="Forest Path" />
    <img src="images/pexels-raulling-30948820.jpg" alt="Snowy Mountain" />
  </div>

  <div id="lightbox">
    <span class="close">&times;</span>
    <span class="lightbox-nav prev">&#10094;</span>
    <div class="image-content">
      <img src="" alt="Expanded view" />
    </div>
    <span class="lightbox-nav next">&#10095;</span>
  </div>

  <script>
    $(document).ready(function () {
      let currentIndex = 0;
      const images = $(".gallery img");

      function showImage(index) {
        const src = images.eq(index).attr("src");
        const alt = images.eq(index).attr("alt");
        $("#lightbox img").attr("src", src).attr("alt", alt);
        $("#lightbox").fadeIn();
      }

      images.click(function () {
        currentIndex = images.index(this);
        showImage(currentIndex);
      });

      $(".close").click(function () {
        $("#lightbox").fadeOut();
      });

      $(".next").click(function () {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
      });

      $(".prev").click(function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
      });

      $(document).keydown(function (e) {
        if (e.key === "Escape") {
          $("#lightbox").fadeOut();
        } else if (e.key === "ArrowRight") {
          $(".next").click();
        } else if (e.key === "ArrowLeft") {
          $(".prev").click();
        }
      });
    });
  </script>

</body>
</html>
