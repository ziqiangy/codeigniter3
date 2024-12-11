<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- ciapp header -->
    <title>MyApp</title>
    <link rel="icon" type="image/x-icon" href="/pictures/wp.jpg">

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/jquery-3.7.1.min.js"></script>

    <link href="/css/bootstrap-5.3.3-dist/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap-5.3.3-dist/bootstrap.bundle.min.js"></script>

    <!--Peter Added style sheet-->
    <!--Malibu scrollbar/sidebar scrollbar CSS-->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css" />
    <!--Peter's Personal CSS-->
    <link rel="stylesheet" href="/css/peter_side_nav_bar.css">
    <!--MaliBu Scrollbar Sidebar scrollbar JS-->
    <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/5009a972bb.js"></script>


    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="/css/bootstrap-icons.min.css"> -->

    <!--Peter's Personal JS-->
    <script src="/js/peter_side_nav_bar.js"></script>


    <style>
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            display: flex;
            flex-wrap: nowrap;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }



        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            /* color: rgba(0, 0, 0, .65); */
            color: rgba(255, 255, 255, .65);
            background-color: transparent;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            /* color: rgba(0, 0, 0, .85); */
            color: rgba(255, 255, 255, .85);
            /* background-color: #d2f4ea; */
            background-color:
                #0d6efd;
        }

        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%28255,255,255,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
        }

        .btn-toggle[aria-expanded="true"] {
            /* color: rgba(0, 0, 0, .85); */
            color: rgba(255, 255, 255, .85);
        }

        .btn-toggle[aria-expanded="true"]::before {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            margin-left: 1.25rem;
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            /* background-color: #d2f4ea; */
            background-color:
                #0d6efd;
        }

        .fw-semibold {
            font-weight: 600;
        }
    </style>

</head>

<body>


    <div id="navCalDiv">
        <div id="monthscroller">
        </div>
    </div>

    <!--Sidebar-->
    <div id="sidebar">



        <div class="flex-shrink-0 p-3 bg-dark" style="width: 240px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-light text-decoration-none border-bottom">

                <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor"
                    class="bi bi-archive" viewBox="0 0 16 16">
                    <path
                        d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                </svg>
                <span class="fs-5 fw-semibold">Ciapp</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="true">
                        Home
                    </button>
                    <div class="collapse show" id="home-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><?php echo anchor("/", "<span><i class='bi me-2 bi-speedometer2'></i>Dashboard</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("dictionary/", "<span><i class='bi me-2 bi-alphabet'></i>Dictionary</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("scriptures/", "<span><i class='bi me-2 bi-journals'></i>Scriptures</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <!-- <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-sticky-fill"></i>Quicknotes</span></a></li>
                            <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-music-note-list"></i>Playlist</span></a></li>
                            <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-cookie"></i>Recipes</span></a></li>
                            <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-journals"></i>Blogs</span></a></li>
                            <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-check2-square"></i>Todos</span></a></li> -->
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Flashcards
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li><?php echo anchor("flashcard/oneCardView", "<span><i class='bi me-2 bi-card-text'></i>Card Board</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcard/displayAllList", "<span><i class='bi me-2 bi-list-task'></i>Card List</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcard/insertView", "<span><i class='bi me-2 bi-plus'></i>Insert One</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcard/displayMultiInsert", "<span><i class='bi me-2 bi-plus-square'></i>Insert Multi</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcate/list", "<span><i class='bi me-2 bi-list-task'></i>Show my Categories</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcate/insert", "<span><i class='bi me-2 bi-plus'></i>Insert Category</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("flashcard/searchByCate", "<span><i class='bi me-2 bi-search'></i>Search by Category</span>", array("class" => "link-light rounded")); ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#orders-collapse" aria-expanded="false">
                        Notes
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><?php echo anchor("quicknote/list", "<span><i class='bi me-2 bi-list-task'></i>Note List</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <li><?php echo anchor("quicknote/insert", "<span><i class='bi me-2 bi-plus'></i>Note Insert</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <!-- <li><a href="#" class="link-light rounded">Returned</a></li> -->
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li><?php echo anchor("user/profile", "<span><i class='bi me-2 bi-file-person-fill'></i>Profile</span>", array("class" => "link-light rounded")); ?>
                            </li>
                            <!-- <li><a href="#" class="link-light rounded"><span><i
                                            class="bi me-2 bi-gear-fill"></i>Settings</span></a></li>
                            <li><a href="#" class="link-light rounded">Sign in</a></li>
                            <li><a href="#" class="link-light rounded">Sign out</a></li> -->
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--Content:Navbar&Content-->
    <div id="content">
        <!--Navbar-->
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">

                <!--Toggle Sidebar(>768px table and laptop left)-->
                <span class="d-none d-sm-none d-md-block" id="sidebarCollapse">
                    <!-- <img src="/pictures/icons/text-left.svg" alt=""> -->
                    <i class="fas fa-align-left"></i>
                </span>
                <!--Toggle Sidebar(mobile left)-->
                <button class="navbar-toggler" type="button" id="sidebarCollapse-mobile">
                    <!-- <img src="/pictures/icons/text-left.svg" alt=""> -->
                    <i class="fas fa-align-left"></i>
                </button>

                <!--Search form-->
                <form class="d-flex">
                    <button class="btn" type="submit" name="header_search_submit">
                        <i class="fas fa-search"></i>
                        <!-- <img src="/pictures/icons/search.svg" alt=""> -->
                    </button>
                    <input class="form-control" id="header_search_query" type="search" name="findme"
                        placeholder="Search" style="border:0;background-color: #f8f9fa !important;" value=>
                </form>

                <!-- Toggle navbar (mobile top right)-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                    <!-- <img src="/pictures/icons/justify.svg" alt=""> -->
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                            //only superadmin can register new user
                            if(isset($_SESSION["superadmin"]) && $_SESSION['superadmin'] == 1) {
                                echo anchor("user/register", "register", array('class' => 'btn btn-outline-dark me-2'));
                                echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark'));
                            } else {
                                //user options
                                if(isset($_SESSION["user_id"])) {
                                    //user logged in header

                                    echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark ms-2'));

                                    echo anchor("user/profile", $_SESSION["username"], array('class' => 'btn btn-outline-dark ms-2'));

                                } else {
                                    //user header without login yet
                                    echo anchor("user/login", "login", array('class' => 'btn btn-outline-dark ms-2'));
                                }
                            }
                            ?>
                        <!-- <div class="p-2"><button class="btn btn-outline-dark" type="submit">register</button></div> -->
                        <!-- <div class="p-2">
                            <button class="btn btn-outline-dark" type="submit">Login</button>
                        </div> -->
                        <!-- <div class="p-2"><button class="btn btn-outline-dark" type="submit">Search</button></div> -->
                    </div>
                </div>
        </nav>
        <!--MainPage Start-->
        <div id="mainPage">