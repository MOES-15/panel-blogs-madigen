<?php 
session_start();
if(isset($_SESSION['s']) || isset($_SESSION['s']['i'])){
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/panel.min.css" rel="stylesheet">
    <title>Inicio de sesión | Madigen</title>
</head>
<body class="w-screen h-screen grid grid-cols-6 relative" style="background: url(public/img/back-2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; ">
    <div class="md:col-span-3 col-span-6 md:h-full saturate-200 relative">
        <div class="relative md:top-80 top-5 md:w-full w-1/2 m-auto z-30 mt-14">
            <img src="public/img/2.png" alt="" srcset="" class="m-auto" width="400px">
        </div>
    </div>
    <div class="md:static  absolute md:col-span-3 col-span-6 h-80 md:w-7/12 w-11/12 m-auto shadow-lg z-50 bg-white flex rounded-lg sm:mb-auto bottom-28 left-0 right-0">
        <div class="w-full flex justify-center align-center flex-col">
            <div class="flex justify-center mb-3">
                <input type="email" name="" id="email" placeholder="CORREO ELECTRÓNICO" class="w-10/12 rounded-md focus:outline-none py-4 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl">
            </div>
            <div class="flex justify-center">
                <input type="password" name="" id="password" placeholder="CONTRASEÑA" class="w-10/12 rounded-md focus:outline-none py-4 px-6 bg-transparent placeholder:text-gray-400 border-2 border-gray-100 hover:border-orange-500 hover:shadow-none transition duration-500 text-center text-1xl">
            </div>
            <div class="flex justify-center mt-10">
                <button id="login" style="background-color: #086272;" class="inline-flex items-center justify-center px-6 py-4 text-white rounded-lg w-10/12 text-1xl shadow-lg hover:shadow-none transition duration-500">
                   <!--  <svg class="motion-reduce:hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg> -->
                      <div class="w-full text-center">INICIAR SESIÓN</div>
                </button>
            </div>
        </div>
        <div class="absolute right-10 top-5 bg-red-500 z-50 rounded-xl flex items-center px-5 py-5 shadow-lg text-white transition-all duration-500 invisible text-sm" id="alert-red"></div>
  <div class="absolute right-10 top-5 bg-green-500 z-50 rounded-xl flex items-center px-5 py-5 shadow-lg text-white transition-all duration-500 invisible text-sm" id="alert-success"></div>
    </div>
    <div class="w-full h-full z-10 absolute" style="background: rgba(0, 0, 0, 0.5); background-size: cover;"></div>
    <div class="fixed bottom-3 right-5 z-50 text-white">
        Copyright 2022&copy;
      </div>
    <script src="public/js/login.min.js"></script>
</body>
</html>
