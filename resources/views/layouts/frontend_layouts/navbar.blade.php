<nav>

    <div class="navbar" id="navbar">
        <div class="nav-container">
            <div class="nav-wrapper">

                <div class="logo">
                    <logo></logo>
                    {{-- <h3 class="color">OUTOFBOX</h3> --}}
                </div>

                <div class="nav-menu">
                    <i class="fa fa-bars color" onclick="toggleNav()"></i>
                    <i class="fa fa-times color" onclick="toggleNav()"></i>
                </div>


                <div class="nav-list">

                    <ul>
                        <li class="nav-item {{ Route::current()->uri() == '/' ? 'nav-active' : '' }}">
                            <div class="ni-no"><span>01</span></div>
                            <a href="/" class="nav-link color">Home</a>

                        </li>

                        <li class="nav-item {{ Route::current()->uri() == 'about-us' ? 'nav-active' : '' }}">
                            <div class="ni-no"><span class="color">02</span></div>
                            <a href="/about-us" class="nav-link color">About Us</a>
                        </li>

                        <li class="nav-item {{ Route::current()->uri() == 'portfolio' ? 'nav-active' : '' }}">
                            <div class="ni-no"><span class="color">03</span></div>
                            <a href="/portfolio" class="nav-link color">Portfolio</a>
                        </li>

                        <li class="nav-item {{ Route::current()->uri() == 'blog' ? 'nav-active' : '' }}">
                            <div class="ni-no"><span class="color">04</span></div>
                            <a href="/blog" class="nav-link color">Blog</a>
                        </li>

                        <li class="nav-item {{ Route::current()->uri() == 'contact-us' ? 'nav-active' : '' }}">
                            <div class="ni-no"><span class="color">05</span></div>
                            <a href="/contact-us" class="nav-link color">Contact Us</a>
                        </li>
                    </ul>

                </div </div>

                <div class="nav-talk">
                    <a href="tel:+9779863992047" class="color num-call font-weight-bold">
                        <i class="fab fa-viber color" style="color:#725fed"></i>
                        <i class="fab fa-whatsapp color" style="color:#4ec95b"></i>
                        {{-- <i class="fa fa-phone color"></i> --}}
                        +977-9802266312
                    </a>
                    <a href="/contact-us" class="button">Let's Talk</a>
                </div>


            </div>
        </div>
    </div>

</nav>

<div id="search-button">
    <i class="fa fa-search" onclick="toggleSearch()"></i>
</div>

<search></search>

<div class="nav-follow">
    <ul>
        <li>
            <a href="https://www.linkedin.com/company/outofbox-design/" target="_blank">
                <i class="fab fa-linkedin color"></i>
            </a>
        </li>
        <li>
            <a href="https://www.facebook.com/outofboxdesign" target="_blank">
                <i class="fab fa-facebook-f color"></i>
            </a>
        </li>
        <li>
            <a href="https://www.instagram.com/outofboxdesignnepal/" target="_blank">
                <i class="fab fa-instagram color"></i>
            </a>
        </li>
        <li>
            <a href="https://www.youtube.com/channel/UC6jdWKu5eafILt_BAS7hGhQ" target="_blank">
                <i class="fab fa-youtube color"></i>
            </a>
        </li>
        <li><span class="color">Follow Us - </span></li>
    </ul>
</div>
