<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Escuela</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/tooplate-kool-form-pack.css" rel="stylesheet">
<!--

Tooplate 2136 Kool Form Pack

https://www.tooplate.com/view/2136-kool-form-pack

Bootstrap 5 Form Pack Template

-->
    </head>
    
    <body>

        <main>

            <header class="site-header">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-lg-12 col-12 d-flex">
                            <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="../index.html">
                                <i class="bi-box"></i>

                                <span>
                                    Escuela33
                                </span>
                            </a>

                            <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                                <span class="text-white me-4 d-none d-lg-block">Stay connected</span>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>

                            <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

                        </div>

                    </div>
                </div>
            </header>


            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">                
                <div class="offcanvas-header">                    
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
                <nav>
                        <ul>

                            <li>
                                <a href="../listas.php">Listas</a>
                            </li>

                            <li>
                                <a href="../formulario_alumnos.html">Formulario de alumnos</a>
                            </li>


                            <li>
                                <a href="../formulario_aulas.html">Formulario de aulas</a>
                            </li>

                            <li>
                                <a href="../formulario_docentes.html">Formulario de docentes</a>
                            </li>

                            <li>
                                <a href="../formulario_materias.html">Materias</a>
                            </li>

                            <li>
                                <a href="../contact.html">Contacto</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="subscribeModal"  aria-labelledby="subscribeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="#" method="get" class="custom-form mt-lg-4 mt-2" role="form">
                                <h2 class="modal-title" id="subscribeModalLabel">Stay up to date</h2>

                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com" required="">

                                <button type="submit" class="form-control">Notify</button>
                            </form>
                        </div>

                        <div class="modal-footer justify-content-center">
                            <p>By signing up, you agree to our Privacy Notice</p>
                        </div>
                    </div>
                </div>
            </div>


            <section class="hero-section hero-bg d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 text-center mx-auto">
                            <h2 class="hero-title text-center mb-4 pb-2 ">Listado de calificaciones</h2>
                            <label for="">Elija cursos</label>
                            <select name="" id="curso">
                                <option value="">PRIMERO</option>
                                <option value="">SEGUNDO</option>
                                <option value="">TERCERO</option>
                                <option value="">CUARTO</option>
                                <option value="">QUINTO</option>
                                <option value="">SEXTO</option>
                            </select>
                            <button id="mostrar">Mostrar</button>
                            <br>
                            <?php
                            include("../class/clase_calificacion.php");
                            $obj_calificacion=new calificacion("","","","");
                            $obj_calificacion->listar();
                        
                            ?>                        
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/countdown.js"></script>
        <script src="../js/init.js"></script>

    </body>
</html>
