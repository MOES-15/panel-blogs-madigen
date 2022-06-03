<?php 
session_start();
if(!isset($_SESSION['s']) || empty($_SESSION['s'])){
  header('Location: php/session');
}else{
    include_once('config/conn.php');
      $get = $conn->prepare("SELECT * FROM users WHERE id=?");
      $get->bind_param('s', $_SESSION['s']['i']);
      $get->execute();
      $result = $get->get_result();
      $row = $result->num_rows;
      if($row != 0){
        $data = $result->fetch_assoc();
      }else{
        header('Location: php/session');
      }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/panel.min.css?version=cdbea40f3ab84cdba491f44727sc33ac" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4aapsc5attw72i48qvy8n000mdbo2m6ioslnpe83vto5qd38/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="public/js/editor.min.js?v=cdbea40f3ab84cdba491f447271c33ac"></script>
    <title>Panel Madigen</title>
</head>
<body class="w-screen h-screen relative" style="background: url(public/img/back-city.jpg); background-size: cover; background-position: bottom; background-attachment: fixed;">
    <div class="h-full bg-white shadow-lg md:w-24 w-full fixed left-0 z-50 md:flex flex-col hidden">
        <div class="relative h-full m-auto z-30">
          <div class="absolute right-1 top-5 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor text-black" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </div>
            <div class="w-full h-full flex flex-col">
              <div class="md:hidden mt-10 flex justify-center">
                <img src="public/img/madigen.png" alt="" srcset="" class="" width="160px">
              </div>
              <div class="mt-10">
                <a href="./" class="bg-orange-500 md:w-14 w-60 h-14 flex items-center justify-center rounded-md shadow-lg transition duration-500 hover:transition-all hover:shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-post text-white" viewBox="0 0 16 16">
                        <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg>
                </a>
              </div>
              <div class="mt-5">
                <a href="./" class="bg-gray-300 hover:bg-orange-500 md:w-14 w-60 h-14 flex items-center justify-center rounded-md shadow-lg transition duration-500 hover:transition-all hover:shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-post text-white" viewBox="0 0 16 16">
                        <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg>
                </a>
              </div>
            </div>
        </div>
    </div>
    <div class="fixed md:right-44 left-4 md:left-auto top-6 z-30 md:w-auto w-1/2 ">
      <div class="absolute top-3 left-5 md:block hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </div>
      <input type="text" name="" id="search-post" placeholder="Busca un post" class="w-full rounded-md focus:outline-none py-2 px-6 bg-transparent placeholder:text-white border-2 border-white hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl text-white">
    </div>
    <div class="w-full h-full absolute right-0">
      <div class="w-full h-full absolute" style="background: rgba(0, 0, 0, 0.1); background-size: cover;"></div>
        <div class="w-16 h-12 md:fixed absolute md:right-20 right-16 top-5 flex items-center justify-center z-40">
          <div class="w-1/2 z-40">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bell-fill md:text-white text-dark" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg>
          </div>
        </div>
        <div class="h-12 w-28 md:fixed absolute md:right-10 right-5 top-5 bottom-10 shadow-lg rounded-full z-30" style="background-color: rgba(8, 98, 114, 0.656);">
            <div class="w-10 h-10 absolute right-1 top-1 cursor-pointer" id="btn-menu"><img src="public/img/users/madigen.jpeg" alt="" class="rounded-full"></div>
        </div>
        <div class="w-56 h-auto md:fixed absolute md:right-16 right-5 top-16 rounded-xl shadow-2xl invisible z-50 bg-white mt-1" id="menu">
            <div class="h-full flex items-center flex-col">
                <div class="pt-4">Hola, <?php echo $data['name'];?></div>
                <div class="mt-3 pb-6 pt-2">
                    <a href="php/session" class="bg-gray-200 px-4 py-2 rounded-lg cursor-pointer hover:bg-orange-500 hover:text-white transition duration-1000 hover:transition-all">Cerrar sesión</a>
                </div>
            </div>
        </div>
        <!-- <div class="h-12 w-12 fixed right-10 top-5 shadow-lg rounded-full transition duration-1000 hover:transition-all hover:h-24 focus:w-24 z-50" style="background-color: #086272;">
            <button class="absolute h-16 w-full left-2 bottom-0" id="btn-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list text-white hover:text-orange-500 transition duration-500 hover:transition-all" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                  </svg>
            </button>
            <div class="w-10 h-10 absolute right-1 top-1"><img src="public/img/users/u.jpg" alt="" class="rounded-full"></div>
        </div>
        <div class="w-56 h-auto absolute right-24 top-16 rounded-lg shadow-2xl invisible z-30 bg-white" id="menu">
            <div class="h-full flex items-center flex-col">
                <div class="pt-4">Hola, pablo</div>
                <div class="mt-3 pb-6 pt-2">
                    <a class="bg-gray-200 px-4 py-2 rounded-lg cursor-pointer hover:bg-orange-500 hover:text-white transition duration-1000 hover:transition-all">Cerrar sesión</a>
                </div>
            </div>
        </div> -->

        <!-- body -->
        <div class="md:ml-40 md:w-10/12 w-11/12 m-auto md:mt-10 mt-14">
          <img src="public/img/madigen.png" alt="" srcset="" width="150px" class="md:block hidden z-10">
            <div class="relative rounded-xl md:mt-16 mt-24 shadow-lg bg-white md:overflow-y-auto overflow-auto h-table">
              <!--  Header -->
              <div class="md:fixed absolute md:w-10/12 w-96 h-20 bg-white z-30 rounded-t-xl">
                <div class="md:grid md:grid-cols-7 flex px-5 h-full my-auto items-center text-lg">
                  <div class="md:col-span-2 md:w-auto w-96 px-5">Titulo</div>
                  <div class="md:col-span-1 md:w-auto w-96 px-5 text-center">Vistas</div>
                  <div class="md:col-span-1 md:w-auto w-96 px-5">Categorias</div>
                  <div class="md:col-span-1 md:w-auto w-96 px-5">Fecha</div>
                  <div class="md:col-span-1 md:w-auto w-96 px-5">Autor</div>
                  <div class="md:col-span-1 w-auto">
                    <button id="crear-post" style="background-color: #086272;" class="inline-flex items-center justify-center px-6 py-2 text-white rounded-lg w-10/12 text-1xl shadow-lg hover:shadow-none transition duration-500  whitespace-nowrap">
                      Crear post
                    </button>
                  </div>
                </div>
              </div>

              <div class="h-full w-full flex items-center justify-center" id="loading-posts">
                <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
              </div>
              <div class="h-full w-full items-center justify-center hidden" id="empty-search">No hay coincidencias con &nbsp;<span id="text-search"></span></div>
              <div class="relative mt-24 mb-4">
                <div class="relative shadow-sm invisible" id="table-posts">
                  <table class="table-auto w-full text-sm px-10">
                      <tbody class="text-md md:grid md:grid-cols-1 w-full" id="data-posts"></tbody>
                  </table>
                </div>
              </div>
                <div class="w-full md:px-32 px-10 h-14 flex items-center fixed bottom-0 left-0 md:justify-evenly bg-white z-50 pt-3 overflow-x-auto" id="menu-blogs">
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-orange-500 md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="vidaguadalajara.com.mx">Vida Guadalajara</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="country-news.com.mx">Country News</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="negocios-guadalajara.com.mx">Negocios Guadalajara</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="tendenciaguadalajara.com.mx">Tendencia Guadalajara</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="gdl-news.com.mx">Gdl News</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="fesaragon.com/blog/">FES Aragón</button>
                  <button class="mt-1 border-b-8 hover:border-orange-400 border-white md:px-0 px-5 pb-3 whitespace-nowrap" btn="blogs" blog="highcbdd.com/admin/">High CBD</button>
                </div>
            </div>
          </div>
          <div class="md:fixed absolute bottom-4 right-5 z-50 text-gray-400">
            Copyright 2022&copy;
          </div>
    </div>
    <div class="add-post fixed flex items-center justify-center top-0 bottom-0 left-0 right-0 p-1 cursor-pointer hidden" id="creador-post">
      <div class="relative md:w-3/4 w-full h-5/6 bg-white overflow-auto cursor-default flex flex-col justify-center pb-10 rounded-xl shadow-lg z-50">
          <header class="absolute top-10 w-full md:text-2xl text-lg text-center font-bold" space="post">Creador de publicaciones
          </header>
          <button class="absolute md:top-11 md:right-10 right-5 top-5" id="close-modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
              <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
            </svg>
          </button>
          <form enctype="multipart/form-data" id="fupForm" space="post" class="md:px-20 text-center mb-14 md:mt-28 mt-20 h-screen overflow-y-auto grid grid-cols-5 md:grid-rows-6 md:pt-10 gap-y-5 " name="form">
            <div class="grid grid-cols-5 col-span-5 px-3 py-3">
              <div class="md:col-span-3 col-span-5">
                <input type="text" name="title" id="" placeholder="Titulo*" class="w-11/12 rounded-md focus:outline-none py-4 px-6 placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-1xl">
              </div>
              <div class="md:col-span-2 col-span-5 flex items-center justify-center h-16">
                <label class="cursor-pointer w-11/12 ">
                  <input type="file" name="image" id="img-portada" class="block text-sm text-slate-500 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:bg-orange-500 file:text-white hover:file:bg-orange-300"/>
                </label>
              </div>
            </div>
            <div class="grid grid-cols-5 col-span-5 px-3 py-3">
              <div class="md:col-span-3 col-span-5">
                <textarea name="small" placeholder="Descripción corta*" class="w-11/12 rounded-md focus:outline-none py-4 h-24 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 transition duration-500 text-1xl" maxlength="155"></textarea>
              </div>
              <div class="grid grid-cols-5 md:col-span-2 col-span-5">
                <div class="col-span-5 md:pt-0 pt-3">
                  <select name="category_one" class="px-5 appearance-none w-11/12 py-3 bg-white rounded-md text-sm text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl">
                      <option selected>Selecciona la categoria 1*</option>
                      <option value="Mascotas">Mascotas</option>
                      <option value="Salud">Salud</option>
                      <option value="Seguros">Seguros</option>
                      <option value="Finanzas">Finanzas</option>
                      <option value="Moda">Moda</option>
                      <option value="Estilo de vida">Estilo de vida</option>
                      <option value="Decoración y hogar">Decoración y hogar</option>
                      <option value="Educación en línea">Educación en línea</option>
                      <option value="Apps y tilidad">Apps y tilidad</option>
                      <option value="Cupones">Cupones</option>
                      <option value="Lotería">Lotería</option>
                      <option value="Videojuegos">Videojuegos</option>
                      <option value="Juegos y Apuestas">Juegos y Apuestas</option>
                      <option value="Citas amorosas">Citas amorosas</option>
                      <option value="Noticias">Noticias</option>
                      <option value="Arte">Arte</option>
                      <option value="Hosting">Hosting</option>
                      <option value="Nutra/Nutrición">Nutra/Nutrición</option>
                      <option value="Viajes">Viajes</option>
                      <option value="Hospedaje">Hospedaje</option>
                      <option value="Vuelos">Vuelos</option>
                      <option value="Educación">Educación</option>
                      <option value="Video convencional">Video convencional</option>
                      <option value="Comercio electrónico">Comercio electrónico</option>
                      <option value="Negocios">Negocios</option>
                      <option value="Software">Software</option>
                      <option value="Deportes">Deportes</option>
                      <option value="Email Marketing">Email Marketing</option>
                      <option value="Oferta Laboral">Oferta Laboral</option>
                      <option value="Tecnología">Tecnología</option>
                      <option value="Marketing Digital">Marketing Digital</option>
                      <option value="Música">Música</option>
                      <option value="Cine">Cine</option>
                      <option value="Otros">Otros</option>
                  </select>
                </div>
                <div class="col-span-5 md:pt-0 pt-3">
                  <select name="category_two" class="px-5 appearance-none w-11/12 py-3 bg-white rounded-md text-sm text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl">
                      <option selected>Selecciona la categoria 2*</option>
                      <option value="Mascotas">Mascotas</option>
                      <option value="Salud">Salud</option>
                      <option value="Seguros">Seguros</option>
                      <option value="Finanzas">Finanzas</option>
                      <option value="Moda">Moda</option>
                      <option value="Estilo de vida">Estilo de vida</option>
                      <option value="Decoración y hogar">Decoración y hogar</option>
                      <option value="Educación en línea">Educación en línea</option>
                      <option value="Apps y tilidad">Apps y tilidad</option>
                      <option value="Cupones">Cupones</option>
                      <option value="Lotería">Lotería</option>
                      <option value="Videojuegos">Videojuegos</option>
                      <option value="Juegos y Apuestas">Juegos y Apuestas</option>
                      <option value="Citas amorosas">Citas amorosas</option>
                      <option value="Noticias">Noticias</option>
                      <option value="Arte">Arte</option>
                      <option value="Hosting">Hosting</option>
                      <option value="Nutra/Nutrición">Nutra/Nutrición</option>
                      <option value="Viajes">Viajes</option>
                      <option value="Hospedaje">Hospedaje</option>
                      <option value="Vuelos">Vuelos</option>
                      <option value="Educación">Educación</option>
                      <option value="Video convencional">Video convencional</option>
                      <option value="Comercio electrónico">Comercio electrónico</option>
                      <option value="Negocios">Negocios</option>
                      <option value="Software">Software</option>
                      <option value="Deportes">Deportes</option>
                      <option value="Email Marketing">Email Marketing</option>
                      <option value="Oferta Laboral">Oferta Laboral</option>
                      <option value="Tecnología">Tecnología</option>
                      <option value="Marketing Digital">Marketing Digital</option>
                      <option value="Música">Música</option>
                      <option value="Cine">Cine</option>
                      <option value="Otros">Otros</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="grid grid-cols-6 col-span-5 px-3 py-3 md:mt-10">
              <div class="md:col-span-2 col-span-6 md:px-1 py-3 md:py-0">
                <input type="text" name="youtube" id="" placeholder="Video de youtube embed (opcional)" class="w-11/12 rounded-md focus:outline-none py-4 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-1xl">
              </div>
              <div class="md:col-span-2 col-span-6 md:px-1 py-3 md:py-0">
                <input type="text" name="twitter" id="" placeholder="Perfil de twitter (opcional)" class="w-11/12 rounded-md focus:outline-none py-4 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-1xl">
              </div>
              <input type="hidden" name="autor" value="<?php echo $data['name'];?>" placeholder="Perfil de twitter (opcional)" class="w-11/12 rounded-md focus:outline-none py-4 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-1xl">
              <div class="md:col-span-2 col-span-6 md:px-1 py-3 md:py-0">
                <select name="blog" class="appearance-none w-11/12 py-4 px-6 bg-white rounded-md text-sm text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl">
                  <option selected>Selecciona el blog*</option>
                  <option value="https://www.vidaguadalajara.com.mx/234142/addPost.php" blog="https://www.vidaguadalajara.com.mx/">Vida Guadalajara</option>
                  <option value="https://www.country-news.com.mx/234142/addPost.php" blog="https://www.country-news.com.mx/">Country News</option>
                  <option value="https://www.negocios-guadalajara.com.mx/234142/addPost.php" blog="https://www.negocios-guadalajara.com.mx/">Negocios Guadalajara</option>
                  <option value="https://www.tendenciaguadalajara.com.mx/234142/addPost.php" blog="https://www.tendenciaguadalajara.com.mx/">Tendencia Guadalajara</option>
                  <option value="https://www.gdl-news.com.mx/234142/addPost.php" blog="https://www.gdl-news.com.mx/">Gdl News</option>
                  <option value="https://www.fesaragon.com/blog/234142/addPost.php" blog="https://www.fesaragon.com/blog/">FES Aragón</option>
                  <option value="https://www.highcbdd.com/admin/234142/addPost.php" blog="https://www.highcbdd.com/admin/">High CBD</option>
              </select>
              </div>
            </div>
            <div class="md:col-span-6 col-span-6 px-3 py-3 md:mt-10 md:mb-20">
              <textarea name="facebook" id="post-iframe" placeholder="Iframe de Facebook - width: 350 (opcional)" class="w-11/12 rounded-md focus:outline-none py-4 h-24 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 transition duration-500 text-1xl"></textarea>
            </div>
            <div class="md:col-span-5 col-span-6 px-8 md:mt-20 py-3 mb-20">
              <textarea name="body" id="post-body" placeholder="Cuerpo de la publicación" class="w-11/12 rounded-md focus:outline-none py-4 h-24 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 transition duration-500 text-1xl"></textarea>
            </div>
          </form>
          <div class="h-full w-full flex items-center justify-center flex-col hidden" space="success-post">
            <div class="font-bold text-4xl mb-14">Publicación creada con exito</div>
              <div class="flex">
                <div class="px-3">
                  <button id="new_post" class="w-56 inline-flex items-center justify-center px-6 py-4 h-14 text-white rounded-lg text-1xl shadow-lg hover:shadow-none transition duration-500 bg-orange-400">
                      <div class="w-full text-center">
                          CREAR UNO NUEVO
                      </div>
                  </button>
                </div>
                <div class="px-3">
                  <a id="link_post" href="" target="_blank" class="w-56 inline-flex items-center justify-center px-6 py-4 h-14 text-white rounded-lg text-1xl shadow-lg hover:shadow-none transition duration-500 bg-green-500">
                        <div class="w-full text-center">
                           VER PUBLICACIÓN
                        </div>
                  </a>
                </div>
            </div>
          </div>
          <footer class="flex justify-center items-center w-full absolute bottom-0 h-24 bg-white rounded-b-xl">
              <!-- <button class="bg-black text" aria-label="close modal" data-close>OK</button> -->
              <button id="add_publication" space="post" style="background-color: #086272;" class="inline-flex items-center justify-center px-6 py-4 h-14 text-white rounded-lg w-28 text-1xl shadow-lg hover:shadow-none transition duration-500">
                   <div class="w-full text-center">
                     CREAR
                   </div>
             </button>
          </footer>
      </div>
  </div>
  <div class="absolute right-10 top-5 bg-red-500 rounded-xl flex items-center px-5 py-5 shadow-lg text-white transition-all duration-500 invisible text-sm" id="alert-red" style="z-index: 9999;"></div>
  <div class="absolute right-10 top-5 bg-green-500 rounded-xl flex items-center px-5 py-5 shadow-lg text-white transition-all duration-500 invisible text-sm" id="alert-success" style="z-index: 9999;"></div>
    <script src="public/js/panel.min.js?version=cdbea40f3ab84c8ba491f447271c33ac"></script>
    <script>
      tinymce.init({
    selector: '#post-body',
    height: 500,
    plugins: [
      'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
      'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
      'searchreplace', 'table', 'template', 'tinymcespellchecker', 'visualblocks', 'wordcount'
    ],
    toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
    theme: 'silver',
    language: 'es_MX',
    toolbar_mode: 'floating',
  });
    </script>
</body>
</html>