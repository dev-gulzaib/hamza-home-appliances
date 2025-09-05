<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shop by Scent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .scent-scroll {
      overflow-x: auto;
      white-space: nowrap;
      padding: 10px 0;
    }
  .scent-card {
  display: inline-block;
  width: 130px;
  height: 130px;
  /* margin-right: 10px; */ /* Remove this line */
  margin-right: 0; /* Optional, to be explicit */
  overflow: hidden;
  position: relative;
  flex-shrink: 0;
  transition: transform 0.3s ease;
}

    .scent-card:hover {
      transform: scale(1.05);
    }
    .scent-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .scent-label {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.4);
      color: #fff;
      text-align: center;
      font-weight: 600;
      font-size: 14px;
      padding: 4px 0;
    }
  </style>
</head>
<body class="bg-light py-5">

  <div class="container text-center">
    <div class="scent-scroll d-flex justify-content-start px-3">
      <!-- Repeat these blocks for each scent -->
      <div class="scent-card">
        <img src="assets/images/f1.webp" alt="Aquatic">
        <div class="scent-label"></div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f2.webp" alt="Aromatic">
        <div class="scent-label">AROMATIC</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f3.webp" alt="Fruity">
        <div class="scent-label">FRUITY</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f4.webp" alt="Green">
        <div class="scent-label">GREEN</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f5.webp" alt="Floral">
        <div class="scent-label">FLORAL</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f6.webp" alt="Citrus">
        <div class="scent-label">CITRUS</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f7.webp" alt="Animalic">
        <div class="scent-label">ANIMALIC</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f8.webp" alt="Gourmand">
        <div class="scent-label">GOURMAND</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f9.webp" alt="Woody">
        <div class="scent-label">WOODY</div>
      </div>
    </div>
  </div>

</body>
</html>
