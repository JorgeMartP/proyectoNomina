<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Empleados</title>
  <link rel="stylesheet" href="../styles/styles.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header class="header" id="responsive">
    <div class="imagen">
      <div class="logo">
        <a href="#">
          <img src="../img/logoSena.png" alt="logo" />
        </a>
      </div>
    </div>
    <div class="search">
      <input type="text" class="search__input" placeholder="Type your text" />
      <button class="search__button">
        <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
          <g>
            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
          </g>
        </svg>
      </button>
    </div>
    <div class="imagen">
      <label>JORGE MARTINEZ</label>
      <div class="logo-imagen">
        <a href="#">
          <img src="../img/deku.jpg" alt="perfil" />
        </a>
      </div>
    </div>
    <label id="icon">
      <i class="bx bx-menu"></i>
    </label>
  </header>

  <section class="containerTable">
    <div class="button">
      <h1>Empleados</h1>
      <button class="botton-1">Registrar Empleado</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>Identificación</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>123456789</td>
          <td>John</td>
          <td>Doe</td>
          <td>john.doe@example.com</td>
          <td>(123) 456-7890</td>
          <td><a href=""><i class='bx bxs-trash'></i></a></td>
          <td><a href=""><i class='bx bxs-edit-alt'></i></a></td>
        </tr>
      </tbody>
    </table>
  </section>
  
  <script src="../js/modal.js"></script>
</body>
</html>